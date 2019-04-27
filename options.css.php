<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
header('Content-Type: text/css');
?>


html {
    --primary: <?php echo get_theme_mod('primary_color'); ?>;
    --secondary: <?php echo get_theme_mod('secondary_color'); ?>;
    --tertiary: <?php echo get_theme_mod('tertiary_color'); ?>;
    --strong: <?php echo get_theme_mod('strong_color'); ?>;
    --highlight: <?php echo get_theme_mod('highlight_color'); ?>;
}

<?php exit() ?>