<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "stores.php";


if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

	$name = $_POST["name"];
	$address = $_POST["address"];
	$id = $_POST["id"];
	$brands = $_POST["brands"];

	try{
		$stmt = $db->prepare("UPDATE stores
							SET name=:name, address=:address, brands=:brands
							WHERE id=:id");
		$stmt->bindParam(":name", $name);
		$stmt->bindParam(":address", $address);
		$stmt->bindParam(":id", $id);
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

if(isset($_GET['edit_id']) && !empty($_GET['edit_id'])){
	$id = $_GET['edit_id'];


	require("connectie.php");
	$stmt = $db->prepare("SELECT * FROM stores WHERE id=:sid");
	$stmt->bindParam(":sid",$id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_store.php" method="post">
			<h2>Edit Store</h2>
		<div class="form-group">
			<label for="name">Name</label>
			<input id="name" name="name" type="text" class="form-control" required value="<?php echo $name; ?>">
		</div>
		<div class="form-group">
			<label for="address">Address</label>
			<input id="address" name="address" type="text" class="form-control" required value="<?php echo $address; ?>">
		</div>
		<div class="form-group">
			<label for="brands">Brands</label>
			<input id="brands" name="brands" type="text" class="form-control" required value="<?php echo $brands; ?>">
		</div>
		<div class="form-group">
			<label for="id">Store ID</label>
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
	<a class="btn btn-primary" href="stores.php">Stores overview</a>
</div>

<?php require_once("includes/footer.php"); ?>
