<?php

// Register Functionalities
add_theme_support('menus');
add_theme_support('post-thumbnails');

add_image_size( 'csc-prof-thumbnail', 600, 600, false );

get_template_part('theme', 'frontend');
get_template_part('theme', 'menus');
get_template_part('theme', 'customizer');
get_template_part('theme', 'plugins');
get_template_part('theme', 'setup');

require_once 'tgmpa/class-tgm-plugin-activation.php';
?>
