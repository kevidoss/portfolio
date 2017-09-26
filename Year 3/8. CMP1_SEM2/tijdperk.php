<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "tijdperk.php";


function getAllTijd(){
    //DB CONNECTIE MAKEN
    require("connectie.php");
    try{
        $stmt = $db->prepare("SELECT * FROM tijdperk");
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
        $stmt = $db->prepare("DELETE FROM tijdperk WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $message = "Time period Removed";

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
        <h1>TIME PERIODS</h1>
        <p class="lead">Explore a list of time periods</p>


        <?php
         session_start();
        require('connect.php');

         if (isset($_SESSION['username'])) {
         ?>

        <p>Is there a time period missing from this list? Add it <a href="insert_tijdperk.php">HERE</a></p>
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
                <th>Start</th>
                <th>End</th>
                <th>Actions</th>
            </tr>

            <?php
              $result =  getAllTijd();
              foreach($result as $row){
                  echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td><a href='tijdperk_detail.php?id={$row['id']}'>{$row['tijd_naam']}</a></td>";
                    echo "<td>{$row['start']}</td>";
                    echo "<td>{$row['einde']}</td>";

                    session_start();
                   require('connect.php');

                    if (isset($_SESSION['username'])) {
                    echo "<td>
                            <a href='edit_tijdperk.php?edit_id={$row['id']}'>
                             <span class='glyphicon glyphicon-pencil'></span>
                            </a>
                             <a href='tijdperk.php?delete_id={$row['id']}'>
                             <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            <a href='insert_tijdperk.php?new={$row['id']}'>
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
