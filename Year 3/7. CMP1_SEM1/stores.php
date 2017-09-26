<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "stores.php";


function getAllStores(){
    //DB CONNECTIE MAKEN
    require("connectie.php");
    try{
        $stmt = $db->prepare("SELECT * FROM stores");
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
        $stmt = $db->prepare("DELETE FROM stores WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $message = "Store Removed";

        //CONNECTIE SLUITEN
        $db = null;


    }catch(PDOExeption $e){
      $message = $e;
    }
}

?>
    <div class="container">
        <h1>Stores</h1>
        <p>Find out what stores are nearby</p>

        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Brands</th>
                <th>Actions</th>
            </tr>

            <?php
              $result =  getAllStores();
              foreach($result as $row){
                  echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td>{$row['address']}</td>";
                    echo "<td>{$row['brands']}</td>";
                    echo "<td>
                            <a href='edit_store.php?edit_id={$row['id']}'>
                             <span class='glyphicon glyphicon-pencil'></span>
                            </a>
                             <a href='stores.php?delete_id={$row['id']}'>
                             <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            <a href='insert_store.php?new={$row['id']}'>
                            <span class='glyphicon glyphicon-plus'></span>
                           </a>
                        </td>";
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
