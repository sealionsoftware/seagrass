<!DOCTYPE html>
<html lang="en">
    <?php get_header('head');?>
    <body>
        <?php
            get_header();
            $description=get_post_custom_values('description');
            if ($description != null) :
        ?>
                <div class="description">
                    <?php echo $description[0] ?>
                </div>
        <?php
            endif;
        ?>
        <div class="main">
            <div class="content">
                <?php
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
                        <a href="<?php the_permalink();?>">
                            <div class="lifted">
                                <h2><?php the_title();?></h2>
                                <?php the_content('');?>
                            </div>
                        </a>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    ?>
                    </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
        <?php get_footer(); ?>
    </body>
    <?php wp_footer(); ?>
</html>