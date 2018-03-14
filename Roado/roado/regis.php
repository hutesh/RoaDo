<?php
require('connect.php');
if (isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];



    $check="SELECT * FROM user WHERE email = '$email'";
    $rs = mysqli_query($connection,$check);
   $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    if($data[0] > 1) {
        $message = "sorry, This email already registered";
        echo "<script type='text/javascript'>alert('$message');</script>";
     } 	 	
  	else{

		$sql = "INSERT INTO user (email,password) VALUES ( '$email','$password')";

		if ($connection->query($sql) === TRUE) {
		    echo "registration sucessful";
		     $message = "Your registration is sucessful";
		     echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else{
			echo "registration failed";
		}
     }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>The RoaDo Team</title>

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
    font-size: 30px;color: blue;
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
</style>
<body>
<script>
var password;
function checkEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;
}

function checkPass(pass)
{     
	var field = pass.value; 
    var mnlen = 7;
    var mxlen = 13;
    password=pass.value;
   if(field.length<mnlen || field.length> mxlen)
		{ 
			alert("Please input the password between " +mnlen+ " and " +mxlen+ " characters");
			return false;
		}
		else
			return true;
}

 function passMatch(pass2){   
  
   var field = pass2.value; 

   if(field.length>password.length||field.length<password.length)
      {   
      alert("Both password are different");     
        return false;   
      } 
     else 
     	return true;
 }


</script>


<div class="body_wrapper">
  <div class="center">
    <div class="header_area">
     <li><img src="images/logo1.jpg" alt=""/><br><br><br>
     <a href="roado.co.in"><span> <p>Go to Official website</p> </span></a></li>
  </div>

    
    <form name="hk" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h2>Sign Up</h2>
    <p>Please fill in this form to create an account.</p>
    <hr>



    <label for="email"><b>Email</b></label>
    <input type="text" id='txtEmail' placeholder="Enter Email" name="email" required onblur="checkEmail(this);">
    
      
    
    <label name="l1" for="psw"><b>Password</b></label>
    <input type="password" id='p1' placeholder="Enter Password" name="password" required onblur="checkPass(this);">


    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" id='p2' placeholder="Repeat Password" name="psw-repeat" required onblur="passMatch(this);">

    <div class="clearfix">
      <button type="button" class="cancelbtn" onclick="window.location.reload()">Cancel</button>
      <button type="submit"  name='submit' class="signupbtn" >Sign Up</button>
    </div>
      <a href="logiin.php"><span> <p>Log In Here</p> </span></a>
  </div>
</form>


















  

    
      <div class="copyright_text">
        <p> The RoaDo Team.Design by <a href="https://hutesh.github.io/"><span>Hutesh Kumar Gauttam</span></a></p>
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