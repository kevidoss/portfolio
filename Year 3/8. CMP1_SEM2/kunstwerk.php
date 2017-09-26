<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "kunstwerk.php";


function getAllKunstwerk(){
    require("connectie.php");
    try{
        $stmt = $db->prepare("SELECT * FROM kunstwerk
                            LEFT JOIN tijdperk
                            ON kunstwerk.tijd_id =
                            tijdperk.id

                            LEFT JOIN mens
                            ON kunstwerk.mens_id =
                            mens.id
                            ");
        $stmt->execute();

        $result = $stmt->fetchAll();
        return $result;
        //CONNECTIE SLUITEN
        $db = null;

    }catch(PDOExeption $e){
        $message = $e;
    }
}


if(isset($_GET["delete_id"])){
    //KNOP DELETE GEKLIKT
    require("connectie.php");
    $kunstwerk_id = $_GET["delete_id"];
    //VERWIJDER RECORD MET DAT ID
    try{
        $stmt = $db->prepare("DELETE FROM kunstwerk WHERE kunstwerk_id=:kunstwerk_id");
        $stmt->bindParam(":kunstwerk_id",$kunstwerk_id);
        $stmt->execute();

        $message = "Artwork Removed";

        //CONNECTIE SLUITEN
        $db = null;


    }catch(PDOExeption $e){
      $message = $e;
    }
}

?>
    <div class="container">
      <div class="row">
      <div class="starter-template">
        <h1>ARTWORK</h1>
        <p class="lead">Explore a list of beautiful artworks</p>


        <?php
         session_start();
        require('connect.php');

         if (isset($_SESSION['username'])) {
         ?>

        <p>Is there a piece of art missing from this list? Add it <a href="insert_kunstwerk.php">HERE</a></p>
        </div>
        <?php

        } else {
          ?>
          </div>
          <p></p>

          <?php
        }
        ?>
        </div>

        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Time period</th>
                <th>Artist</th>
                <th>Actions</th>
            </tr>

            <?php
              $result =  getAllKunstwerk();
              foreach($result as $row){
                  echo "<tr>";
                    echo "<td><a href='kunstwerk_detail.php?id={$row['kunstwerk_id']}'>{$row['kunstwerk_naam']}</td>";
                    echo "<td><a href='tijdperk_detail.php?id={$row['tijd_id']}'>{$row['tijd_naam']}</a></td>";
                    echo "<td><a href='mens_detail.php?id={$row['mens_id']}'>{$row['mens_naam']}</a></td>";

                    session_start();
                   require('connect.php');

                    if (isset($_SESSION['username'])) {
                    echo "<td>
                            <a href='edit_kunstwerk.php?edit_id={$row['kunstwerk_id']}'>
                             <span class='glyphicon glyphicon-pencil'></span>
                            </a>
                             <a href='kunstwerk.php?delete_id={$row['kunstwerk_id']}'>
                             <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            <a href='insert_kunstwerk.php?new={$row['kunstwerk_id']}'>
                            <span class='glyphicon glyphicon-plus'></span>
                           </a>
                        </td>";

} else {
  echo "<td>You must be logged-in to edit this item</td>";
}

                  echo "</tr>";
              }

            ?>
        </table>


        <?php
        if(!empty($message)){
            echo "<p class='bg-success' >{$message}</p>";
        }
        ?>
    </div>

<?php require_once("includes/footer.php"); ?>
