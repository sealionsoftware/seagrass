<div class="header">
    <div class="navbar">
        <div class="logo-bound">
            <?php echo get_custom_logo( $blog_id = 0 ) ?>
        </div>
        <div class="top-menu">
            <a href="#" class="icon">
                <span class="fa fa-bars"></span>
            </a>
            <?php echo wp_nav_menu( array( 'theme_location' => 'top-menu') ); ?>
        </div>
    </div>
    <div class="mobile-menu">
        <?php echo wp_nav_menu( array( 'theme_location' => 'top-menu') ); ?>
    </div>
    <div class="graphic">
        <h1><?php single_post_title();?></h1>
    </div>
</div>