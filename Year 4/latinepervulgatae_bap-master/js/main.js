function include_jquery() {

	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);

}
add_action('wp_enqueue_scripts', 'include_jquery');



function myAjax() {
      jQuery.ajax({
           method: "POST",
           url: '../ajax.php',
           data:{action:'call_this'},
           success:function makeAjaxCall() {
            	$GLOBALS['post_id'] = get_the_ID();
           }

      });
 }
