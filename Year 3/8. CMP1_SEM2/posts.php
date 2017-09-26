<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
 session_start();
require('connect.php');

 if (isset($_SESSION['username'])) {
 ?>

    <div class="container">

      <div class="starter-template">
        <h1>FORUM</h1>
        <p class="lead">Welcome to our forum</p>
        <p>Add your own post <a href="insert_post.php">HERE</a> </p>
      </div>

      <div class="row">
        <div class="col-md-12">

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

    $sql = "SELECT id, titel, auteur, bericht, tags FROM post";
    $result = $conn->query($sql);

    if(isset($_GET["delete_id"])){
        //KNOP DELETE GEKLIKT
        require("connectie.php");
        $id = $_GET["delete_id"];
        //VERWIJDER RECORD MET DAT ID
        try{
            $stmt = $db->prepare("DELETE FROM post WHERE id=:id");
            $stmt->bindParam(":id",$id);
            $stmt->execute();

            $message = "Post Removed";

            //CONNECTIE SLUITEN
            $db = null;


        }catch(PDOExeption $e){
          $message = $e;
        }
    }



    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='col-md-6' style='padding-left: 15%;'>". "<h2><a href='post_detail.php?id={$row['id']}'>". $row["titel"]."</a></h2>". "<p>" . $row["bericht"]. "</p>" . "<p><i>" . $row["auteur"]. "</i></p>". "<p>" . "<a href='edit_post.php?edit_id={$row['id']}'>
         <span class='glyphicon glyphicon-pencil'></span>
        </a>". "<a href='posts.php?delete_id={$row['id']}'>
        <span class='glyphicon glyphicon-trash'></span>
       </a>" . "<a href='insert_post.php?new={$row['id']}'>
       <span class='glyphicon glyphicon-plus'></span>
      </a>" . "</p>" ."</div>";
    }
    } else {
       echo "0 results";
    }

    $conn->close();

    ?>



  </div>
   </div>

   </div><!-- /.container -->

   <?php

 } else {

     ?>

     <div class="container">
       <div class="row">
        <div class="starter-template">
          <h1>FORUM</h1>
          <p class="lead">Sorry, you must be logged-in to view this page. If you wish to enter the forum please <a href="login.php">LOG IN</a></p>
        </div>
      </div>
     </div>

     <?php
   }
   ?>


<?php include 'includes/footer.php' ?>
