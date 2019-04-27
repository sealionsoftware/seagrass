<head>
    <title><?php echo get_bloginfo( 'name' ); ?> - <?php echo is_front_page() ? get_bloginfo( 'description' ): get_the_title(); ?></title>
    <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" crossorigin="anonymous" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/options.css.php">
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css" >
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/icomoon/icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/script.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=0.8">

    <?php wp_head(); ?>
</head>