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

    $sql = "SELECT id, volk_naam, regio, bijdrage, volk_detail FROM volk WHERE id = " . (int) $_GET['id'];
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='bottommargin'>". "<h2>". $row["volk_naam"]."</h2>". "<p>Region: " . $row["regio"]. "</p>" . "<p>Importance: " . $row["bijdrage"]. "</p>". "<p>" . $row["volk_detail"] . "</p>"."</div>";
    }
    } else {
       echo "0 results";
    }

    $conn->close();

    ?>


<a class="button" href="volk.php">View Peoples</a>
</div>
  </div>
   </div>

   </div><!-- /.container -->



<?php include 'includes/footer.php' ?>
