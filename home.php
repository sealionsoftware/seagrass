<!DOCTYPE html>
<html lang="en">
    <?php get_header('head');?>
    <body>
        <div class="content">
            <?php get_header();?>
            <div class="news">
                <div class="feed">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); $bannerImage=get_banner_image();?>
                        <div class="article-card">
                            <figure>
                                <a href="<?php echo the_permalink() ?>">
                                    <img src="<?php echo wp_get_attachment_image_url( $bannerImage ); ?>" alt="<?php echo the_title(); ?>" srcset="<?php echo wp_get_attachment_image_srcset( $bannerImage ); ?>"/>
                                </a>
                                <figcaption>
                                    <?php the_title();  ?>
                                </figcaption>
                            </figure>
                            <div class="article-card-metadata">
                                <a href="<?php echo esc_url(get_the_author_meta('user_url')); ?>">
                                    <?php echo esc_html(get_the_author_meta('display_name')); ?>
                                </a>


                                <?php $comments = get_comments_number(); if ($comments > 0) : ?>
                                    - <?php echo esc_html($comments) ?> comment<?php if($comments > 1) echo 's' ?>
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
