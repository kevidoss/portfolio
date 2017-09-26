<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "insert_tijdperk.php";


if(isset($_POST['new'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$tijd_naam = $_POST["tijd_naam"];
	$start = $_POST["start"];
  $einde = $_POST["einde"];
	$tijdperk_detail = $_POST["tijdperk_detail"];

	try{
		$stmt = $db->prepare("INSERT INTO tijdperk
                        (tijd_naam, start, einde, tijdperk_detail)
                        VALUES
                        (:tijd_naam, :start, :einde, :tijdperk_detail)");
		$stmt->bindParam(":tijd_naam", $tijd_naam);
		$stmt->bindParam(":start", $start);
    $stmt->bindParam(":einde", $einde);
		$stmt->bindParam(":tijdperk_detail", $tijdperk_detail);

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
		<form role="form" class="col-md-9 go-right" action="insert_tijdperk.php" method="post">
			<h2>New Time period</h2>
		<div class="form-group">
			<label for="tijd_naam">Name</label>
			<input id="tijd_naam" name="tijd_naam" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="start">Start</label>
			<input id="start" name="start" type="text" class="form-control" required >
		</div>
    <div class="form-group">
			<label for="einde">End</label>
			<input id="einde" name="einde" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="tijdperk_detail">Details</label>
			<input id="tijdperk_detail" name="tijdperk_detail" type="text" class="form-control" required >
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
	<a class="button" href="tijdperk.php">Time periods overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
