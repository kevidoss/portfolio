<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "profile.php";

if(isset($_POST['edit'])){
  //GEKLIKT OP EDITKNOP
  require("connectie.php");

  $id = $_POST["id"];
  $username = $_POST["username"];
  $password = $_POST["password"];


  try{
    $stmt = $db->prepare("UPDATE login
              SET username=:username, password=:password
              WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);


    $stmt->execute();
    $message = "SUCCES";
     //CONNECTIE SLUITEN
        $db = null;


  }catch(PDOExeption $e)
  {
    $message = $e;
  }




}

if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
  $id = $_GET['edit_id'];


  require("connectie.php");
  $stmt = $db->prepare("SELECT * FROM login WHERE id=:sid");
  $stmt->bindParam(":sid",$id);
  $stmt->execute();
  $result = $stmt->fetch();

  extract($result);

  $db = null;
}



?>
  <div class="container">
    <div class="row">
    <form role="form" class="col-md-9 go-right" action="edit_profile.php" method="post">
      <h2>Edit Login</h2>
    <div class="form-group">
      <label for="username">Username</label>
      <input id="username" name="username" type="text" class="form-control" required value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input id="password" name="password" type="text" class="form-control" required value="<?php echo $password; ?>">
    </div>
    <div class="form-group">
      <input id="edit" name="edit" type="submit" class="form-control" value="Edit">

    </div>
    </form>
        <?php
        if(!empty($message)){
            echo "<p class='bg-success' >{$message}</p>";
        }
        ?>


  </div>
  <a class="button" href="profile.php">View Profile</a>
</div>


<?php include 'includes/footer.php' ?>
