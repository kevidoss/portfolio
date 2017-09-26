<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "brands.php";


function getAllBrands(){
    //DB CONNECTIE MAKEN
    require("connectie.php");
    try{
        $stmt = $db->prepare("SELECT * FROM brands");
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
        $stmt = $db->prepare("DELETE FROM brands WHERE id=:id");
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $message = "Brand Removed";

        //CONNECTIE SLUITEN
        $db = null;


    }catch(PDOExeption $e){
      $message = $e;
    }
}

?>
    <div class="container">
        <h1>Brands</h1>
        <p>Find your favorite brands' websites or add your own favorite <a href="insert_brand.php">HERE</a></p>

        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Website</th>
                <th>Actions</th>
            </tr>

            <?php
              $result =  getAllBrands();
              foreach($result as $row){
                  echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['name']}</td>";
                    echo "<td><a href=
                    '{$row['website']}' target='_blank'>{$row['website']}</a></td>";
                    echo "<td>
                            <a href='edit_brand.php?edit_id={$row['id']}'>
                             <span class='glyphicon glyphicon-pencil'></span>
                            </a>
                             <a href='brands.php?delete_id={$row['id']}'>
                             <span class='glyphicon glyphicon-trash'></span>
                            </a>
                            <a href='insert_brand.php?new={$row['id']}'>
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
