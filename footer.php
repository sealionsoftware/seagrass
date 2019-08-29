<?php
$childPages = new WP_Query(array(
    'post_type' => 'page',
    'post_parent'       => $post->ID
));
?>
<span class="content-spacer"></span>
<div class="link-cards">
    <?php while ($childPages->have_posts()) : $childPages->the_post() ?>
        <div>
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <?php the_content('');?>
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