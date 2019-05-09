<div class="header pinned">
    <div class="navbar">
        <?php echo wp_nav_menu( array( 'theme_location' => 'top-links', 'container_class' => 'top-links', 'fallback_cb' => false ) ); ?>
        <div class="logo-bound">
            <?php echo get_custom_logo( $blog_id = 0 ) ?>
        </div>
        <div class="wide-menu">
            <a href="#" class="icon">
                <span class="icon-bars"></span>
            </a>
            <?php echo wp_nav_menu( array( 'theme_location' => 'navigation-menu', 'container_class' => 'navigation-menu', 'fallback_cb' => false )); ?>
        </div>
    </div>
    <div class="mobile-menu">
        <?php echo wp_nav_menu( array( 'theme_location' => 'navigation-menu', 'container_class' => 'navigation-menu', 'fallback_cb' => false )); ?>
    </div>
</div>
<div class="graphic" style="background-image: url('<?php echo get_banner_image() ?>'">
    <h1><?php echo single_post_title() ?></h1>
</div>