<head>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;400&family=Roboto:wght@400&display=swap" crossorigin="anonymous" >
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css" >
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/seagrass.css" >
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/icomoon/icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <style>
        .excerpt::before {
            background-image: url('<?php echo get_site_icon_url() ?>')
        }
    </style>

    <?php
        wp_head();
    ?>
</head>