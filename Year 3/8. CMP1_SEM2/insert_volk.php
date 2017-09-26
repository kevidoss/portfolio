<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "insert_volk.php";


if(isset($_POST['new'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$volk_naam = $_POST["volk_naam"];
	$regio = $_POST["regio"];
  $bijdrage = $_POST["bijdrage"];
	$volk_detail = $_POST["volk_detail"];

	try{
		$stmt = $db->prepare("INSERT INTO volk
                        (volk_naam, regio, bijdrage, volk_detail)
                        VALUES
                        (:volk_naam, :regio, :bijdrage, :volk_detail)");
		$stmt->bindParam(":volk_naam", $volk_naam);
		$stmt->bindParam(":regio", $regio);
    $stmt->bindParam(":bijdrage", $bijdrage);
		$stmt->bindParam(":volk_detail", $volk_detail);

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
		<form role="form" class="col-md-9 go-right" action="insert_volk.php" method="post">
			<h2>New People</h2>
		<div class="form-group">
			<label for="volk_naam">Name</label>
			<input id="volk_naam" name="volk_naam" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="regio">Region</label>
			<input id="regio" name="regio" type="text" class="form-control" required >
		</div>
    <div class="form-group">
			<label for="bijdrage">Importance</label>
			<input id="bijdrage" name="bijdrage" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="volk_detail">Details</label>
			<input id="volk_detail" name="volk_detail" type="text" class="form-control" required >
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
	<a class="button" href="volk.php">Peoples overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
