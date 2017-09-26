<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "insert_brand.php";


if(isset($_POST['new'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$name = $_POST["name"];
	$website = $_POST["website"];

	try{
		$stmt = $db->prepare("INSERT INTO brands
                        (name, website)
                        VALUES
                        (:name, :website)");
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":website", $website);

		$stmt->execute();
		$message = "SUCCES";
		 //CONNECTIE SLUITEN
        $db = null;


	}catch(PDOExeption $e)
	{
		$message = $e;
	}

}




?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="insert_brand.php" method="post">
			<h2>New Brand</h2>
		<div class="form-group">
			<label for="name">Name</label>
			<input id="name" name="name" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="website">Website</label>
			<input id="website" name="website" type="text" class="form-control" required >
		</div>

		<div class="form-group">
			<input id="new" name="new" type="submit" class="form-control" value="Add">

		</div>
		</form>
        <?php
        if(!empty($message)){
            echo "<p class='bg-success' >{$message}</p>";
        }
        ?>


	</div>
	<a class="btn btn-primary" href="brands.php">Brands overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
