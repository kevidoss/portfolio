<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "uitvinding.php";


function getAllUitvinding(){
    require("connectie.php");
    try{
        $stmt = $db->prepare("SELECT * FROM uitvinding
                            LEFT JOIN tijdperk
                            ON uitvinding.tijd_id =
                            tijdperk.id

                            LEFT JOIN mens
                            ON uitvinding.mens_id =
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
    $uitvinding_id = $_GET["delete_id"];
    //VERWIJDER RECORD MET DAT ID
    try{
        $stmt = $db->prepare("DELETE FROM uitvinding WHERE uitvinding_id=:uitvinding_id");
        $stmt->bindParam(":uitvinding_id",$uitvinding_id);
        $stmt->execute();

        $message = "Invention Removed";

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
        <h1>INVENTIONS</h1>
        <p class="lead">Explore a list of important inventions</p>


        <?php
         session_start();
        require('connect.php');

         if (isset($_SESSION['username'])) {
         ?>

        <p>Is there an invention missing from this list? Add it <a href="insert_uitvinding.php">HERE</a></p>
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
                <th>Inventor</th>
                <th>Actions</th>
            </tr>

            <?php
              $result =  getAllUitvinding();
              foreach($result as $row){
                  echo "<tr>";
                    echo "<td><a href='uitvinding_detail.php?id={$row['uitvinding_id']}'>{$row['uitvinding_naam']}</td>";
                    echo "<td><a href='tijdperk_detail.php?id={$row['tijd_id']}'>{$row['tijd_naam']}</a></td>";
                    echo "<td><a href='mens_detail.php?id={$row['mens_id']}'>{$row['mens_naam']}</a></td>";

                    session_start();
                   require('connect.php');

                    if (isset($_SESSION['username'])) {
                    echo "<td>
                            <a href='edit_uitvinding.php?edit_id={$row['uitvinding_id']}'>
                             <span class='glyphicon glyphicon-pencil'></span>
                            </a>
                             <a href='uitvinding.php?delete_id={$row['uitvinding_id']}'>
                             <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            <a href='insert_uitvinding.php?new={$row['uitvinding_id']}'>
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
