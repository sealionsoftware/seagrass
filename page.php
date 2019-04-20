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
        </div>
        <?php get_footer(); ?>
    </body>
    <?php wp_footer(); ?>
</html>