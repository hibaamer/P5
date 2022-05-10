<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: mainP.php");
  exit;
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email =$_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password', '0')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="ss.css">

	<title>Register Form - Pure Coding</title>
</head>
  <body>
    
    <div class="container">
        <form class="" action="" method="post" autocomplete="off" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
                <div class="input-group">
                    <label for="name">Name : </label>
                    <input type="text" name="name" id = "name" required value=""> <br>
                  </div>
                <div class="input-group">
                    <label for="username">Username : </label>
                    <input type="text" name="username" id = "username" required value=""> <br>
                 </div>
                <div class="input-group">
                    <label for="email">Email : </label>
                    <input type="email" name="email" id = "email" required value=""> <br>
                 </div>
                <div class="input-group">
                    <label for="password">Password : </label>
                    <input type="password" name="password" id = "password" required value=""> <br>
                 </div>
                 <div class="input-group"> 
                    <label for="confirmpassword">Confirm Password : </label>
                    <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
                 </div>
                <div class="input-group"> 
                    <button type="submit" name="submit">Register</button>
                 </div>   
        <p class="login-register-text">Have an account?<a href="login.php">Login</a>.</p>
      </form>
    </div>
  </body>
</html>


