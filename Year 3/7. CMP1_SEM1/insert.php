<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php

    /* Attempt MySQL server connection. Assuming you are running MySQL

    server with default setting (user 'root' with no password) */

    $link = mysqli_connect("localhost", "root", "bitnami", "blogdb");



    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }



    // Escape user inputs for security

    $titel = mysqli_real_escape_string($link, $_POST['titel']);

    $auteur = mysqli_real_escape_string($link, $_POST['auteur']);

    $bericht = mysqli_real_escape_string($link, $_POST['bericht']);

    $tags = mysqli_real_escape_string($link, $_POST['tags']);



    // attempt insert query execution

    $sql = "INSERT INTO post (titel, auteur, bericht, tags) VALUES ('$titel', '$auteur', '$bericht', '$tags')";

    if(mysqli_query($link, $sql)){

        echo "New post added successfully.";

    } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }



    // close connection

    mysqli_close($link);

    ?>

    <?php include 'includes/footer.php' ?>
