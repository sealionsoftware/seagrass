<!DOCTYPE html>
<html lang="en">
    <?php get_header('head');?>
    <body>
        <div class="content">
            <?php get_header(); ?>
            <?php if (have_posts()) : while (have_posts()) : ?>
                <?php the_post(); the_content(); ?>
            <?php endwhile; endif; ?>
            <?php get_footer(); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
