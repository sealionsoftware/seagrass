<?php

add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'customize-selective-refresh-widgets' );

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}

function register_menus() {
    register_nav_menus(
        array(
            'top-menu' => __( 'Top Menu' ),
            'social-menu' => __( 'Social Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
        )
    ); //TODO multiple calls
}

function register_widgets() {
    register_sidebar(
        array(
            'name'          => __( 'Contact', 'seagrass' ),
            'id'            => 'contact',
            'description'   => __( 'Add widgets here to appear in your contact overlay.', 'seagrass' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => __( 'Footer', 'seagrass' ),
            'id'            => 'footer',
            'description'   => __( 'Add widgets here to appear in your footer.', 'seagrass' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}

add_action( 'upload_mimes', 'add_file_types_to_uploads' );
add_action( 'widgets_init', 'register_widgets' );
add_action( 'init', 'register_menus' );
