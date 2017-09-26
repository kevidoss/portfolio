<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

    <div class="container">
      <div class="row">

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "bitnami";
    $dbname = "herexamen";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, religie_naam, boek, land, religie_detail FROM religie WHERE id = " . (int) $_GET['id'];
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='bottommargin'>". "<h2>". $row["religie_naam"]."</h2>". "<p>Holy Book: " . $row["boek"]. "</p>" . "<p>Holy Land: " . $row["land"]. "</p>". "<p>" . $row["religie_detail"] . "</p>"."</div>";
    }
    } else {
       echo "0 results";
    }

    $conn->close();

    ?>


<a class="button" href="religie.php">View Religion</a>
</div>
  </div>
   </div>


</div>


<?php include 'includes/footer.php' ?>
