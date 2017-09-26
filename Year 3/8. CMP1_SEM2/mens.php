<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "mens.php";


function getAllMens(){
    //DB CONNECTIE MAKEN
    require("connectie.php");
    try{
        $stmt = $db->prepare("SELECT * FROM mens");
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
    $id = $_GET["delete_id"];
    //VERWIJDER RECORD MET DAT ID
    try{
        $stmt = $db->prepare("DELETE FROM mens WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $message = "Person Removed";

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
        <h1>INDIVIDUALS</h1>
        <p class="lead">Explore a list of individuals who have all earned their place in the history books</p>


        <?php
         session_start();
        require('connect.php');

         if (isset($_SESSION['username'])) {
         ?>

        <p>Is someone missing from this list? Add that person <a href="insert_mens.php">HERE</a></p>
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
                <th>ID</th>
                <th>Name</th>
                <th>Importance</th>
                <th>Birth - Death</th>
                <th>Actions</th>
            </tr>

            <?php
              $result =  getAllMens();
              foreach($result as $row){
                  echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td><a href='mens_detail.php?id={$row['id']}'>{$row['mens_naam']}</a></td>";
                    echo "<td>{$row['bijdrage']}</td>";
                    echo "<td>{$row['leven']}</td>";

                    session_start();
                   require('connect.php');

                    if (isset($_SESSION['username'])) {
                    echo "<td>
                            <a href='edit_mens.php?edit_id={$row['id']}'>
                             <span class='glyphicon glyphicon-pencil'></span>
                            </a>
                             <a href='mens.php?delete_id={$row['id']}'>
                             <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            <a href='insert_mens.php?new={$row['id']}'>
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
