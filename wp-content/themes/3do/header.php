<!DOCTYPE html>
<html lang="vi-VN">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="<?php is_front_page() ? bloginfo('name') : wp_title(''); ?>" name="description" />
    <title><?php is_front_page() ? bloginfo('name') : wp_title(''); ?></title>
    <link rel="shortcut icon" href="<?= home_url(); ?>/favicon.ico" type="image/x-icon" />
    <?php
    wp_head();
    get_template_part('embeds/content', 'header');
    ?>
</head>

<body>
    <header>
        <div class="container-fluid d-flex justify-content-center h-100">
            <div class="header container-layout-large">
                <div class="icon-menu-mobile" data-bs-toggle="modal" data-bs-target=".menu-mobile">
                    <div class="line"></div>
                    <div class="line"></div>
                    <div class="line"></div>
                </div>
                <h1 class="logo-header">
                    <a class="d-flex" href="<?= home_url(); ?>">
                        <img alt="logo" width="224" height="72" class="skip-lazy" src="<?= home_url('/wp-content/themes/3do/assets/images/logo.svg'); ?>">
                    </a>
                </h1>
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                    'menu_class'     => 'main-menu',
                    'container_class' => 'main-header',
                ]);
                ?>
                <div class="actions-header">
                    <div class="form-search">
                        <img width="24" height="24" class="icon" alt="icon" class="skip-lazy" src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-search.svg'); ?>">
                        <div class="form-search-header">
                            <form class="search-form" action="<?= esc_url(home_url('/')); ?>" method="GET">
                                <input type="search" name="s" value="<?= esc_attr(get_search_query()); ?>" class="input-search" placeholder="Tìm kiếm">
                                <button type="submit" class="icon-search">
                                    <img width="24" height="24" alt="icon" src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-search.svg'); ?>">
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="btn-action ripple-effect" data-bs-toggle="modal" data-bs-target=".lead-form-modal">
                        <img width="24" height="24" class="icon" alt="icon" class="skip-lazy" src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-badge.svg'); ?>">
                        <span>Trở thành đối tác</span>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <div class="menu-mobile modal fade" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="menu-header">
                    <a class="logo-header d-flex" href="<?= home_url(); ?>">
                        <img alt="logo" width="224" height="72" src="<?= home_url('/wp-content/themes/3do/assets/images/logo.svg'); ?>">
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?php
                wp_nav_menu([
                    'theme_location' => 'header',
                    'menu_class'     => 'main-menu',
                    'container_class' => 'main-header',
                ]);
                ?>
                <div class="btn-action ripple-effect" data-bs-toggle="modal" data-bs-target=".lead-form-modal">
                    <img width="24" height="24" class="icon" alt="icon" class="skip-lazy" src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-badge.svg'); ?>">
                    <span>Trở thành đối tác</span>
                </div>
            </div>
        </div>
    </div>