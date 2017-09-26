<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "insert_religie.php";


if(isset($_POST['new'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$religie_naam = $_POST["religie_naam"];
	$boek = $_POST["boek"];
  $land = $_POST["land"];
	$religie_detail = $_POST["religie_detail"];

	try{
		$stmt = $db->prepare("INSERT INTO religie
                        (religie_naam, boek, land, religie_detail)
                        VALUES
                        (:religie_naam, :boek, :land, :religie_detail)");
		$stmt->bindParam(":religie_naam", $religie_naam);
		$stmt->bindParam(":boek", $boek);
    $stmt->bindParam(":land", $land);
		$stmt->bindParam(":religie_detail", $religie_detail);

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
		<form role="form" class="col-md-9 go-right" action="insert_religie.php" method="post">
			<h2>New Religion</h2>
		<div class="form-group">
			<label for="religie_naam">Name</label>
			<input id="religie_naam" name="religie_naam" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="boek">Holy Book</label>
			<input id="boek" name="boek" type="text" class="form-control" required >
		</div>
    <div class="form-group">
			<label for="land">Holy Land</label>
			<input id="land" name="land" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="religie_detail">Details</label>
			<input id="religie_detail" name="religie_detail" type="text" class="form-control" required >
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
	<a class="button" href="religie.php">Religion overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
