<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "mens.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$mens_naam = $_POST["mens_naam"];
  $bijdrage = $_POST["bijdrage"];
  $leven = $_POST["leven"];
	$mens_detail = $_POST["mens_detail"];
	$id = $_POST["id"];

	try{
		$stmt = $db->prepare("UPDATE mens
							SET mens_naam=:mens_naam, bijdrage=:bijdrage, leven=:leven, mens_detail=:mens_detail
							WHERE id=:id");
		$stmt->bindParam(":mens_naam", $mens_naam);
    $stmt->bindParam(":bijdrage", $bijdrage);
    $stmt->bindParam(":leven", $leven);
		$stmt->bindParam(":mens_detail", $mens_detail);
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
	$stmt = $db->prepare("SELECT * FROM mens WHERE id=:sid");
	$stmt->bindParam(":sid",$id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_mens.php" method="post">
			<h2>Edit Person</h2>
		<div class="form-group">
			<label for="mens_naam">Name</label>
			<input id="mens_naam" name="mens_naam" type="text" class="form-control" required value="<?php echo $mens_naam; ?>">
		</div>
    <div class="form-group">
			<label for="bijdrage">Importance</label>
			<input id="bijdrage" name="bijdrage" type="text" class="form-control" required value="<?php echo $bijdrage; ?>">
		</div>
    <div class="form-group">
			<label for="leven">Birth - Death</label>
			<input id="leven" name="leven" type="text" class="form-control" required value="<?php echo $leven; ?>">
		</div>
		<div class="form-group">
			<label for="mens_detail">Details</label>
			<input id="mens_detail" name="mens_detail" type="text" class="form-control" required value="<?php echo $mens_detail; ?>">
		</div>
		<div class="form-group">
			<label for="id">Person ID</label>
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
	<a class="button" href="mens.php">Individuals overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
