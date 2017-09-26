<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

    <div class="container">

      <div class="starter-template">
        <h1>FORUM POST</h1>
        <p class="lead">Add your own post to the forum</p>
      </div>

      <form action="insert_post.php" method="post">
          <p> Titel: </p><input type="text" name="titel">
          <p> Auteur:  </p><input type="text" name="auteur">
          <p> Tags: </p><input type="text" name="tags">
          <p> Bericht: </p><textarea rows="4" cols="50" name="bericht"></textarea>
          <p> Details: </p><textarea rows="4" cols="50" name="post_detail"></textarea>
          <br>
          <input type="submit" value="Post it!">
      </form>

<a class="button" href="posts.php">Back to the forum</a>
    </div><!-- /.container -->


    <?php
    require 'connectie.php';

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $titel = $_POST['titel'];
            $auteur = $_POST['auteur'];
            $tags = $_POST['tags'];
            $bericht = $_POST['bericht'];
            $post_detail = $_POST['post_detail'];

            try{
                $sql = "INSERT INTO post (titel, auteur, tags, bericht, post_detail)
                        VALUES ('$titel', '$auteur', '$tags', '$bericht', '$post_detail')
                        ";
                $db->query($sql);
                $lastId = $db->LastInsertId();


            }catch(PDOException $e){
                echo "ERROR:" . $e->getMessage();
            }


        }
 $conn->close();
?>



<?php include 'includes/footer.php' ?>
