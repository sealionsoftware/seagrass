<!DOCTYPE html>
<html lang="en">
<?php get_header('head');?>
<body>
<div class="landing">
    <div class="logo-bound">
        <?php echo get_custom_logo( $blog_id = 0 ) ?>
    </div>
    <div>
        <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <h2><?php the_title();?></h2>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>
    </div>
</div>
</body>
<?php wp_footer(); ?>
</html>