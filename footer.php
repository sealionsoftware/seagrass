<?php
$childPages = new WP_Query(array(
    'post_type' => 'page',
    'post_parent'       => $post->ID
));
?>
<div class="link-cards">
    <?php while ($childPages->have_posts()) : $childPages->the_post() ?>
        <div class="article-card">
            <figure>
                <a href="<?php echo the_permalink() ?>">
                    <img src="<?php echo get_banner_image(); ?>"/>
                </a>
                <figcaption>
                    <?php the_title();  ?>
                </figcaption>
            </figure>
        </div>
    <?php endwhile; wp_reset_postdata();?>
</div>
<div class="footer">
    <div class="footer-links">
        <?php echo wp_nav_menu( array( 'theme_location' => 'footer-left-links', 'container_class' => 'footer-left-links', 'fallback_cb' => false  ) ); ?>
        <?php echo wp_nav_menu( array( 'theme_location' => 'footer-right-links', 'container_class' => 'footer-right-links', 'fallback_cb' => false ) ); ?>
    </div>
    <?php dynamic_sidebar( 'footer' ); ?>
</div>
<div id="overlay" class="modal">
    <?php dynamic_sidebar( 'overlay' ); ?>
</div>