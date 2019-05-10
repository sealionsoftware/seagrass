<!DOCTYPE html>
<html lang="en">
    <?php get_header('head');?>
    <body>
        <?php
            get_header();
            $description=get_post_custom_values('description');
            if ($description != null) :
        ?>
            <style>
                .description::before {
                    background-image: url('<?php echo get_site_icon_url($size = 512) ?>')
                }
            </style>
            <div class="description">
                <?php echo $description[0] ?>
            </div>


        <?php

            endif;
            if (have_posts()) : while (have_posts()) : the_post();
                the_content();
            endwhile; endif;
            if (is_front_page()) :
                $featuredPages = new WP_Query(array(
                    'post_type' => 'page',
                    'meta_key' => 'feature-on-home',
                    'meta_value' => 'true'
                ));
        ?>
            <div class="link-cards">
            <?php
                while ($featuredPages->have_posts()) : $featuredPages->the_post()
            ?>
                <div>
                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                    <?php the_content('');?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            ?>
            </div>
        <?php
            endif;
            get_footer();
        ?>
    </body>
    <?php wp_footer(); ?>
</html>