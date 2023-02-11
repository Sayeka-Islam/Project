<?php
include "connection.php";

if (isset($_POST["sub"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $mobile = $_POST["mobile"];
  $pass = $_POST["pass"];

  if (empty($name)) {
    $error_name = "This section must not be empty.";
  }
  if (empty($email)) {
    $error_email =  "This section must not be empty.";
  }
  if (empty($pass)) {
    $error_pass =  "This section must not be empty.";
  }
  if (empty($mobile)) {
    $error_mobile =  "This section must not be empty.";
  }
  if (strlen($mobile) != 11)
    $error_mobile_len =  "  Mobile number length must be 11 numbers.";

  if (!empty($name) && !empty($email) && !empty($mobile) && !empty($pass) && strlen($mobile) == 11) {
    echo "Name: $name, email: $email, mobile: $mobile, Password: $pass <br>";

    $check_email = mysqli_query($connection, "select * from registration where Email='$email' ");
    $count_email = mysqli_num_rows($check_email);

    $check_mobile = mysqli_query($connection, "select * from registration where Mobile='$mobile' ");
    $count_mobile = mysqli_num_rows($check_mobile);

    if ($count_email > 0) {
      echo "Already exist email";
    } else if ($count_mobile > 0) {
      echo "Already exist mobile";
    } else {
      $query = mysqli_query($connection, "insert into registration (Name, Email, Mobile, Password) values('$name', '$email', '$mobile', '$pass')");

      $query = mysqli_query($connection, "insert into user_login (Username, Password) values('$email', '$pass')");

      header("location: loginpage.php");
    }
  }
}
?>
<html>

<head>
  <title>Resistration page</title>

  <link rel="stylesheet" href="Resistration_style.css">
</head>

<body>
  <header></header>

  <main>
    <div class="cls1">
      <div id="id1">
        <h2> Registration </h2>

        <div>
          <img src="img/logo.webp" style="size: 20px" alt="User Icon" />
        </div>


        <form action="" method="POST">

          <input type="text" name="name" placeholder="Your Name">
          <span style="color: red;">
            <?php echo isset($error_name) ? $error_name : ""; ?>
          </span> <br>


          <input type="text" name="email" placeholder="Your Email">

          <span style="color: red;">
            <?php echo isset($error_email) ? $error_email : ""; ?>
          </span>



          <input type="number" name="mobile" placeholder=" Mobile">

          <span style="color: red;">
            <?php echo isset($error_mobile) ? $error_mobile : ""; ?>
          </span>

          <span style="color: red;">
            <?php echo isset($error_mobile_len) ? $error_mobile_len : ""; ?>
          </span>

          <input type="password" name="pass" placeholder=" Password">
          <span style="color: red;">
            <?php echo isset($error_pass) ? $error_pass : ""; ?>
          </span>

          <input type="submit" value="Submit" class="cls2" name="sub">
        </form>

      </div>
    </div>
  </main>

  <footer></footer>

</body>

</html>