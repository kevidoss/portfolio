<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "imageoverview.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$image_name = $_POST["image_name"];
	$image_id = $_POST["image_id"];

	try{
		$stmt = $db->prepare("UPDATE image_upload
							SET image_name=:image_name
							WHERE image_id=:image_id");
		$stmt->bindParam(":image_name", $image_name);
		$stmt->bindParam(":image_id", $image_id);

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
	$image_id = $_GET['edit_id'];


	require("connectie.php");
	$stmt = $db->prepare("SELECT image_name, image_id FROM image_upload WHERE image_id=:image_id");
	$stmt->bindParam(":image_id",$image_id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_image.php" method="post">
			<h2>Edit Image</h2>
		<div class="form-group">
			<label for="image_name">Name</label>
			<input id="image_name" name="image_name" type="text" class="form-control" required value="<?php echo $image_name; ?>">
		</div>
		<div class="form-group">
			<label for="image_id">Image ID</label>
			<input id="image_id" name="image_id" type="text" class="form-control" required  readonly value="<?php echo $image_id; ?>">
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
	<a class="button" href="imageoverview.php">Pictures overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
