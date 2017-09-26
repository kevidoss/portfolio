<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

    <div class="container">
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

    $sql = "SELECT id, titel, auteur, bericht, tags FROM post LIMIT 1";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='starter-template'>". "<h2>". $row["titel"]."</h2>". "<p class='lead'>" . $row["bericht"]. "</p>" . "<p><i>" . $row["auteur"]. "</i></p>". "<p>" . $row["tags"] . "</p>";
    }
    } else {
       echo "0 results";
    }

    $conn->close();

    ?>


<a class="btn btn-primary" href="posts.php">View Blog</a>
</div>
  </div>
   </div>

   </div><!-- /.container -->



<?php include 'includes/footer.php' ?>
