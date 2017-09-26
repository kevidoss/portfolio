<?php
 session_start();
require('connect.php');

 if (isset($_SESSION['username'])) {
   $navigation = array(
     'index' => 'HOME',
     'volk' => 'PEOPLES',
     'mens' => 'INDIVIDUALS',
     'tijdperk' => 'TIME PERIODS',
     'religie' => 'RELIGION',
     'uitvinding' => 'INVENTIONS',
     'kunstwerk' => 'ARTWORK',
    // 'posts' => 'FORUM',
     'imageoverview' => 'PICTURES',
    // 'profile' => 'PROFILE',
    // 'logout' => 'LOG OUT',
   );

} else {
  $navigation = array(
    'index' => 'HOME',
    'volk' => 'PEOPLES',
    'mens' => 'INDIVIDUALS',
    'tijdperk' => 'TIME PERIODS',
    'religie' => 'RELIGION',
    'uitvinding' => 'INVENTIONS',
    'kunstwerk' => 'ARTWORK',
    'login' => 'LOGIN',
  );
}
?>



<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">


        <?php foreach($navigation as $url => $display) {echo "<li class='active menubalk'><a href='{$url}.php'>{$display}</a></li>";} ?>


      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
