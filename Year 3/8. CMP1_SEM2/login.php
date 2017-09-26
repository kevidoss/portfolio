<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>


<div class="container">
  <div class="row">
    <div class="starter-template">
      <h1>Login</h1>
      <p class="lead">Login to access extra features</p>
    <form action="login.php" method="POST">
        <p>Username:</p>
        <p> <input type="text" name="username" required> </p>
        <p>Password:</p>
        <p><input type="password" name="password" required> </p>
        <input type="submit" name="login" value="Login">
    </form>
    <br>
    <p>Not a member yet? Register <a href="register.php">HERE</a></p>
  </div>
    <div class="bigger">

      <?php
      session_start();
       require('connect.php');

      if (isset($_POST['username']) and isset($_POST['password'])){

      $username = $_POST['username'];
      $password = $_POST['password'];

      $query = "SELECT * FROM `login` WHERE username='$username' and password='$password'";

      $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
      $count = mysqli_num_rows($result);

      if ($count == 1){
      $_SESSION['username'] = $username;
      }else{

      $fmsg = "Invalid Login Credentials.";
      }
      }

      if (isset($_SESSION['username'])){
      $username = $_SESSION['username'];
      echo "<br>";
      echo "Welcome ". "<b>" . $username . "</b>". "!";
      echo "<br>";
      echo "You are now logged in to the website, to view your profile click <a href='profile.php'>HERE</a>";
      echo "<br>";
      echo "If you wish to log out, you can do that by clicking this link: <a href='logout.php'>Logout</a>";

      }else{
      //3.2 When the user visits the page first time, simple login form will be displayed.
      }
      ?>

    </div>
</div>
</div>



<?php require_once("includes/footer.php"); ?>
