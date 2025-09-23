<?php
/* 3Do Theme Index File */
get_header(); ?>
<div class="page-layout">
    <div class="banner-page">
        <ul class="bread-crumb">
            <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
            <li class="active"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></li>
        </ul>
        <h2 class="title-page"><?= the_title(); ?></h2>
    </div>
    <div class="content-page">
        <div class="container-fluid d-flex justify-content-center">
            <div class="container-layout-page">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>