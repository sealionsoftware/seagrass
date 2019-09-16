<!DOCTYPE html>
<html lang="en">
<?php get_header('head');?>
<body>
<div class="content">
    <?php get_header();?>
    <div class="news">
        <?php get_header('blog-sidebar');?>
        <div class="feed">
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="article">
                    <?php the_content(); ?>
                    <div class="author">
                        <a href="<?php echo get_the_author_meta('user_url') ?>">
                            <h3>by <?php echo get_the_author_meta('display_name'); ?></h3>
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                        </a>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>

    </div>
    <?php get_footer(); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
