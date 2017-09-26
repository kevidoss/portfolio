<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

    <div class="container">

      <div class="starter-template">
        <h1>Register</h1>
        <p class="lead">Create your own profile</p>


      <form action="register.php" method="post">
          <p> Username: </p>
          <p><input type="text" name="username"></p>
          <p> Password:  </p>
          <p><input type="password" name="password"></p>
          <input type="submit" value="Sign up">
      </form>

      <br>
      <p>Already signed up? Login <a href="login.php">HERE</a></p>

      </div>
    </div><!-- /.container -->


    <?php
    require 'connectie.php';

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $username = $_POST['username'];
            $password = $_POST['password'];

            try{
                $sql = "INSERT INTO login (username, password)
                        VALUES ('$username', '$password')
                        ";
                $db->query($sql);


            }catch(PDOException $e){
                echo "ERROR:" . $e->getMessage();
            }


        }
 $conn->close();
?>



<?php include 'includes/footer.php' ?>
