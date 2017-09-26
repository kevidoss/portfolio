<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "brands.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$name = $_POST["name"];
	$website = $_POST["website"];
	$id = $_POST["id"];

	try{
		$stmt = $db->prepare("UPDATE brands
							SET name=:name, website=:website
							WHERE id=:id");
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":website", $website);
		$stmt->bindParam(":id", $id);

		$stmt->execute();
		$message = "SUCCES";
		 //CONNECTIE SLUITEN
        $db = null;


	}catch(PDOExeption $e)
	{
		$message = $e;
	}




}

if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
	$id = $_GET['edit_id'];


	require("connectie.php");
	$stmt = $db->prepare("SELECT * FROM brands WHERE id=:sid");
	$stmt->bindParam(":sid",$id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_brand.php" method="post">
			<h2>Edit Brand</h2>
		<div class="form-group">
			<label for="name">Name</label>
			<input id="name" name="name" type="text" class="form-control" required value="<?php echo $name; ?>">
		</div>
		<div class="form-group">
			<label for="website">Website</label>
			<input id="website" name="website" type="text" class="form-control" required value="<?php echo $website; ?>">
		</div>
		<div class="form-group">
			<label for="id">Brand ID</label>
			<input id="id" name="id" type="text" class="form-control" required  readonly value="<?php echo $id; ?>">
		</div>
		<div class="form-group">
			<input id="edit" name="edit" type="submit" class="form-control" value="Edit">

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
