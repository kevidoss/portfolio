<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

    <div class="container">

      <div class="starter-template">
        <h1>Register</h1>
        <p class="lead">Create your own profile</p>


      <form action="register.php" method="post">
          <p>Choose your username: </p>
          <p><input type="text" name="username"></p>
          <p>Choose your password:  </p>
          <p><input type="password" name="password"></p>
          <p>Tell us more about yourself:  </p>
          <p><input type="text" name="user_detail"></p>
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
            $user_detail = $_POST['user_detail'];

            try{
                $sql = "INSERT INTO login (username, password, user_detail)
                        VALUES ('$username', '$password', '$user_detail')
                        ";
                $db->query($sql);


            }catch(PDOException $e){
                echo "ERROR:" . $e->getMessage();
            }


        }
 $conn->close();
?>

</div>

<?php include 'includes/footer.php' ?>
