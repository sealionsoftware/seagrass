<?php
$childPages = new WP_Query(array(
    'post_type' => 'post'
));
$year = null;
?>
<div class="sidebar">
    <?php while ($childPages->have_posts()) :
        $childPages->the_post() ;
        $postYear = get_the_date('Y') ;
        if ($postYear !== $year):
            $year = $postYear;
            ?>
            <h2><?php echo $postYear?></h2>
        <?php endif; ?>
        <div class="article-link">
            <a href="<?php the_permalink();?>"><?php the_title();?></a>
            <span class="article-date"><?php the_date('F j');?></span>
        </div>
    <?php endwhile; wp_reset_postdata();?>
</div>