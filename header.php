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



    <nav class="header__top">
        <div class="container">

            <div class="header__top-inner">
                <!-- <button class="btn-primary green-btn">Отправить запрос</button> -->

                <p>+7 (495) 204-94-00</p>
                <p>sales@rdpin.ru</p>
            </div>
        </div>
    </nav>
    <header class="header">
        <div class="header__wrapper container">
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
            <nav class="humburger__menu">
                <a href="#" class="toggle-btn">
                    <span class="bar"></span>
                    <span class="bar"></span>
                </a>
            </nav>
        </div>
        <nav class="burger__container">
            <div class="burger__menu">
                <?php
    wp_nav_menu(array(
        'theme_location' => 'burger_menu',
        'container' => false,
        'menu_class' => 'burger__menu_main',
        'items_wrap' => '<ul class="%2$s">%3$s</ul>',
    ));
    ?>
            </div>
        </nav>
    </header>

    <section class="section-theme">
        <div class="section__wrapper">
            <h1 class="page__title">
                <?php
                if (is_home()) {
            echo 'Blog'; // Or use your blog's name
                } elseif (is_archive()) {
            echo "gHJLERWBZ";
                } elseif (is_singular()) {
            the_title();
                }
                ?>
            </h1>

        </div>
    </section>
    <section class="bg-white">
        <div class="container bg-white">
            <div class="breadcrumb">
                <nav>
                    <ul>
                        <?php custom_breadcrumbs(); ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- <section class="shawcace__header">
        <div class="shawcace__header-container container">
            <div class="shawcace__header-info">
                <h1 class="shawcace__header-header"></h1>
                <p class="shawcace__header-text">
                    Первая российская универсальная многоцелевая платформа для
                    реализации IP/MPLS-маршрутизатора, BRAS, Service Gateway для сетей
                    Wi-Fi (SGW-WiFi) и др. EcoRouter поддерживает технологию
                    контейнерной виртуализации, совместимую со стандартом
                    Linux-контейнеров (OCI).
                </p>
            </div>
          
        </div>
    </section> -->
    <!-- End Header -->