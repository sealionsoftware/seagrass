<div class="footer">
    <?php echo wp_nav_menu( array( 'theme_location' => 'social-menu' ) ); ?>
    <?php echo wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
    <?php dynamic_sidebar( 'footer' ); ?>
    <div id="contact-overlay" class="modal">
        <?php dynamic_sidebar( 'contact' ); ?>
    </div>
</div>