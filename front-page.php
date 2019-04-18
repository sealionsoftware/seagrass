<!DOCTYPE html>
<html lang="en">
<?php get_header('head');?>
    <body>
        <?php get_header();?>
        <div class="main">
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="content">
                    <?php the_content(); ?>
                </div>
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
                    <?php the_content('');?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
                endif;
            ?>

        </div>
        <?php get_footer(); ?>
    </body>
    <?php wp_footer(); ?>
</html>