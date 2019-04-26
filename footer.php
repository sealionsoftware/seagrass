<div class="footer">
    <?php echo wp_nav_menu( array( 'theme_location' => 'footer-right-links', 'container_class' => 'footer-right-links', 'fallback_cb' => false ) ); ?>
    <?php echo wp_nav_menu( array( 'theme_location' => 'footer-left-links', 'container_class' => 'footer-left-links', 'fallback_cb' => false  ) ); ?>
    <?php dynamic_sidebar( 'footer' ); ?>
    <div id="overlay" class="modal">
        <?php dynamic_sidebar( 'overlay' ); ?>
    </div>
</div>