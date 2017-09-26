<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "volk.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$volk_naam = $_POST["volk_naam"];
	$regio = $_POST["regio"];
  $bijdrage = $_POST["bijdrage"];
	$volk_detail = $_POST["volk_detail"];
	$id = $_POST["id"];

	try{
		$stmt = $db->prepare("UPDATE volk
							SET volk_naam=:volk_naam, regio=:regio, bijdrage=:bijdrage, volk_detail=:volk_detail
							WHERE id=:id");
		$stmt->bindParam(":volk_naam", $volk_naam);
		$stmt->bindParam(":regio", $regio);
    $stmt->bindParam(":bijdrage", $bijdrage);
		$stmt->bindParam(":volk_detail", $volk_detail);
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
	$stmt = $db->prepare("SELECT * FROM volk WHERE id=:sid");
	$stmt->bindParam(":sid",$id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_volk.php" method="post">
			<h2>Edit People</h2>
		<div class="form-group">
			<label for="volk_naam">Name</label>
			<input id="volk_naam" name="volk_naam" type="text" class="form-control" required value="<?php echo $volk_naam; ?>">
		</div>
		<div class="form-group">
			<label for="regio">Region</label>
			<input id="regio" name="regio" type="text" class="form-control" required value="<?php echo $regio; ?>">
		</div>
    <div class="form-group">
			<label for="bijdrage">Importance</label>
			<input id="bijdrage" name="bijdrage" type="text" class="form-control" required value="<?php echo $bijdrage; ?>">
		</div>
		<div class="form-group">
			<label for="volk_detail">Details</label>
			<input id="volk_detail" name="volk_detail" type="text" class="form-control" required value="<?php echo $volk_detail; ?>">
		</div>
		<div class="form-group">
			<label for="id">People ID</label>
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
	<a class="button" href="volk.php">Peoples overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
