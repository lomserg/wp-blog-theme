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



    <nav class="top__nav"></nav>
    <header class="header container">
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

    <section class="shawcace__header">
        <div class="shawcace__header-container container">
            <div class="shawcace__header-info">
                <h1 class="shawcace__header-header"><?php the_title( ) ?></h1>
                <p class="shawcace__header-text">
                    Первая российская универсальная многоцелевая платформа для
                    реализации IP/MPLS-маршрутизатора, BRAS, Service Gateway для сетей
                    Wi-Fi (SGW-WiFi) и др. EcoRouter поддерживает технологию
                    контейнерной виртуализации, совместимую со стандартом
                    Linux-контейнеров (OCI).
                </p>
            </div>
            <div class="shawcace__header-img">
                <img src="<?php echo B_IMG_DIR; ?>fin_GREEN_CAR-2080-5.png" alt="" />
            </div>
        </div>
    </section>
    <!-- End Header -->