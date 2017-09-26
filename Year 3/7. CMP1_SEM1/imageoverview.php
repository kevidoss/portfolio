<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

    <div class="container">

      <div class="starter-template">
        <h1>Image Overview</h1>
        <p class="lead">Here you can see all pictures uploaded by the users</p>
        <p>Add your own picture <a href="imgupload.php">HERE</a></p>
      </div>


<div class="row">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "bitnami";
    $dbname = "blogdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT image_name, image FROM t_image_upload";
    $result = $conn->query($sql);


    $i = 1;

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if($i%2 == 0){
        echo "<div class='col-md-6'><h4>{$row['image_name']}</h4><img src='uploads/{$row['image']}' style='width: 100%; height: auto;'></div></div>";
      }else {
        echo "<div class='row'><div class='col-md-6'><h4>{$row['image_name']}</h4><img src='uploads/{$row['image']}' style='width: 100%; height: auto;'></div>";
      }
      $i++;
    }
    } else {
       echo "0 results";
    }

    $conn->close();

    ?>



  </div>

   </div><!-- /.container -->



<?php include 'includes/footer.php' ?>
