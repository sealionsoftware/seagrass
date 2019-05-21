<div class="footer">
    <div class="footer-links">
        <?php echo wp_nav_menu( array( 'theme_location' => 'footer-right-links', 'container_class' => 'footer-right-links', 'fallback_cb' => false ) ); ?>
        <?php echo wp_nav_menu( array( 'theme_location' => 'footer-left-links', 'container_class' => 'footer-left-links', 'fallback_cb' => false  ) ); ?>
    </div>
    <?php dynamic_sidebar( 'footer' ); ?>
</div>
<div id="overlay" class="modal">
    <?php dynamic_sidebar( 'overlay' ); ?>
</div>