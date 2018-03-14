<?php
    require('connect.php');
    session_start();
       
        $nameofoutlet = $_POST['nameofoutlet'];
        $serviceprovider = $_POST['nameofsp'];

        $mobilefirst = $_POST['firstno'];
        $mobilesecond = $_POST['altno'];

        $opening = $_POST['opentime'];
        $closing = $_POST['closetime'];

  
        $vehtype = $_POST['typesofvehicles'];

        $vehmake = $_POST['makeofvehicles'];
        $sertype = $_POST['typeofservice'];

        $seraval = $_POST['serviceavailable'];
        $email   =  $_SESSION['email'];
         $sql = "UPDATE services SET Nameofoutlet='$nameofoutlet',NameOfSP='$serviceprovider',firstNO='$mobilefirst',AltNO='$mobilesecond',opentime='$opening',closetime='$closing',typesOfVehicles='$vehtype',makeOfVehicles='$vehmake',typeOfService='$sertype',serviceAvailable='$seraval' WHERE email='$email'";

	if ($connection->query($sql) === TRUE) {
    	 $message = "Record updated successfully";

	     echo "<script type='text/javascript'>alert('$message');</script>"; 
	     $url = "userAccount.php";
         header("Location:$url");
	} 
	else 
	{
     	$message = "Error updating record: ";
     	echo "<script type='text/javascript'>alert('$message');</script>"; 
	}

   ?>



