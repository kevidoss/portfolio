<?php
 session_start();
require('connect.php');

 if (isset($_SESSION['username'])) {
   $navigation = array(
     'posts' => 'FORUM',
     'profile' => 'PROFILE',
     'contact' => 'CONTACT',
     'privacy' => 'PRIVACY POLICY',
     'logout' => 'LOG OUT',
   );

} else {
  $navigation = array(
    'contact' => 'CONTACT',
    'privacy' => 'PRIVACY POLICY',
    'login' => 'LOGIN',
  );
}
?>


<footer class="footer">
  <div class="container">
    <div class="row">
  <div class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav centerfoot">


          <?php foreach($navigation as $url => $display) {echo "<li class='active'><a class='menubalk' href='{$url}.php'>{$display}</a></li>";} ?>


        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>
</div>
</footer>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>
