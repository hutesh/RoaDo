<?php
session_start();
session_destroy();
$url = "logiin.php";
header("Location:$url");
       $message = "You log out successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
exit();
?>