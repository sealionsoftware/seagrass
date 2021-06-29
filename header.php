<div class="header pinned">
    <div class="navbar">
        <?php echo wp_nav_menu( array( 'theme_location' => 'top-links', 'container_class' => 'top-links', 'fallback_cb' => false ) ); ?>
        <div class="logo-bound">
            <?php echo get_custom_logo( ) ?>
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
<?php $featuredImage = get_featured( get_queried_object()) ?>
<style type="text/css">
    .banner {
        background-image: url('<?php echo wp_get_attachment_image_url( $featuredImage, "banner" ); ?>');
    }

    @media screen and (max-width: 650px) {
        .banner {
            background-image: url('<?php echo wp_get_attachment_image_url( $featuredImage, "mobile-banner" ); ?>');
        }
    }
</style>
<div class="banner">
    <h1><?php echo single_post_title() ?></h1>
</div>