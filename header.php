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



    <!-- <nav class="top__nav"></nav> -->
    <header class="header ">
        <div class="header__wrapper">
            <a href="/wp-sandbox/" class="header-logo__wrapper">
                <img class="header-logo__logo"
                    src="http://localhost/wp-sandbox/wp-content/themes/wp-blog-theme/img/logo.svg" alt="logo">
            </a>
            <nav class="header__nav">
                <ul id="menu-header" class="header__nav-list">
                    <li id="menu-item-185"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-185 header__nav-item">
                        <a>Продукция</a>
                        <ul class="sub-menu">
                            <li id="menu-item-184"
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-184 header__nav-item">
                                <a
                                    href="http://localhost/wp-sandbox/ip-mpls-%d0%bc%d0%b0%d1%80%d1%88%d1%80%d1%83%d1%82%d0%b8%d0%b7%d0%b0%d1%82%d0%be%d1%80/">IP/MPLS-маршрутизатор</a>
                            </li>
                        </ul>
                    </li>
                    <li id="menu-item-152"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-152 header__nav-item">
                        <a href="#">Где купить</a></li>
                    <li id="menu-item-139"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-139 header__nav-item">
                        <a href="http://localhost/wp-sandbox/news/">Новости</a></li>
                    <li id="menu-item-153"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-153 header__nav-item">
                        <a href="#">Решения</a></li>
                    <li id="menu-item-140"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-140 header__nav-item">
                        <a href="http://localhost/wp-sandbox/about/">О компании</a></li>
                    <li id="menu-item-148"
                        class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-148 header__nav-item">
                        <a>Поддержка</a>
                        <ul class="sub-menu">
                            <li id="menu-item-149"
                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-149 header__nav-item">
                                <a href="http://localhost/wp-sandbox/node-js/">Node js</a></li>
                            <li id="menu-item-150"
                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-150 header__nav-item">
                                <a href="http://localhost/wp-sandbox/hello-world-2/">Hello world 2</a></li>
                            <li id="menu-item-151"
                                class="menu-item menu-item-type-post_type menu-item-object-post menu-item-151 header__nav-item">
                                <a href="http://localhost/wp-sandbox/hello-world/">Hello world!</a></li>
                        </ul>
                    </li>
                </ul>
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
    <section class="container">
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
        <div class="breadcrumb">
            <nav>
                <ul>
                    <?php custom_breadcrumbs(); ?>
                </ul>
            </nav>
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