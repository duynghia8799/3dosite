<?php
/*
*   Template name: 404
*/
get_header(); ?>
<div class="page-layout">
    <div class="banner-page">
        <ul class="bread-crumb">
            <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
            <li class="active"><a href="<?= the_permalink(); ?>">404</a></li>
        </ul>
        <h2 class="title-page"><?= the_title(); ?></h2>
    </div>
    <div class="content-page">
        <div class="container-fluid d-flex justify-content-center">
            <div class="container-layout-page">
                <div class="alert alert-secondary text-center" role="alert">
                    Đường dẫn không tồn tại
                </div>
                <div class="d-flex align-items-center justify-content-center m-3">
                    <a style="color: var(--background);" href="<?= home_url(); ?>" class="btn-default ripple-effect">Quay về trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>