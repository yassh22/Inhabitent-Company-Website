<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <?php wp_head();?>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body <?php body_class();?>>
<header>
    <div class="headerWrap"> 
        <a href="http://localhost/inhabitant/"><img src="<?php echo get_template_directory_uri() ?>/images/logos/inhabitent-logo-tent-white.svg" alt="headerLogo"></a>
        <nav class="mainNav">
            <?php wp_nav_menu( array(
                'theme_location' => 'primary'
            )); ?>
            <i class="fas fa-search"></i>
            <!-- <div class="header-search header-display"><?php get_search_form(); ?></div> -->
        </nav>
    </div>
</header>
