<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "insert_store.php";


if(isset($_POST['new'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$name = $_POST["name"];
	$address = $_POST["address"];
  $brands = $_POST["brands"];

	try{
		$stmt = $db->prepare("INSERT INTO stores
                        (name, address, brands)
                        VALUES
                        (:name, :address, :brands)");
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":address", $address);
    $stmt->bindParam(":brands", $brands);

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
		<form role="form" class="col-md-9 go-right" action="insert_store.php" method="post">
			<h2>New Store</h2>
		<div class="form-group">
			<label for="name">Name</label>
			<input id="name" name="name" type="text" class="form-control" required >
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input id="address" name="address" type="text" class="form-control" required >
		</div>
    <div class="form-group">
			<label for="brands">Brands</label>
			<input id="brands" name="brands" type="text" class="form-control" required >
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
	<a class="btn btn-primary" href="stores.php">Stores overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
