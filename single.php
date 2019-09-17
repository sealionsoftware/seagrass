<!DOCTYPE html>
<html lang="en">
<?php get_header('head');?>
<body>
<div class="content">
    <?php get_header();?>
    <div class="news">
        <div class="feed">
            <?php while (have_posts()) : the_post();?>
                <div class="article">
                    <h3><?php the_date(); ?></h3>
                    <?php the_content(); ?>
                    <div class="article-actions">
                        <div class="article-author">
                            <a href="<?php echo esc_url(get_the_author_meta('user_url')) ?>">
                                <h3>by <?php echo esc_html(get_the_author_meta('display_name')); ?></h3>
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                endwhile; ?>
        </div>
        <?php get_header('blog-sidebar');?>
    </div>
    <?php get_footer(); ?>
</div>
<?php wp_footer(); ?>
</body>
</html>
