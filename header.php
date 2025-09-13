<?php
/**
 * The Header for Grow Modo theme
 *
 * @package GrowModo
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="flag">
            <p>✨Discover Your Dream Property with Estatein</p>
            <a>Learn More</a>
        </div>
        <div class="container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-title">
                        <?php bloginfo('name'); ?>
                    </a>
                    <p class="site-description"><?php bloginfo('description'); ?></p>
                    <?php
                }
                ?>
            </div><!-- .site-branding -->

            <nav class="site-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id' => 'primary-menu',
                ));
                ?>
            </nav><!-- .site-navigation -->
            <a class="cnt_head">
                <button>Contact Us</button>
            </a>
        </div>
    </header>

    <main class="site-main">