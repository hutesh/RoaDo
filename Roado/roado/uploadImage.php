

    <?php
   require('connect.php');
   $db =  mysqli_connect("localhost", "root", "", "roado");
  $msg = "";
  if (isset($_POST['upload'])) {
     session_start();
     $email=$_SESSION['email'];
    // Get image name
    $image = $_FILES['image']['name'];

    
    $target = "C:/xampp/htdocs/roado/images/".basename($image);

    $sql = "UPDATE  services SET image1='$image' WHERE email='$email'";

    if ($connection->query($sql) === TRUE) {
      echo "name inserted";
    }
    else
      echo "name not inserted";

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
      echo $msg;
    }else{
      $msg = "Failed to upload image";
      echo $msg;
    }
  $url = "userAccount.php";
     header("Location:$url");
 }
?>