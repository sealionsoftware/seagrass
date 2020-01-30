<!DOCTYPE html>
<html lang="en">
    <?php get_header('head');?>
    <body>
        <div class="content">
            <?php get_header();?>
            <div class="news">
                <div class="feed copy">
                    <?php if (have_posts()) : while (have_posts()) : the_post();?>
                        <div class="article">
                            <a href="<?php echo the_permalink() ?>">
                                <h2><?php the_title();?></h2>
                            </a>
                            <?php the_excerpt(); ?>
                            <div class="article-actions">
                                <div class="article-author">
                                    <a href="<?php echo esc_url(get_the_author_meta('user_url')); ?>">
                                        <h3>by <?php echo esc_html(get_the_author_meta('display_name')); ?></h3>
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
                                    </a>
                                </div>
                                <?php $comments = get_comments_number(); if ($comments > 0) : ?>
                                    <div class="article-comment">
                                        <h3><?php echo esc_html($comments) ?> comment<?php if($comments > 1) echo 's' ?></h3>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
                <?php get_header('blog-sidebar');?>
            </div>
            <?php get_footer(); ?>
        </div>
        <?php wp_footer(); ?>
    </body>
</html>
