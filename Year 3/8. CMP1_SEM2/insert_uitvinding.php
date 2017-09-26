<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "insert_uitvinding.php";


if(isset($_POST['new'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

  $uitvinding_naam = $_POST["uitvinding_naam"];
	$tijd_id = $_POST["tijd_id"];
  $mens_id = $_POST["mens_id"];
	$uitvinding_detail = $_POST["uitvinding_detail"];

	try{
		$stmt = $db->prepare("INSERT INTO uitvinding
                        (uitvinding_naam, tijd_id, mens_id, uitvinding_detail)
                        VALUES
                        (:uitvinding_naam, :tijd_id, :mens_id, :uitvinding_detail)");
		$stmt->bindParam(":uitvinding_naam", $uitvinding_naam);
		$stmt->bindParam(":tijd_id", $tijd_id);
    $stmt->bindParam(":mens_id", $mens_id);
		$stmt->bindParam(":uitvinding_detail", $uitvinding_detail);

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
		<form role="form" class="col-md-9 go-right" action="insert_uitvinding.php" method="post">
			<h2>New Invention</h2>
		<div class="form-group">
			<label for="uitvinding_naam">Name</label>
			<input id="uitvinding_naam" name="uitvinding_naam" type="text" class="form-control" required >
		</div>
    <div class="form-group">
      <label for="tijd_id">Time period ID</label>
      <input id="tijd_id" name="tijd_id" type="text" class="form-control" required >
    </div>
    <div class="form-group">
			<label for="mens_id">Inventor ID</label>
			<input id="mens_id" name="mens_id" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="uitvinding_detail">Details</label>
			<input id="uitvinding_detail" name="uitvinding_detail" type="text" class="form-control" required >
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
	<a class="button" href="uitvinding.php">Inventions overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
