<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: mainP.php");
  exit;
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: mainP.php");
      exit;
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
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

	<title>Login Form - Pure Coding</title>
</head>
<body>
  <div class="container">
    
      <form class="" action="" method="post" autocomplete="off" class="login-email">

       <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
        
        <div class="input-group">
           <label for="usernameemail">Username or Email : </label>
           <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br><br>
         </div>
       
        <div class="input-group">
           <label for="password">Password : </label>
           <input type="password" name="password" id = "password" required value=""> <br>
         </div>
        <div class="input-group">
            <button type="submit" name="submit">Login</button>
         </div>
      <p class="login-register-text">Don't have an account?<a href="registration.php">Registration</a>.</p>
      </form>
  </div>
</body>
</html>
