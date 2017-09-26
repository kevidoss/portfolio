<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "kunstwerk.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$kunstwerk_naam = $_POST["kunstwerk_naam"];
	$tijd_id = $_POST["tijd_id"];
  $mens_id = $_POST["mens_id"];
	$kunstwerk_detail = $_POST["kunstwerk_detail"];
	$kunstwerk_id = $_POST["kunstwerk_id"];

	try{
		$stmt = $db->prepare("UPDATE kunstwerk
							SET kunstwerk_naam=:kunstwerk_naam, tijd_id=:tijd_id, mens_id=:mens_id, kunstwerk_detail=:kunstwerk_detail
							WHERE kunstwerk_id=:kunstwerk_id");
		$stmt->bindParam(":kunstwerk_naam", $kunstwerk_naam);
		$stmt->bindParam(":tijd_id", $tijd_id);
    $stmt->bindParam(":mens_id", $mens_id);
		$stmt->bindParam(":kunstwerk_detail", $kunstwerk_detail);
		$stmt->bindParam(":kunstwerk_id", $kunstwerk_id);

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
	$stmt = $db->prepare("SELECT * FROM kunstwerk WHERE kunstwerk_id=:sid");
	$stmt->bindParam(":sid",$kunstwerk_id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_kunstwerk.php" method="post">
			<h2>Edit Artwork</h2>
		<div class="form-group">
			<label for="kunstwerk_naam">Name</label>
			<input id="kunstwerk_naam" name="kunstwerk_naam" type="text" class="form-control" required value="<?php echo $kunstwerk_naam; ?>">
		</div>
    <div class="form-group">
			<label for="tijd_id">Time period</label>
			<input id="tijd_id" name="tijd_id" type="text" class="form-control" required value="<?php echo $tijd_id; ?>">
		</div>
    <div class="form-group">
			<label for="mens_id">Artist</label>
			<input id="mens_id" name="mens_id" type="text" class="form-control" required value="<?php echo $mens_id; ?>">
		</div>
		<div class="form-group">
			<label for="kunstwerk_detail">Details</label>
			<input id="kunstwerk_detail" name="kunstwerk_detail" type="text" class="form-control" required value="<?php echo $kunstwerk_detail; ?>">
		</div>
		<div class="form-group">
			<label for="kunstwerk_id">Artwork ID</label>
			<input id="kunstwerk_id" name="kunstwerk_id" type="text" class="form-control" required  readonly value="<?php echo $kunstwerk_id; ?>">
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
	<a class="button" href="kunstwerk.php">Artwork overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
