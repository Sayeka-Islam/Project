<?php
include "connection.php";

if (isset($_POST["sub"])) {
  $username = $_POST["username"];
  $pass = $_POST["pass"];

  if (empty($username)) {
    $error_username = "This section must not be empty.";
  }

  if (empty($pass)) {
    $error_pass =  "This section must not be empty.";
  }

  $count = mysqli_num_rows(mysqli_query($connection, "select * from user_login where Username='$username' AND Password='$pass' "));

  if ($count == 1) {
    echo "sucess";
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["pass"] = $pass;
    header("location: homepage.php");
  } else {
    $msg = "Try Again";
  }
}
?>



<html>

<head>
  <title>Login page</title>
  <link rel="stylesheet" href="login_style.css">
</head>

<body>
  <div class="cls1">
    <div id="id1">
      <h2> Log In </h2>

      <div class="logo">
        <img src="img/logo.webp" style="size: 20px" alt="User Icon" />
      </div>

      <form action="" method="POST">
        <input type="text" name="username" placeholder="Email">
        <span style="color: red;">
          <?php echo isset($error_username) ? $error_username : ""; ?>
        </span>

        <input type="password" name="pass" placeholder="Password" id="pass">
        <span style="color: red;">
          <?php echo isset($error_pass) ? $error_pass : ""; ?>
        </span>
        <br>

        <input type="submit" name="sub" value="Log in" class="cls2">
        <span style="color: blue">
          <?php echo isset($msg) ? $msg : ""; ?>
        </span>

      </form>
    </div>
  </div>


</body>

</html>