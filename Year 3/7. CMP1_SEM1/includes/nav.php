<?php
$navigation = array(
  'index' => 'Home',
  'posts' => 'Blog',
  'create' => 'Create',
  'brands' => 'Brands',
  'stores' => 'Stores',
  'profile' => 'Profile',
  'imageoverview' => 'Images',
  'login' => 'Login',
);
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
      <a href="index.php"><img src="img/coffee_icon.png" style="margin-top: 5%;"></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">


        <?php foreach($navigation as $url => $display) {echo "<li class='active'><a href='{$url}.php'>{$display}</a></li>";} ?>


      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
