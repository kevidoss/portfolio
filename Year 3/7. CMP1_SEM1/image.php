<?php
 include 'includes/db.php' ;

  class Image{

   var
   $image_id,
   $image_name,
   $image;

  function Insert_into_image(){
   if(isset($_FILES['txt_image']))
   {
        $tempname = $_FILES['txt_image']['tmp_name'];
        $originalname =$_FILES['txt_image']['name'];
        $size =($_FILES['txt_image']['size']/5242888). "MB<br>";
        $type=$_FILES['txt_image']['type'];
        $image=$_FILES['txt_image']['name'];
        move_uploaded_file($_FILES['txt_image']['tmp_name'],"uploads/".$_FILES['txt_image']['name']);
      }


    $query = "Insert into t_image_upload
    (
     image_name,
     image
    )
    values
    (
     '$this->image_name',
     '$image'
    )";
    if(mysql_query($query)){
     console.log("Insert success");
    }
    else
    {
     echo "Insert failed";
    }
  }

   function get_all_image_list(){
   $query = "select *from t_image_upload";
   $result = mysql_query($query);
   return $result;
  }

}
?>
