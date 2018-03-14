<?php
$conn_error='not conn.';
$mysql_host='localhost';
$user='root';
$pass=NULL;
$dbname = 'roado';

$connection = mysqli_connect('localhost', 'root', NULL);
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'roado');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

?>



















