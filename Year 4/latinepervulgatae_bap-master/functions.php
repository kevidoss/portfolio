<?php

//registreer menu
function register_my_menu() {
  register_nav_menu('menu',__( 'Menu' ));
}
add_action( 'init', 'register_my_menu' );


wp_enqueue_script("jquery");


//standaard user roles verwijderen
remove_role( 'subscriber' );
remove_role( 'editor' );
remove_role( 'contributor' );
remove_role( 'author' );

//nieuwe user roles toevoegen
add_role('leerkracht', __(
    'Leerkracht'),
    array(
        'read'                  => true, // Allows the user to read
        'create_posts'          => true, // Allows user to create new posts
        'edit_posts'            => true, // Allows the user to edit their own posts
        'edit_others_posts'     => true, // Allows the user to edit others posts too
        'publish_posts'         => true, // Allows the user to publish posts
        'upload_files'          => true, // Allows the user to upload files
        'delete_posts'          => true, // Allows the user to delete posts
        'edit_published_posts'  => true, // Allows the user to edit published posts
        'manage_terms'          => true, // Allows the user to manage categories
        'edit_terms'            => true, // Allows the user to manage categories
        'delete_terms'          => true, // Allows the user to manage categories
        'assign_terms'          => true, // Allows the user to manage categories
        )
);


//inhoud van meta box
function prefix_meta_box_contents($post){
    $current_value = get_post_meta($post->ID, 'prefix_translation_post', true);
    ?>
    <input type="number" value="<?php echo $current_value; ?>" min="0" name="prefix_translation_post">
    <?php
}

//opslaan meta box
add_action('save_post', 'prefix_save_translation_post_meta');
function prefix_save_translation_post_meta($post_id){
    if(array_key_exists('prefix_translation_post',$_POST)){
        update_post_meta( $post_id, 'prefix_translation_post', $_POST['prefix_translation_post'] );
    }
}

//Hook voor add_meta_boxes actie
add_action('add_meta_boxes','prefix_meta_box');
function prefix_meta_box(){
    //Registreer box
    add_meta_box('prefix_translation_post_mb','Vertaling tekst ID','prefix_meta_box_contents');
}







//login logout links
add_filter('wp_nav_menu_items', 'add_login_logout_link', 10, 2);
function add_login_logout_link($items, $args) {
        ob_start();
        wp_loginout('index.php');
        $loginoutlink = ob_get_contents();
        ob_end_clean();
        $items .= '<li>'. $loginoutlink .'</li>';
    return $items;
}


//login pagina logo veranderen
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/loginlogo.png);
		height:15vh;
		width:35vh;
		background-size: 55%;
		background-repeat: no-repeat;
        	padding-bottom: 4vh;
        }
        body.login {
          background-color: #efefef;
          color: #474747;
        }
        body.login div#login form#loginform {
          background-color: #474747;
        }
        body.login div#login form#loginform p label {
          color: #efefef;
        }
        body.login div#login form#loginform input {
          background: #b7b7b7;
          color: #474747;
        }
        body.login div#login form#loginform p.submit input#wp-submit {
          border-top-color: #474747;
          border-bottom-color: #474747;
          border-left-color: #474747;
          border-right-color: #474747;
          box-shadow: 0 0 0 #474747;
          text-shadow: 0 0 0 #474747;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


//link op login pagina home
function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Latine Pervulgatae';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
