<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php

if(isset($_POST['edit'])){
	//GEKLIKT OP EDITKNOP
	require("connectie.php");

  $id = $_POST["id"];
	$titel = $_POST["titel"];
	$bericht = $_POST["bericht"];
  $auteur = $_POST["auteur"];
	$post_detail = $_POST["post_detail"];
  $tags = $_POST["tags"];


	try{
		$stmt = $db->prepare("UPDATE post
							SET titel=:titel, bericht=:bericht, auteur=:auteur, tags=:tags, post_detail=:post_detail
							WHERE id=:id");
    $stmt->bindParam(":id", $id);
		$stmt->bindParam(":titel", $titel);
		$stmt->bindParam(":bericht", $bericht);
		$stmt->bindParam(":auteur", $auteur);
		$stmt->bindParam(":post_detail", $post_detail);
    $stmt->bindParam(":tags", $tags);

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
	$stmt = $db->prepare("SELECT * FROM post WHERE id=:sid");
	$stmt->bindParam(":sid",$id);
	$stmt->execute();
	$result = $stmt->fetch();

	extract($result);

	$db = null;
}



?>

<div class="container">
    <div class="row">
		<form role="form" class="col-md-9 go-right" action="edit_post.php" method="post">
			<h2>Edit Post</h2>
		<div class="form-group">
      <label for="titel">Title</label>
			<input id="titel" name="titel" type="text" class="form-control" required value="<?php echo $titel; ?>">
		</div>
		<div class="form-group">
      <label for="bericht">Message</label>
			<input id="bericht" name="bericht" type="text" class="form-control" required value="<?php echo $bericht; ?>">
		</div>
    <div class="form-group">
      <label for="auteur">Author</label>
			<input id="auteur" name="auteur" type="text" class="form-control" required value="<?php echo $auteur; ?>">
		</div>
		<div class="form-group">
      <label for="post_detail">Details</label>
			<input id="post_detail" name="post_detail" type="text" class="form-control" required value="<?php echo $post_detail; ?>">
		</div>
    <div class="form-group">
      <label for="tags">Tags</label>
			<input id="tags" name="tags" type="text" class="form-control" required value="<?php echo $tags; ?>">
		</div>
		<div class="form-group">
      <label for="id">Post ID</label>
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
	<a class="button" href="posts.php">View Forum</a>
</div>

<?php require_once("includes/footer.php"); ?>
