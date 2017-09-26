<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>


<div class="container">
  <div class="row">
    <h1><?php echo $_SESSION['username'] ?>'s Profile</h1>
    <p> Welkom <?php echo $_SESSION['username'] ?> </p>
    <p>Take part in a discussion over at our <a href="posts.php">FORUM</a></p>
    <p>You can now upload your own pictures <a href="imgupload.php">HERE</a></p>



<?php
$servername = "localhost";
$username = "root";
$password = "bitnami";
$dbname = "herexamen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, password, user_detail FROM login LIMIT 1";
$result = $conn->query($sql);

if(isset($_GET["delete_id"])){
    //KNOP DELETE GEKLIKT
    require("connectie.php");
    $id = $_GET["delete_id"];
    //VERWIJDER RECORD MET DAT ID
    try{
        $stmt = $db->prepare("DELETE FROM login WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $message = "Login Removed";

        //CONNECTIE SLUITEN
        $db = null;


    }catch(PDOExeption $e){
      $message = $e;
    }
}


if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    echo "<p>Change your username and password ". "<a href='edit_profile.php?edit_id={$row['id']}'>". "HERE". "</a>"."</p>
          <p>Extra information: ". "{$row['user_detail']}". "</p>";
}
} else {
   echo "0 results";
}


$conn->close();

?>

</div>
</div>



<?php include 'includes/footer.php' ?>
