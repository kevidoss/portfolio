<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>


<?php


include 'image.php';

$obj_image = new Image();

if(@$_POST['Submit'])
{
 $obj_image->image_name=str_replace("'", "''", $_POST['txt_image_name']);
 $obj_image->image=str_replace("'", "''", $_POST['txt_image']);

  $obj_image->Insert_into_image();

  $data_image=$obj_image->get_all_image_list();
 $row=mysql_num_rows($data_image);
}

?>

<div class="container">
  <div class="row">
    <div class="starter-template">
      <h1>Upload</h1>
      <p class="lead">Upload your picture here</p>
    </div>

  <form method="post" enctype="multipart/form-data">
     <p><label>Image Name</label></p>
     <p><input type="text" name="txt_image_name"></input></p>

     <p><label>Select Image</label></p>
     <p><input type="file" name="txt_image"></input></p>

     <p><input type="submit" name="Submit" value="Submit"></input></p>
  </form>

  <a class="btn btn-primary" href="imageoverview.php">Pictures overview</a>

  </div>
</div>


<?php require_once("includes/footer.php"); ?>
