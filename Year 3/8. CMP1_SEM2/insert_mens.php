<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "insert_mens.php";


if(isset($_POST['new'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$mens_naam = $_POST["mens_naam"];
  $bijdrage = $_POST["bijdrage"];
  $leven = $_POST["leven"];
	$mens_detail = $_POST["mens_detail"];

	try{
		$stmt = $db->prepare("INSERT INTO mens
                        (mens_naam, bijdrage, leven, mens_detail)
                        VALUES
                        (:mens_naam, :bijdrage, :leven, :mens_detail)");
		$stmt->bindParam(":mens_naam", $mens_naam);
    $stmt->bindParam(":bijdrage", $bijdrage);
    $stmt->bindParam(":leven", $leven);
		$stmt->bindParam(":mens_detail", $mens_detail);

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
		<form role="form" class="col-md-9 go-right" action="insert_mens.php" method="post">
			<h2>New Person</h2>
		<div class="form-group">
			<label for="mens_naam">Name</label>
			<input id="mens_naam" name="mens_naam" type="text" class="form-control" required >
		</div>
    <div class="form-group">
			<label for="bijdrage">Importance</label>
			<input id="bijdrage" name="bijdrage" type="text" class="form-control" required >
		</div>
    <div class="form-group">
			<label for="leven">Birth - Death</label>
			<input id="leven" name="leven" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="mens_detail">Details</label>
			<input id="mens_detail" name="mens_detail" type="text" class="form-control" required >
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
	<a class="button" href="mens.php">Individuals overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
