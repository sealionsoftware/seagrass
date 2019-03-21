<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo get_bloginfo( 'name' ); ?></title>
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" crossorigin="anonymous" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" rel="stylesheet">
        <link href="<?php echo get_bloginfo('template_directory'); ?>/style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <script src="<?php echo get_bloginfo('template_directory'); ?>/script.js"></script>
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="header">
            <div class="navbar">
                <div class="logo-bound">
                    <?php echo get_custom_logo( $blog_id = 0 ) ?>
                </div>
                <?php echo wp_nav_menu( array( 'theme_location' => 'top-menu' ) ); ?>
            </div>
            <div class="graphic">
                <h1><?php the_title();?></h1>
            </div>
        </div>

        <div class="main">
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <?php the_content(); ?>
            <?php endwhile; endif; ?>

            <?php if (is_front_page()) :
                $featuredPages = new WP_Query(array(
                    'post_type' => 'page',
                    'meta_key' => 'feature-on-home',
                    'meta_value' => 'true'
                ));
                while ($featuredPages->have_posts()) : $featuredPages->the_post()
            ?>
                <div class="page-excerpt">
                    <a href="<?php the_permalink();?>">
                        <h2><?php the_title();?></h2>
                    </a>
                    <?php the_excerpt();?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
                endif;
            ?>

        </div>
        <div class="footer">
            <?php echo wp_nav_menu( array( 'theme_location' => 'social-menu' ) ); ?>
            <?php echo wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
            <?php dynamic_sidebar( 'footer' ); ?>

        </div>
        <div id="contact-overlay" class="modal">
            <?php dynamic_sidebar( 'contact' ); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>