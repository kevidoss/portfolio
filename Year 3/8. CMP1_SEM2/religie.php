<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "religie.php";


function getAllReligie(){
    //DB CONNECTIE MAKEN
    require("connectie.php");
    try{
        $stmt = $db->prepare("SELECT * FROM religie");
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
        $stmt = $db->prepare("DELETE FROM religie WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $message = "Religion Removed";

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
        <h1>RELIGION</h1>
        <p class="lead">Explore a list of religions from all over the world</p>


        <?php
         session_start();
        require('connect.php');

         if (isset($_SESSION['username'])) {
         ?>

        <p>Is there a religion missing from this list? Add it <a href="insert_religie.php">HERE</a></p>
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
                <th>Holy Book</th>
                <th>Holy Land</th>
                <th>Actions</th>
            </tr>

            <?php
              $result =  getAllReligie();
              foreach($result as $row){
                  echo "<tr>";
                    echo "<td><a href='religie_detail.php?id={$row['id']}'>{$row['religie_naam']}</td>";
                    echo "<td>{$row['boek']}</td>";
                    echo "<td>{$row['land']}</td>";

                    session_start();
                   require('connect.php');

                    if (isset($_SESSION['username'])) {
                    echo "<td>
                            <a href='edit_religie.php?edit_id={$row['id']}'>
                             <span class='glyphicon glyphicon-pencil'></span>
                            </a>
                             <a href='religie.php?delete_id={$row['id']}'>
                             <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            <a href='insert_religie.php?new={$row['id']}'>
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
