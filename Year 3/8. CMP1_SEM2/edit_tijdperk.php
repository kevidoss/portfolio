<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "tijdperk.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$tijd_naam = $_POST["tijd_naam"];
	$start = $_POST["start"];
  $einde = $_POST["einde"];
	$tijdperk_detail = $_POST["tijdperk_detail"];
	$id = $_POST["id"];

	try{
		$stmt = $db->prepare("UPDATE tijdperk
							SET tijd_naam=:tijd_naam, start=:start, einde=:einde, tijdperk_detail=:tijdperk_detail
							WHERE id=:id");
		$stmt->bindParam(":tijd_naam", $tijd_naam);
		$stmt->bindParam(":start", $start);
    $stmt->bindParam(":einde", $einde);
		$stmt->bindParam(":tijdperk_detail", $tijdperk_detail);
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
	$stmt = $db->prepare("SELECT * FROM tijdperk WHERE id=:sid");
	$stmt->bindParam(":sid",$id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_tijdperk.php" method="post">
			<h2>Edit Time period</h2>
		<div class="form-group">
			<label for="tijd_naam">Name</label>
			<input id="tijd_naam" name="tijd_naam" type="text" class="form-control" required value="<?php echo $tijd_naam; ?>">
		</div>
		<div class="form-group">
			<label for="start">Start</label>
			<input id="start" name="start" type="text" class="form-control" required value="<?php echo $start; ?>">
		</div>
    <div class="form-group">
			<label for="einde">End</label>
			<input id="einde" name="einde" type="text" class="form-control" required value="<?php echo $einde; ?>">
		</div>
		<div class="form-group">
			<label for="tijdperk_detail">Details</label>
			<input id="tijdperk_detail" name="tijdperk_detail" type="text" class="form-control" required value="<?php echo $tijdperk_detail; ?>">
		</div>
		<div class="form-group">
			<label for="id">Time period ID</label>
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
	<a class="button" href="tijdperk.php">Time period overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
