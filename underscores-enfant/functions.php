<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 
}

function wpt_add_google_fonts() {
 
    wp_enqueue_style( 'wpt-google-fonts', 'https://fonts.googleapis.com/css?family=Baloo+Da+2&display=swap', false ); 
    }
     
    add_action( 'wp_enqueue_scripts', 'wpt_add_google_fonts' );