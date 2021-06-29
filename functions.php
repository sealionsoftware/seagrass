<?php

$minimum_browser_version = array(
    'Chrome' => 70,
    'Firefox' => 65,
    'Edge' => 17,
    'IE' => 13,
    'Safari' => 5
);

add_image_size( "banner", 2000, 500, true );
add_image_size( "mobile-banner", 650, 165, true );

add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'starter-content', array(
    'widgets'     => array(
        // Place core-defined widget in the overlay area.
        'overlay' => array(
            'text_business_info'
        ),

        // Add the core-defined business info widget to the footer area.
        'footer' => array(
            'text_about'
        )
    ),

    // Specify the core-defined pages to create and add custom thumbnails to some of them.
    'posts'       => array(
        'home',
        'about',
        'news',
        'privacy_policy'
    ),

    // Create the custom image attachments used as post thumbnails for pages.
    'attachments' => array(
        'image-seagrass-meadow' => array(
            'post_title' => _x( 'Seagrass Meadow', 'Defaults', 'seagrass' ),
            'file'       => 'sea-algae.jpg'
        ),
        'image-seagrass-logo' => array(
            'post_title' => _x( 'Seagrass Logo', 'Defaults', 'seagrass' ),
            'file'       => 'seagrass-logo.svg'
        ),
        'image-seagrass-icon' => array(
            'post_title' => _x( 'Seagrass Icon', 'Defaults', 'seagrass' ),
            'file'       => 'seagrass-icon.png'
        ),
        'image-seagrass-bullet' => array(
            'post_title' => _x( 'Seagrass Bullet', 'Defaults', 'seagrass' ),
            'file'       => 'seagrass-bullet.svg'
        )
    ),

    // Default to a static front page and assign the front and posts pages.
    'options'     => array(
        'show_on_front'  => 'page',
        'page_on_front'  => '{{home}}',
        'page_for_posts' => '{{news}}',
        'custom_logo' => '{{image-seagrass-logo}}',
        'default_banner_image' => '{{image-seagrass-meadow}}',
        'primary_color' => '#3a916d',
        'secondary_color' => '#c1a472',
        'tertiary_color' => '#d1ffba',
        'strong_color' => '#333333',
        'highlight_color' => '#4e95d3'
    ),

    // Set up nav menus for each of the two areas registered in the theme.
    'nav_menus'   => array(
        // Assign a menu to the "navigation" location.
        'navigation-menu'    => array(
            'name'  => __( 'Main Pages', 'seagrass' ),
            'items' => array(
                'page_about',
                'page_news',
                'link_find' => array('title' => 'Find Us', 'url' => '#overlay', 'classes' => 'action')
            ),
        ),

        // Assign a menu to the "top links" location.
        'top-links' => array(
            'name'  => __( 'Social Links Menu', 'seagrass' ),
            'items' => array(
                'link_facebook' => array('title' => '<span class="icon-facebook"/>', 'url' => 'https://www.facebook.com/yourbusiness'),
                'link_email' => array('title' => '<span class="icon-mail"/>', 'url' => 'mailto:you@yourdomain.com')
            ),
        ),

        // Assign a menu to the "footer left links" location.
        'footer-left-links' => array(
            'name'  => __( 'Secondary Pages', 'seagrass' ),
            'items' => array(
                'page_privacy' => array(
                    'type' => 'post_type',
                    'object' => 'page',
                    'object_id' => '{{privacy_policy}}'
                )
            ),
        ),

        // Assign a menu to the "footer right links" location.
        'footer-right-links' => array(
            'name'  => __( 'Administration', 'seagrass' ),
            'items' => array(
                'link_sealion' => array('title' => '<span class="icon-sealion" title="Design by Sealion Software"/>', 'url' => 'https://www.sealionsoftware.com'),
                'link_wordpress' => array('title' => '<span class="icon-wordpress" title="Powered by Wordpress"/>', 'url' => 'https://www.wordpress.org'),
                'link_unsplash' => array('title' => '<span class="icon-unsplash" title="Photo by @johnmarkarnold"/>', 'url' => 'https://unsplash.com/@johnmarkarnold?utm_medium=referral&utm_campaign=photographer-credit&utm_content=creditBadge'),
                'link_login' => array('title' => '<span class="icon-sign-in" title="Sign In"/>', 'url' => '/wp-admin')
            ),
        )
    )
) );

function register_menus() {
    register_nav_menus(
        array(
            'top-links' => __( 'Top Right Links' ),
            'navigation-menu' => __( 'Navigation Menu' ),
            'footer-left-links' => __( 'Footer Left Links' ),
            'footer-right-links' => __( 'Footer Right Links' ),
            'external-article-links' => __( 'External Article Links' ),
        )
    );
}

function register_widgets() {
    register_sidebar(
        array(
            'name'          => __( 'Overlay', 'seagrass' ),
            'id'            => 'overlay',
            'description'   => __( 'Add widgets here to appear in your action overlay.', 'seagrass' ),
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

function register_color_option( $wp_customize, $name, $display_name)
{
    $wp_customize->add_setting( $name , array(
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $name, array(
        'label'      => __( $display_name, 'seagrass' ),
        'section'    => 'colors',
        'settings'   => $name,
    )));
}

function register_banner_option( $wp_customize )
{
    $wp_customize->add_setting( 'default_banner_image' , array(
        'transport' => 'refresh'
    ));
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'default_banner_image', array(
        'label'      => __( 'Default Featured Image', 'seagrass' ),
        'section'    => 'title_tagline',
        'settings'   => 'default_banner_image',
    )));
}

function get_featured($post = null){

    $id = get_post_thumbnail_id( $post );

    if ( $id != null ) {
        return $id;
    }

    return get_theme_mod('default_banner_image');
}

function register_options( $wp_customize ) {

    register_color_option($wp_customize, 'primary_color', 'Primary Color');
    register_color_option($wp_customize, 'secondary_color', 'Secondary Color');
    register_color_option($wp_customize, 'tertiary_color', 'Tertiary Color');
    register_color_option($wp_customize, 'strong_color', 'Strong Color');
    register_color_option($wp_customize, 'highlight_color', 'Highlight Color');
    register_banner_option($wp_customize);
}

function generate_dynamic_css()
{
    ?>

    <style type="text/css">
        html {
            --primary: <?php echo get_theme_mod('primary_color'); ?>;
            --secondary: <?php echo get_theme_mod('secondary_color'); ?>;
            --tertiary: <?php echo get_theme_mod('tertiary_color'); ?>;
            --strong: <?php echo get_theme_mod('strong_color'); ?>;
            --highlight: <?php echo get_theme_mod('highlight_color'); ?>;
        }
    </style>
    <?php
}

function redirect_404()
{
    if (is_404() ) {
        $query = new WP_Query();
        $query->query(array('pagename' =>'not-found'));
        $query->is_page = false;
        $GLOBALS['wp_query'] = $query;
    }
}

function excerpt_more($more) {
    return ' <a href="' . get_permalink() . '">[read more]</a>';
}

function comments_template_query_args($args){
    $args['parent'] = 0;
    return $args;
}

add_filter('excerpt_more', 'excerpt_more', 21 );
add_filter('comments_template_query_args', 'comments_template_query_args', 21 );

add_action( 'template_redirect', 'redirect_404' );
add_action( 'wp_head', 'generate_dynamic_css');
add_action( 'customize_register', 'register_options' );
add_action( 'widgets_init', 'register_widgets' );
add_action( 'init', 'register_menus' );


