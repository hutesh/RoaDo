<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Account</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" type="text/css" href="assets/font/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="assets/font/font.css" />
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/responsive.css" media="screen" />
<link rel="stylesheet" type="text/css" href="assets/css/jquery.bxslider.css" media="screen" />
</head>
<style>
h1 {
    color: red;font-size: 80px; text-decoration: underline;text-shadow: 3px 2px blue;background: lightpink;
}
h5 {
    color:blue;text-align: center;font: italic bold 80px/70px Georgia, serif ;text-decoration: underline;
}
h4 {
    font-size: 20px; 
}
h2 {
    font-size: 30px; color: blue;
}
/* unvisited link */
a:link {
    color: green;
}

/* visited link */
a:visited {
    color: green;
}

/* mouse over link */
a:hover {
    color: hotpink;
}

/* selected link */
a:active {
    color: pink;
}

		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}
		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 400px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 15px 25px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-align: italic;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}

		div.container {
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 600px;

}

</style>
<body>
<div class="body_wrapper">
  <div class="center">
    <div class="header_area">
     <li><img src="images/logo1.jpg" alt=""/><br><br><br>
  </div>

    






    <?php
       require('connect.php');
	   $message = $_SESSION['email'];
       echo "<script type='text/javascript'>alert('$message');</script>";
       $email=$_SESSION['email'];
	if (isset($_GET['email']))
	{
	      // $email = $_GET['email'];
	       //$message = "gettiing";
	       //echo "<script type='text/javascript'>alert('$message');</script>";  
	}
   else
    {
	   	 //$message = "gettiing not";
	     //echo "<script type='text/javascript'>alert('$message');</script>";
  	}



  	$check="SELECT * FROM services WHERE email = '$email'";
    $rs = mysqli_query($connection,$check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);

    if($data[13] == $email) {
        $message = "This email is there";
        echo "<script type='text/javascript'>alert('$message');</script>";


    $cdquery="SELECT * FROM services WHERE email='$email'";
	$cdresult=mysqli_query($connection,$cdquery);
	$result = $connection->query($cdquery);
    $row=$result->fetch_assoc();
	
     }
     else
     {
     $url = "newAccount.php";
     header("Location:$url");
     }

?>
 

 <table class="data-table">
		<caption class="title"><i>Center Details</i></caption>
		<thead>
			
				<tr><th>Comapny <td><?php  echo $row["Nameofoutlet"];?></td></th></tr>
                
				<tr><th>Owner<td><?php  echo $row["NameofSP"];?></td></th></tr>
                <tr><th>email<td><?php  echo $row["email"];?></td></th></tr>
				<tr><th>Mobile 1<td><?php  echo $row["firstNO"];?></td></th></tr>

				<tr><th>Mobile 2<td><?php  echo $row["AltNO"];?></td></th></tr>

				<tr><th>LAT<td><?php  echo $row["LocationLAT"];?></td></th></tr>

				<tr><th>LAG<td><?php  echo $row["LocationLAG"];?></td></th></tr>
                <tr><th>Service Center<td><?php  echo $row["center"];?></td></th></tr>
				<tr><th>open time<td><?php  echo $row["opentime"];?></td></th></tr>

				<tr><th>close time<td><?php  echo $row["closetime"];?></td></th></tr>

				<tr><th>year<td><?php  echo $row["establishedYear"];?></td></th></tr>
          
			    <tr><th>type of vehicle<td><?php  echo $row["typesOfVehicles"];?></td></th></tr>

			    <tr><th>make of vehicle<td><?php  echo $row["makeOfVehicles"];?></td></th></tr>

			    <tr><th>type of services<td><?php  echo $row["typeOfService"];?></td></th></tr>

			    <tr><th>service available<td><?php  echo $row["serviceAvailable"];?></td></th></tr>

               <div class="container"> <img src='images/<?php echo $row['image1']?>' alt="No Image uploaded"></div>
      
			   <?php echo "Photo of Outlet ";?>
		</thead>
		<thead>
		        <tr>
			     <?php echo "
                 <a href=\"editDetail.php?id=".$row["email"]."\"><button>Edit Details</button></a>"; 
                 ?></tr>


                 <tr>
			     <?php echo "
                 <a href=\"uploadImage.html?id=".$row["email"]."\"><button>Upload Image</button></a>"; 
                 ?></tr>
                 <tr>

                 <?php
                 echo "
				     <tr>
				     <td>
					 <a href=\"logout.php\"><button>Log Out</button></a>
					 </td>
					 </tr>"; 
                 ?>
                 </tr>
		</thead>

       </table>
    </div>
  </div>
</div>
<script type="text/javascript" src="assets/js/jquery-min.js"></script> 
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="assets/js/jquery.bxslider.js"></script> 
<script type="text/javascript" src="assets/js/selectnav.min.js"></script> 
<script type="text/javascript">
selectnav('nav', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
selectnav('f_menu', {
    label: '-Navigation-',
    nested: true,
    indent: '-'
});
$('.bxslider').bxSlider({
    mode: 'fade',
    captions: true
});
</script>
</body>
</html>