<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
  </head>
  <body>
    <h1>Welcome <?php echo $row["name"]; ?></h1>
    <!-- <a herf="index.html">Go to game</a> -->
    <a href="index.HTML">Go to Game</a>
    <a href="logout.php">Logout</a>
  
    
  </body>
</html>
