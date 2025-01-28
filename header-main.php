<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>Экороутер - Российский производитель маршрутизатор</title>
    <meta name="description" content="">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicon and Apple Touch Icons -->
    <link rel="shortcut icon" href="<?php echo B_IMG_DIR; ?>favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="<?php echo B_IMG_DIR; ?>favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo B_IMG_DIR; ?>favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo B_IMG_DIR; ?>favicon/apple-touch-icon-114x114.png">

    <!-- Stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <?php wp_head() ?>
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/media.css"> -->

</head>

<body>
    <!-- Header Section -->



    <header class="header ">
        <div class="header__wrapper">
            <a href="/wp-sandbox/" class="header-logo__wrapper">
                <img class="header-logo__logo" src="<?php echo B_IMG_DIR; ?>logo.svg" alt="logo" />
            </a>
            <nav class="header__nav">
                <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'header_navigation', // Correct location name
                                        'container' => 'ul', // Use <ul> for the wrapper
                                        'menu_class' => 'header__nav-list', // Class for the <ul> element
                                          'add_li_class' => 'header__nav-item',
                                        'fallback_cb' => false, // Disable fallback
                                    ));
                                 ?>
            </nav>
            <button class="btn-primary green-btn">Отправить запрос</button>
            <nav class="humburger__menu">
                <a href="#" class="toggle-btn">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </a>
            </nav>
        </div>

    </header>



    <section class="hero__slider">
        <div class="swiper slider-container hero__slider-border">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <?php 
            $args = [
                'post_type' => 'slider_hero', // Query for posts
            ];
        
            $query = new WP_Query($args); // Custom query
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); 
            ?>
                <?php $slider_image = get_field('slider_image'); ?>
                <div class="swiper-slide hero"
                    style="background-image: url('<?php echo $slider_image ? $slider_image : get_template_directory_uri() . "/images/default.jpg"; ?>')">
                    <div class="hero__wrapper">
                        <?php $slider_header = get_field('header_slider_w'); ?>
                        <?php echo $slider_header ; ?>
                        <?php 
                        // Check if there is an excerpt or content to show
                        $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20, '...');
                        if ($excerpt): 
                        ?>
                        <p class="hero__text"><?php echo $excerpt; ?></p>
                        <?php endif; ?>
                        <?php $slider_link = get_field('link_btn'); ?>

                        <a href="<?php echo $slider_link ; ?>" class="btn-primary">Подробнее</a>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <?php else: ?>
                <div class="swiper-slide hero">
                    <div class="hero__wrapper">
                        <h2 class="hero__title">No slides available</h2>
                        <p class="hero__text">Please add some posts to the slider_hero post type.</p>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Swiper Navigation Buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- Swiper Scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>
    </section>

    <!-- End Header -->