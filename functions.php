<?php

$minimum_browser_version = array(
    'Chrome' => 70,
    'Firefox' => 70,
    'Edge' => 17,
    'Internet Explorer' => 11,
    'Safari' => 5
);

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
//        'homepage-section' => array(
//            'thumbnail' => '{{image-espresso}}',
//        ),
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
        )
    ),

    // Default to a static front page and assign the front and posts pages.
    'options'     => array(
        'show_on_front'  => 'page',
        'page_on_front'  => '{{home}}',
        'page_for_posts' => '{{news}}',
        'custom_logo' => '{{image-seagrass-logo}}',
        'default_banner_image' => '{{image-seagrass-meadow}}',
        'primary_color' => '#4e951b',
        'secondary_color' => '#4ed831',
        'tertiary_color' => '#aaebdd',
        'strong_color' => '#333333',
        'highlight_color' => '#ff8080'
    ),

    // Set up nav menus for each of the two areas registered in the theme.
    'nav_menus'   => array(
        // Assign a menu to the "navigation" location.
        'navigation-menu'    => array(
            'name'  => __( 'Main Pages', 'seagrass' ),
            'items' => array(
                'page_about',
                'page_news',
                'link_contact' => array('title' => 'Contact Us', 'url' => '#overlay', 'classes' => 'action')
            ),
        ),
//
//        // Assign a menu to the "top links" location.
        'top-links' => array(
            'name'  => __( 'Social Links Menu', 'seagrass' ),
            'items' => array(
                'link_facebook' => array('title' => '<span class="icon-facebook"/>', 'url' => 'https://www.facebook.com/seagrass'),
                'link_email' => array('title' => '<span class="icon-mail"/>', 'url' => 'mailto:you@yourdomain.com')
            ),
        ),

        // Assign a menu to the "footer right links" location.
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

function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}

function register_menus() {
    register_nav_menus(
        array(
            'top-links' => __( 'Top Right Links' ),
            'navigation-menu' => __( 'Navigation Menu' ),
            'footer-left-links' => __( 'Footer Left Links' ),
            'footer-right-links' => __( 'Footer Right Links' ),
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

function register_ga_option( $wp_customize )
{
    $wp_customize->add_setting( 'ga_id' , array(
        'transport' => 'refresh'
    ));
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ga_id', array(
        'label'      => __( 'Google Analytics Tracker ID', 'seagrass' ),
        'section'    => 'title_tagline',
        'settings'   => 'ga_id',
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

function get_banner_image(){
    if (has_post_thumbnail()){
        return  the_post_thumbnail_url();
    }
    $id =  get_theme_mod('default_banner_image');
    return wp_get_attachment_url($id);
}

function register_options( $wp_customize ) {

    register_color_option($wp_customize, 'primary_color', 'Primary Color');
    register_color_option($wp_customize, 'secondary_color', 'Secondary Color');
    register_color_option($wp_customize, 'tertiary_color', 'Tertiary Color');
    register_color_option($wp_customize, 'strong_color', 'Strong Color');
    register_color_option($wp_customize, 'highlight_color', 'Highlight Color');
    register_ga_option($wp_customize);
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

function generate_ga_integration()
{
    $id = get_theme_mod('ga_id');
    if ($id) : ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $id; ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', "<?php echo $id; ?>");
        </script>
    <?php endif;
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

function redirect_update_browser($query)
{
    if ((!$query->is_main_query() || is_admin())){
        return;
    }

    $user_agent = get_browser(null,true);
    $browser = $user_agent['browser'];
    $version = $user_agent['version'];
    if ($browser == null || $version == null || $version == 0){
        return;
    }

    $min_version = $GLOBALS['minimum_browser_version'][$browser];
    if ($min_version == null || $version < $min_version) {
        $query = new WP_Query();
        $query->query( array('pagename' => 'update-browser' ) );
        $query->is_page = false;
        $GLOBALS['wp_query'] = $query;
    }
}

add_action( 'pre_get_posts', 'redirect_update_browser' );
add_action( 'template_redirect', 'redirect_404' );
add_action( 'wp_head', 'generate_dynamic_css');
add_action( 'wp_head', 'generate_ga_integration');
add_action( 'customize_register', 'register_options' );
add_action( 'upload_mimes', 'add_file_types_to_uploads' );
add_action( 'widgets_init', 'register_widgets' );
add_action( 'init', 'register_menus' );
