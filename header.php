<div class="header">
    <div class="navbar">
        <?php echo wp_nav_menu( array( 'theme_location' => 'top-links', 'container_class' => 'top-links' ) ); ?>
        <div class="logo-bound">
            <?php echo get_custom_logo( $blog_id = 0 ) ?>
        </div>
        <div class="wide-menu">
            <a href="#" class="icon">
                <span class="fa fa-bars"></span>
            </a>
            <?php echo wp_nav_menu( array( 'theme_location' => 'navigation-menu', 'container_class' => 'navigation-menu' ) ); ?>
        </div>
    </div>
    <div class="mobile-menu">
        <?php echo wp_nav_menu( array( 'theme_location' => 'navigation-menu', 'container_class' => 'navigation-menu') ); ?>
    </div>
    <div class="graphic" <?php if ( has_post_thumbnail() ) { echo "style=\"background-image: url('"; the_post_thumbnail_url(); echo "')\""; } ?>>
        <h1><?php single_post_title();?></h1>
    </div>
</div>