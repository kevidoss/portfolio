<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "volk.php";


function getAllVolk(){
    //DB CONNECTIE MAKEN
    require("connectie.php");
    try{
        $stmt = $db->prepare("SELECT * FROM volk");
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
        $stmt = $db->prepare("DELETE FROM volk WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $message = "People Removed";

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
        <h1>PEOPLES</h1>
        <p class="lead">Explore a list of peoples with historical significance</p>


        <?php
         session_start();
        require('connect.php');

         if (isset($_SESSION['username'])) {
         ?>

        <p>Is there another people missing from this list? Add it <a href="insert_volk.php">HERE</a></p>
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
          <thead>
            <tr>
                <th>Name</th>
                <th>Region</th>
                <th>Importance</th>
                <th>Actions</th>
            </tr>
          </thead>

            <?php
              $result =  getAllVolk();
              foreach($result as $row){
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td><a href='volk_detail.php?id={$row['id']}'>{$row['volk_naam']}</td>";
                    echo "<td>{$row['regio']}</td>";
                    echo "<td>{$row['bijdrage']}</td>";

                    session_start();
                   require('connect.php');

                    if (isset($_SESSION['username'])) {
                    echo "<td>
                            <a href='edit_volk.php?edit_id={$row['id']}'>
                             <span class='glyphicon glyphicon-pencil'></span>
                            </a>
                             <a href='volk.php?delete_id={$row['id']}'>
                             <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            <a href='insert_volk.php?new={$row['id']}'>
                            <span class='glyphicon glyphicon-plus'></span>
                           </a>
                        </td>";

} else {
  echo "<td>You must be logged-in to edit this item</td>";
}

                  echo "</tr>";
                  echo "</tbody>";
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
