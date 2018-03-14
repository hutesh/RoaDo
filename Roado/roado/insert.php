


<?php
    require('connect.php');
     function GetImageExtension($imagetype){
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }



      function mini($dist1,$dist2){
        if($dist1<$dist2)
            return $dist1;
        else
            return $dist2;
      }


      function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}   
     
    if (isset($_POST['submit'])){
        session_start();
       
        $nameofoutlet = $_POST['nameofoutlet'];
        $serviceprovider = $_POST['serviceprovider'];

        $mobilefirst = $_POST['mobilefirst'];
        $mobilesecond = $_POST['mobilesecond'];

        $loclat = $_POST['lat'];
        $loclong = $_POST['long'];

        $opening = $_POST['opening'];
        $closing = $_POST['closing'];

        $estyear = $_POST['estyear'];
        $vehtype = $_POST['vehtype'];

        $vehmake = $_POST['vehmake'];
        $sertype = $_POST['sertype'];

        $seraval = $_POST['seraval'];
        $email   =  $_SESSION['email'];

        



        if (!empty($_FILES["uploadedimage"]["name"])) {

                $file_name=$_FILES["uploadedimage"]["name"];

                $temp_name=$_FILES["uploadedimage"]["tmp_name"];

                $imgtype=$_FILES["uploadedimage"]["type"];

                $ext= GetImageExtension($imgtype);

                $imagename=date("d-m-Y")."-".time().$ext;

                $target_path = "images/".$imagename;

     
            if(move_uploaded_file($temp_name, $target_path)) {

 

                $query_upload="INSERT into 'services' ('image1') VALUES 
                 ('".$target_path."','".date("Y-m-d")."')";

                mysql_query($query_upload) or die("error in $query_upload == ----> ".mysql_error()); 

        }
        else
        {
             $message = "error in image upload";
             echo "<script type='text/javascript'>alert('$message');</script>";

        }
    }







          $cdquery="SELECT * FROM location";
          $cdresult=mysqli_query($connection,$cdquery);
          $iteration = 0;
          while ($cdrow=mysqli_fetch_array($cdresult)) 
           {
              if($iteration==0)
              {
                 $minDistance=distance($loclat, $loclong, $cdrow[2], $cdrow[3], "K");
                 $center=$cdrow[1];
              }
              else
              {
                $dist=distance($loclat, $loclong, $cdrow[2], $cdrow[3], "K");
                $center1=$cdrow[1];
                $temp=mini($dist,$minDistance);
                if($temp==$dist)
                {
                    $minDistance=$temp;
                    $center=$center1;
                }
              }
              echo $cdrow[2];
              echo $cdrow[3];
              echo $cdrow[1];
              $iteration=$iteration+1;
           }
              
             $message = "Your nearest center is ".$center;
             echo "<script type='text/javascript'>alert('$message');</script>";

        /*$sql = "INSERT INTO services (Nameofoutlet,NameofSP,firstNO,AltNO,LocationLAT,LocationLAG,opentime,closetime,establishedYear,typeOfVehicles,makeOfVehicles,typeOfService,serviceAvailable,email,center) VALUES ('$nameofoutlet','$serviceprovider','$mobilefirst','$mobilesecond','$loclat','$loclong','$opening','$closing','$estyear','$vehtype','$vehmake','$sertype','$seraval','$email','$center')";*/
        $sql = "INSERT INTO services (Nameofoutlet,NameofSP,firstNO,AltNO,email,center,establishedYear,opentime,closetime,LocationLAT,LocationLAG,typesOfVehicles,makeOfVehicles,typeOfService,serviceAvailable) VALUES ('$nameofoutlet','$serviceprovider','$mobilefirst','$mobilesecond','$email','$center','$estyear','$opening','$closing','$loclat','$loclong','$vehtype','$vehmake','$sertype','$seraval')";

        if ($connection->query($sql) === TRUE) {
              echo "insert sucessful";
             $message = "Your insertion is sucessful";
             echo "<script type='text/javascript'>alert('$message');</script>";
             $url = "userAccount.php";
             header("Location:$url");
        }
        else{

             $message = "Your insertion is failed ";
             echo "<script type='text/javascript'>alert('$message');</script>";
             //$url = "insert.html";
             //header("Location:$url");
            }
        }
        else
        {
            $message = " not getting error";
             echo "<script type='text/javascript'>alert('$message');</script>";
        }

?>

