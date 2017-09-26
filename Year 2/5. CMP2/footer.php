<section class="module parallax parallax-2">
    <div class="container">
        <footer class="wrapper clearfix">
            <h1>Info</h1>
        </footer>
    </div>
</section>

<section>
    <div class="footer-container">
        <footer class="wrapper">
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
        </footer>
    </div>
</section>


<script src="js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
</script>
<?php wp_footer(); ?>
</body>
</html>