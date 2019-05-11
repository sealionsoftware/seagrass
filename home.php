<!DOCTYPE html>
<html lang="en">
    <?php get_header('head');?>
    <body>
        <div class="content">
            <?php get_header();?>
            <?php if (have_posts()) : while (have_posts()) : the_post();?>
                <div class="article">
                    <h2><?php the_title();?></h2>
                    <h3 class="date"><?php the_date();?></h3>
                    <?php the_content(); ?>
                    <div class="author">
                        <a href="<?php echo  get_the_author_meta('user_url') ?>">
                            <h3>by <?php echo get_the_author_meta('display_name'); ?></h3>
                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                        </a>
                    </div>
                </div>
            <?php endwhile; endif; ?>
            <?php get_footer(); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
