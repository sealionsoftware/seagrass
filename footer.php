<div class="footer">
    <?php echo wp_nav_menu( array( 'theme_location' => 'footer-right-links', 'container_class' => 'footer-right-links') ); ?>
    <?php echo wp_nav_menu( array( 'theme_location' => 'footer-left-links', 'container_class' => 'footer-left-links' ) ); ?>
    <?php dynamic_sidebar( 'footer' ); ?>
    <div id="contact-overlay" class="modal">
        <?php dynamic_sidebar( 'contact' ); ?>
    </div>
</div>