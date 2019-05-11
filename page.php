<!DOCTYPE html>
<?php
    $description=get_post_custom_values('description');
    if (is_front_page()) :
        $featuredPages = new WP_Query(array(
            'post_type' => 'page',
            'meta_key' => 'feature-on-home',
            'meta_value' => 'true'
        ));
    endif;
?>
<html lang="en">
    <?php get_header('head');?>
    <body>
        <div class="content">
            <?php get_header(); ?>
            <?php if ($description != null) : ?>
                <style>
                    .description::before {
                        background-image: url('<?php echo get_site_icon_url() ?>')
                    }
                </style>
                <div class="description">
                    <?php echo $description[0] ?>
                </div>
            <?php endif ?>
            <?php if (have_posts()) : while (have_posts()) : ?>
                <?php the_post(); the_content(); ?>
            <?php endwhile; endif; ?>
            <?php if ($featuredPages != null ) : ?>
                <div class="link-cards">
                    <?php while ($featuredPages->have_posts()) : $featuredPages->the_post() ?>
                        <div>
                            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            <?php the_content('');?>
                        </div>
                    <?php endwhile; wp_reset_postdata();?>
                </div>
            <?php endif;?>
            <?php get_footer(); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
