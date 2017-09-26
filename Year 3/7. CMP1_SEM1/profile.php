<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>


<?php
session_start();

if(isset($_SESSION['username'])){
    //JE BENT INGELOGD
}else{
    //JE NIET BENT INGELOGD: REDIRECT TO LOGIN
    header("Location: login.php");
}

?>


<div class="container">
  <div class="row">
    <h1><?php echo $_SESSION['username'] ?>'s Profile</h1>
    <p> Welkom <?php echo $_SESSION['username'] ?> </p>
    <p>Post your story <a href="create.php">HERE</a></p>
    <p>Upload a picture <a href="imgupload.php">HERE</a></p>
    <p>Find your favorite brand <a href="brands.php">HERE</a></p>
    <p>Find your stores nearby <a href="stores.php">HERE</a></p>
<br>
    <p><a href="logout.php">Logout</a></p>
  </div>
</div>

<?php include 'includes/footer.php' ?>
