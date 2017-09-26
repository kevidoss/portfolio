<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "uitvinding.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$uitvinding_naam = $_POST["uitvinding_naam"];
	$tijd_id = $_POST["tijd_id"];
  $mens_id = $_POST["mens_id"];
	$uitvinding_detail = $_POST["uitvinding_detail"];
	$uitvinding_id = $_POST["uitvinding_id"];

	try{
		$stmt = $db->prepare("UPDATE uitvinding
							SET uitvinding_naam=:uitvinding_naam, tijd_id=:tijd_id, mens_id=:mens_id, uitvinding_detail=:uitvinding_detail
							WHERE uitvinding_id=:uitvinding_id");
		$stmt->bindParam(":uitvinding_naam", $uitvinding_naam);
		$stmt->bindParam(":tijd_id", $tijd_id);
    $stmt->bindParam(":mens_id", $mens_id);
		$stmt->bindParam(":uitvinding_detail", $uitvinding_detail);
		$stmt->bindParam(":uitvinding_id", $uitvinding_id);

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
	$stmt = $db->prepare("SELECT * FROM uitvinding WHERE uitvinding_id=:sid");
	$stmt->bindParam(":sid",$uitvinding_id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_uitvinding.php" method="post">
			<h2>Edit Invention</h2>
		<div class="form-group">
			<label for="uitvinding_naam">Name</label>
			<input id="uitvinding_naam" name="uitvinding_naam" type="text" class="form-control" required value="<?php echo $uitvinding_naam; ?>">
		</div>
    <div class="form-group">
			<label for="tijd_id">Time period</label>
			<input id="tijd_id" name="tijd_id" type="text" class="form-control" required value="<?php echo $tijd_id; ?>">
		</div>
    <div class="form-group">
			<label for="mens_id">Inventor</label>
			<input id="mens_id" name="mens_id" type="text" class="form-control" required value="<?php echo $mens_id; ?>">
		</div>
		<div class="form-group">
			<label for="uitvinding_detail">Details</label>
			<input id="uitvinding_detail" name="uitvinding_detail" type="text" class="form-control" required value="<?php echo $uitvinding_detail; ?>">
		</div>
		<div class="form-group">
			<label for="uitvinding_id">Invention ID</label>
			<input id="uitvinding_id" name="uitvinding_id" type="text" class="form-control" required  readonly value="<?php echo $uitvinding_id; ?>">
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
	<a class="button" href="uitvinding.php">Inventions overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
