<?php
$childPages = new WP_Query(array(
    'post_type' => 'post'
));
$year = null;
?>
<div class="sidebar">
    <div>
    <?php while ($childPages->have_posts()) :
        $childPages->the_post() ;
        $postYear = get_the_date('Y') ;
        if ($postYear !== $year):
            $year = $postYear;
            ?>
    </div><div class="sidebar-group">
            <h2><?php echo $postYear?></h2>
        <?php endif; ?>
        <div class="article-link">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
            <span class="article-date"><?php the_date('F j');?></span>
        </div>
    <?php endwhile; wp_reset_postdata();?>
    </div>

    <?php
    if ( has_nav_menu( 'external-article-links' ) ): ?>
    <div class="sidebar-group">
        <h2>Articles</h2>
        <?php echo wp_nav_menu( array( 'theme_location' => 'external-article-links', 'container_class' => 'external-article-links', 'fallback_cb' => false ) ); ?>
    </div>

    <?php endif; ?>
</div>