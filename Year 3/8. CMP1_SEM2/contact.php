<?php include 'includes/header.php' ?>

<?php include 'includes/nav.php' ?>

<?php
$current = "contact.php";

if(isset($_POST['new'])){
	require("connectie.php");

	$naam = $_POST["naam"];
  $email = $_POST["email"];
  $onderwerp = $_POST["onderwerp"];
	$bericht = $_POST["bericht"];

	try{
		$stmt = $db->prepare("INSERT INTO contact
                        (naam, email, onderwerp, bericht)
                        VALUES
                        (:naam, :email, :onderwerp, :bericht)");
		$stmt->bindParam(":naam", $naam);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":onderwerp", $onderwerp);
		$stmt->bindParam(":bericht", $bericht);

		$stmt->execute();
		$message = "Thank you for your concerns";
		 //CONNECTIE SLUITEN
        $db = null;


	}catch(PDOExeption $e)
	{
		$message = $e;
	}

}

?>


<div class="container">
  <div class="row">
      <div class="col-md-11">
        <div class="well-sm col-md-5">
          <h2>Contact Us</h2>
            <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="naam">Name</label>
                        <input id="naam" name="naam" type="text" class="form-control" placeholder="Enter name" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" name="email" type="email" class="form-control" placeholder="Enter email" required="required" />
                    </div>
                    <div class="form-group">
                        <label for="onderwerp">Subject</label>
                        <select id="onderwerp" name="onderwerp" class="form-control" required="required">
                            <option value="na" selected="">Choose One:</option>
                            <option value="service">General Support</option>
                            <option value="suggestions">Suggestions</option>
                            <option value="product">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bericht">Message</label>
                        <textarea name="bericht" id="bericht" class="form-control" rows="9" cols="25" required="required"
                            placeholder="Message"></textarea>
                    </div>

                    <button type="submit" class="form-control button" id="new" name="new">
                      Send Message
                    </button>

<!--
            <div class="form-group">
              <input id="new" name="new" type="submit" class="form-control button" value="Submit">
            </div>
-->
            </form>
            </div>
            <?php
            if(!empty($message)){
                echo "<p class='bg-success' >{$message}</p>";
            }
            ?>

  <div class="well-sm col-md-6">
    <h2>Google Maps</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2506.1466416614885!2d3.6678990157683895!3d51.087301179568364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c370362705fc21%3A0x47f9e1d923e07a64!2sCampus+Mariakerke+Arteveldehogeschool!5e0!3m2!1snl!2sbe!4v1479918772821" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>


</div>
</div>
</div>


<?php include 'includes/footer.php' ?>
