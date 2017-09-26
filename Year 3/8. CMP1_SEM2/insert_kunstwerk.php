<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "insert_kunstwerk.php";


if(isset($_POST['new'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

  $kunstwerk_naam = $_POST["kunstwerk_naam"];
	$tijd_id = $_POST["tijd_id"];
  $mens_id = $_POST["mens_id"];
	$kunstwerk_detail = $_POST["kunstwerk_detail"];

	try{
		$stmt = $db->prepare("INSERT INTO kunstwerk
                        (kunstwerk_naam, tijd_id, mens_id, kunstwerk_detail)
                        VALUES
                        (:kunstwerk_naam, :tijd_id, :mens_id, :kunstwerk_detail)");
		$stmt->bindParam(":kunstwerk_naam", $kunstwerk_naam);
		$stmt->bindParam(":tijd_id", $tijd_id);
    $stmt->bindParam(":mens_id", $mens_id);
		$stmt->bindParam(":kunstwerk_detail", $kunstwerk_detail);

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
		<form role="form" class="col-md-9 go-right" action="insert_kunstwerk.php" method="post">
			<h2>New Artwork</h2>
		<div class="form-group">
			<label for="kunstwerk_naam">Name</label>
			<input id="kunstwerk_naam" name="kunstwerk_naam" type="text" class="form-control" required >
		</div>
    <div class="form-group">
      <label for="tijd_id">Time period ID</label>
      <input id="tijd_id" name="tijd_id" type="text" class="form-control" required >
    </div>
    <div class="form-group">
			<label for="mens_id">Artist ID</label>
			<input id="mens_id" name="mens_id" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="kunstwerk_detail">Details</label>
			<input id="kunstwerk_detail" name="kunstwerk_detail" type="text" class="form-control" required >
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
	<a class="button" href="kunstwerk.php">Artwork overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
