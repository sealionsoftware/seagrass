<?php

add_theme_support( 'title-tag' );
add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'customize-selective-refresh-widgets' );

$minimum_browser_version = array(
    'Chrome' => 70,
    'Firefox' => 70,
    'Edge' => 17,
    'Internet Explorer' => 11,
    'Safari' => 5
);

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

function register_color_option( $wp_customize, $name, $display_name )
{
    $wp_customize->add_setting( $name , array(
        'transport' => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $name, array(
        'label'      => __( $display_name, 'seagrass' ),
        'section'    => 'colors',
        'settings'   => $name,
    )));
}

function register_ga_id( $wp_customize )
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

function register_options( $wp_customize ) {

    register_color_option($wp_customize, 'primary_color', 'Primary Color');
    register_color_option($wp_customize, 'secondary_color', 'Secondary Color');
    register_color_option($wp_customize, 'tertiary_color', 'Tertiary Color');
    register_color_option($wp_customize, 'strong_color', 'Strong Color');
    register_color_option($wp_customize, 'highlight_color', 'Highlight Color');
    register_ga_id($wp_customize);
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
    if (!($query->is_main_query())){
        return;
    }

    $user_agent = get_browser(null,true);
    $browser = $user_agent['browser'];
    $version = $user_agent['version'];
    if ($browser == null || $version == null){
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
