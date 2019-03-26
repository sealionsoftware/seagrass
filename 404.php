<!DOCTYPE html>
<html lang="en">
<?php get_header('head');?>
<body>
<div class="landing">
    <div class="logo-bound">
        <?php echo get_custom_logo( $blog_id = 0 ) ?>
    </div>
    <div>

        <?php
            $page = get_page_by_path( 'not-found' );
        ?>

        <h2>
            <?php echo $page->post_title?>
        </h2>
        <p>
            <?php echo $page->post_content?>
        </p>
    </div>
</div>
</body>
<?php wp_footer(); ?>
</html>