<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 23/03/16
 * Time: 13:17
 */
function register_menu_locations() {
    register_nav_menus(
        array(
            'primary-menu' => __( 'Primary Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'register_menu_locations' );


function register_sidebar_locations() {
    /* Register the 'primary' sidebar. */
    register_sidebar(
        array(
            'id'            => 'primary-sidebar',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
    /* Repeat register_sidebar() code for additional sidebars. */
}
add_action( 'widgets_init', 'register_sidebar_locations' );

function my_wp_nav_menu_args( $args = '' ) {
    if( is_user_logged_in() ) {
        $args['menu'] = 'logged-in';
        $args['menu'] = 'footer-menu';
    } else {
        $args['menu'] = 'logged-out';
        $args['menu'] = 'footer-menu';
    }
    return $args;
}
/*add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );*/

