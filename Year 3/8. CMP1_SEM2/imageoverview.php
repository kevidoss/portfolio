<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php

if(isset($_GET["delete_id"])){
    //KNOP DELETE GEKLIKT
    require("connectie.php");
    $image_id = $_GET["delete_id"];
    //VERWIJDER RECORD MET DAT ID
    try{
        $stmt = $db->prepare("DELETE FROM image_upload WHERE image_id=:image_id");
        $stmt->bindParam(":image_id",$image_id);
        $stmt->execute();

        $message = "Image Removed";

        //CONNECTIE SLUITEN
        $db = null;


    }catch(PDOExeption $e){
      $message = $e;
    }
}

 ?>

    <div class="container" id="imageupload">

      <div class="starter-template">
        <h1>Image Overview</h1>
        <p class="lead">Here you can see all pictures uploaded by the users</p>

        <?php
         session_start();
        require('connect.php');

         if (isset($_SESSION['username'])) {
         ?>

        <p>Add your own picture <a href="imgupload.php">HERE</a></p>

        <?php

        } else {
          ?>
          <p>You must be logged-in to upload your own pictures. Log in <a href="login.php">HERE</a></p>

          <?php
        }
        ?>

      </div>


<div class="row">

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

    $sql = "SELECT image_id, image_name, image FROM image_upload";
    $result = $conn->query($sql);

    $i = 1;

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($i%2 == 0){
        echo "<div class='col-md-6'><h4>{$row['image_name']} - <a href='imgupload.php'>
        <span class='glyphicon glyphicon-plus'></span>
       </a> <a href='edit_image.php?edit_id={$row['image_id']}'>
        <span class='glyphicon glyphicon-pencil'></span>
       </a> <a href='imageoverview.php?delete_id={$row['image_id']}'>
        <span class='glyphicon glyphicon-trash'></span>
       </a></h4><img src='uploads/{$row['image']}' style='width: 100%; height: auto;'></div></div>";
      }else {
        echo "<div class='row'><div class='col-md-6'><h4>{$row['image_name']} - <a href='imgupload.php'>
        <span class='glyphicon glyphicon-plus'></span>
       </a> <a href='edit_image.php?edit_id={$row['image_id']}'>
        <span class='glyphicon glyphicon-pencil'></span>
       </a> <a href='imageoverview.php?delete_id={$row['image_id']}'>
        <span class='glyphicon glyphicon-trash'></span>
       </a></h4><img src='uploads/{$row['image']}' style='width: 100%; height: auto;'></div>";
      }
      $i++;
    }
    } else {
       echo "0 results";
    }



    $conn->close();

    ?>

  </div>

   </div><!-- /.container -->






<?php include 'includes/footer.php' ?>
