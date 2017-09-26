<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "religie.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$religie_naam = $_POST["religie_naam"];
	$boek = $_POST["boek"];
  $land = $_POST["land"];
	$religie_detail = $_POST["religie_detail"];
	$id = $_POST["id"];

	try{
		$stmt = $db->prepare("UPDATE religie
							SET religie_naam=:religie_naam, boek=:boek, land=:land, religie_detail=:religie_detail
							WHERE id=:id");
		$stmt->bindParam(":religie_naam", $religie_naam);
		$stmt->bindParam(":boek", $boek);
    $stmt->bindParam(":land", $land);
		$stmt->bindParam(":religie_detail", $religie_detail);
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
	$stmt = $db->prepare("SELECT * FROM religie WHERE id=:sid");
	$stmt->bindParam(":sid",$id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_religie.php" method="post">
			<h2>Edit Religion</h2>
		<div class="form-group">
			<label for="religie_naam">Name</label>
			<input id="religie_naam" name="religie_naam" type="text" class="form-control" required value="<?php echo $religie_naam; ?>">
		</div>
		<div class="form-group">
			<label for="boek">Holy Book</label>
			<input id="boek" name="boek" type="text" class="form-control" required value="<?php echo $boek; ?>">
		</div>
    <div class="form-group">
			<label for="land">Holy Land</label>
			<input id="land" name="land" type="text" class="form-control" required value="<?php echo $land; ?>">
		</div>
		<div class="form-group">
			<label for="religie_detail">Details</label>
			<input id="religie_detail" name="religie_detail" type="text" class="form-control" required value="<?php echo $religie_detail; ?>">
		</div>
		<div class="form-group">
			<label for="id">Religion ID</label>
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
	<a class="button" href="religie.php">Religion overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
