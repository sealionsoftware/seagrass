<!DOCTYPE html>
<?php
    $description=get_post_custom_values('description');
    $childPages = new WP_Query(array(
        'post_type' => 'page',
        'post_parent'       => $post->ID
    ));
?>
<html lang="en">
    <?php get_header('head');?>
    <body>
        <div class="content">
            <?php get_header(); ?>
            <?php if (have_posts()) : while (have_posts()) : ?>
                <?php the_post(); the_content(); ?>
            <?php endwhile; endif; ?>
            <div class="link-cards">
                <?php while ($childPages->have_posts()) : $childPages->the_post() ?>
                    <div>
                        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                        <?php the_content('');?>
                    </div>
                <?php endwhile; wp_reset_postdata();?>
            </div>
            <?php get_footer(); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
