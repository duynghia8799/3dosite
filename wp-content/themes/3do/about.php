<?php
/*
*   Template name: Về chúng tôi
*/
get_header(); ?>

<div class="page-layout about-page">
    <div class="banner-page">
        <ul class="bread-crumb">
            <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
            <li class="active"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></li>
        </ul>
        <h2 class="title-page"><?= the_title(); ?></h2>
    </div>
    <div class="about-us container-layout-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-12 mb-3 mb-xl-0 mb-lg-0">
                    <div class="box-desc">
                        <h3 class="title-section"><?= get_field('title_section_about_us_left'); ?></h3>
                        <span class="desc"><?= get_field('desc_section_about_us_left'); ?></span>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12 mb-3 mb-xl-0 mb-lg-0">
                    <div class="image">
                        <?= wp_get_attachment_image(
                            attachment_url_to_postid(get_field('img_section_about_us')),
                            'full',
                            false,
                            [
                                'alt' => 'About us',
                            ]
                        ); ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="box-infor">
                        <h3 class="title-section"><?= get_field('title_section_number', 'option'); ?></h3>
                        <div class="box-number">
                            <?php
                            if (have_rows('list_number', 'option')):
                                while (have_rows('list_number', 'option')): the_row();
                            ?>
                                    <div class="item">
                                        <span class="number text-gardient"><?= get_sub_field('number', 'option'); ?></span>
                                        <?= get_sub_field('text'); ?>
                                    </div>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-benifit container-layout-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 mb-5 mb-xl-0 mb-lg-0">
                    <div class="box-benifit">
                        <h4 class="title-section"><?= get_field('title_section_benifit'); ?></h4>
                        <span class="desc"><?= get_field('desc_section_benifit'); ?></span>
                        <?php
                        if (have_rows('number_section_benifit')):
                            while (have_rows('number_section_benifit')): the_row();
                        ?>
                                <div class="trust">
                                    <span class="number"><?= get_sub_field('number'); ?></span>
                                    <?= get_sub_field('text'); ?>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 mb-3 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="image-benifit">
                        <?= wp_get_attachment_image(
                            attachment_url_to_postid(get_field('img_1_section_benifit')),
                            'full',
                            false,
                            [
                                'alt' => 'Imgage about us',
                            ]
                        ); ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="image-benifit">
                        <?= wp_get_attachment_image(
                            attachment_url_to_postid(get_field('img_2_section_benifit')),
                            'full',
                            false,
                            [
                                'alt' => 'Imgage about us',
                            ]
                        ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-value container-layout-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 mb-5 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="box-value">
                        <h4 class="title-section"><?= get_field('title_section_value'); ?></h4>
                        <div class="list-value">
                            <?php
                            if (have_rows('list_value')):
                                while (have_rows('list_value')): the_row();
                            ?>
                                    <div class="item">
                                        <div class="thumb">
                                            <?= wp_get_attachment_image(
                                                attachment_url_to_postid(get_sub_field('image')),
                                                'full',
                                                false,
                                                [
                                                    'alt' => 'Imgage value',
                                                ]
                                            ); ?>
                                        </div>
                                        <div class="infor">
                                            <span class="title"><?= get_sub_field('title'); ?></span>
                                            <span class="desc"><?= get_sub_field('desc'); ?></span>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="box-vision">
                        <h4 class="title-section"><?= get_field('title_section_vision'); ?></h4>
                        <span class="desc"><?= get_field('desc_section_vision'); ?></span>
                        <div class="box-infor">
                            <?php
                            if (have_rows('number_section_vision')):
                                while (have_rows('number_section_vision')): the_row();
                            ?>
                                    <div class="item">
                                        <span class="number"><?= get_sub_field('number'); ?></span>
                                        <?= get_sub_field('text'); ?>
                                    </div>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-certs section-certs container-layout-page">
        <div class="container-fluid">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('cert_item', 'option')):
                        while (have_rows('cert_item', 'option')): the_row();
                    ?>
                            <div class="swiper-slide">
                                <div class="box-cert">
                                    <?= wp_get_attachment_image(
                                        attachment_url_to_postid(get_sub_field('icon_item', 'option')),
                                        'full',
                                        false,
                                        [
                                            'alt'   => 'Img cert',
                                            'loading' => 'lazy'
                                        ]
                                    ); ?>
                                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                    <span class="title-cert"><?= get_sub_field('title_item', 'option'); ?></span>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="about-brands section-brands container-layout-page">
        <div class="container-fluid">
            <h3 class="title-section text-center"><?= get_field('title_section_brand', 'option'); ?></h3>
            <div class="list-brands lists-slide-images">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                        if (have_rows('list_logo', 'option')):
                            while (have_rows('list_logo', 'option')): the_row();
                        ?>
                                <div class="swiper-slide">
                                    <div class="box-img">
                                        <?= wp_get_attachment_image(
                                            attachment_url_to_postid(get_sub_field('image_logo', 'option')),
                                            'full',
                                            false,
                                            [
                                                'alt'   => 'Logo brand',
                                                'loading' => 'lazy'
                                            ]
                                        ); ?>
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="why-choose container-layout-page">
        <div class="container-fluid">
            <h3 class="title-section text-center"><?= get_field('title_section_why_choose', 'option'); ?></h3>
            <span class="desc-section text-center"><?= get_field('desc_section_why_choose', 'option'); ?></span>
            <div class="box-why-choose">
                <div class="list-reason">
                    <?php
                    if (have_rows('check_list_left_section_why_choose', 'option')):
                        while (have_rows('check_list_left_section_why_choose', 'option')): the_row();
                    ?>
                            <div class="item">
                                <div class="icon">
                                    <?= wp_get_attachment_image(
                                        attachment_url_to_postid(get_sub_field('icon', 'option')),
                                        'full',
                                        false,
                                        [
                                            'alt' => 'Icon',
                                        ]
                                    ); ?>
                                </div>
                                <span class="text"><?= get_sub_field('text', 'option'); ?></span>
                            </div>

                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="image">
                    <?= wp_get_attachment_image(
                        attachment_url_to_postid(get_field('image_section_why_choose', 'option')),
                        'full',
                        false,
                        [
                            'alt' => 'Why choose us',
                        ]
                    ); ?>
                </div>
                <div class="list-reason">
                    <?php
                    if (have_rows('check_list_right_section_why_choose', 'option')):
                        while (have_rows('check_list_right_section_why_choose', 'option')): the_row();
                    ?>
                            <div class="item">
                                <div class="icon">
                                    <?= wp_get_attachment_image(
                                        attachment_url_to_postid(get_sub_field('icon', 'option')),
                                        'full',
                                        false,
                                        [
                                            'alt' => 'Icon',
                                        ]
                                    ); ?>
                                </div>
                                <span class="text"><?= get_sub_field('text', 'option'); ?></span>
                            </div>

                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="about-kols container-layout-page">
        <div class="container-fluid">
            <h3 class="title-section text-center"><?= get_field('title_section_partner', 'option') ?></h3>
            <div class="list-partners lists-slide-images">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php
                        if (have_rows('list_vendor', 'option')):
                            while (have_rows('list_vendor', 'option')): the_row();
                        ?>
                                <div class="swiper-slide">
                                    <div class="box-img">
                                        <?= wp_get_attachment_image(
                                            attachment_url_to_postid(get_sub_field('logo', 'option')),
                                            'full',
                                            false,
                                            [
                                                'alt' => 'Logo partner',
                                                'loading' => 'lazy'
                                            ]
                                        ); ?>
                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="list-parper container-layout-page">
        <div class="container-fluid">
            <h3 class="title-section text-center"><?= get_field('title_section_parper_about', 'option'); ?></h3>
            <div class="row">
                <?php
                if (have_rows('list_section_parper_about', 'option')):
                    while (have_rows('list_section_parper_about', 'option')): the_row();
                ?>
                        <div class="col-xl-6 col-lg-6 mb-3">
                            <div class="box-post">
                                <div class="thumb">
                                    <?= wp_get_attachment_image(
                                        attachment_url_to_postid(get_sub_field('image', 'option')),
                                        'full',
                                        false,
                                        [
                                            'alt' => 'Thumb post',
                                        ]
                                    ); ?>
                                </div>
                                <div class="infor">
                                    <a target="_blank" href="<?= get_sub_field('link', 'option'); ?>" class="title-post"><?= get_sub_field('title', 'option'); ?></a>
                                    <span class="date"><?= get_sub_field('date', 'option'); ?></span>
                                    <span class="desc"><?= get_sub_field('desc', 'option'); ?></span>
                                    <a href="<?= get_sub_field('link', 'option'); ?>" class="see-more">Xem thêm →</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="section-sale container-layout-page">
        <div class="container-fluid">
            <h3 class="title-section text-center"><?= get_field('title_section_sale', 'option'); ?></h3>
            <div class="box-sale">
                <?php
                if (have_rows('box_left_section_sale', 'option')):
                    while (have_rows('box_left_section_sale', 'option')): the_row();
                ?>
                        <div class="box-left">
                            <div class="img-left">
                                <?= wp_get_attachment_image(
                                    attachment_url_to_postid(get_sub_field('image', 'option')),
                                    'full',
                                    false,
                                    [
                                        'alt' => '',
                                    ]
                                ); ?>
                            </div>
                            <div class="infor-left">
                                <h4 class="title"><?= get_sub_field('title', 'option'); ?></h4>
                                <div class="app-store">
                                    <div class="logo">
                                        <?= wp_get_attachment_image(
                                            attachment_url_to_postid(get_sub_field('logo_3do', 'option')),
                                            'full',
                                            false,
                                            [
                                                'alt' => '',
                                            ]
                                        ); ?>
                                    </div>
                                    <div class="store">
                                        <?= wp_get_attachment_image(
                                            attachment_url_to_postid(get_sub_field('logo_app_store', 'option')),
                                            'full',
                                            false,
                                            [
                                                'alt' => '',
                                            ]
                                        ); ?>
                                    </div>
                                </div>
                                <div class="commerce-link">
                                    <?= wp_get_attachment_image(
                                        attachment_url_to_postid(get_sub_field('logo_tik_tok', 'option')),
                                        'full',
                                        false,
                                        [
                                            'alt' => '',
                                        ]
                                    ); ?>
                                    <a target="_blank" href="<?= get_sub_field('link_tik_tok', 'option'); ?>" class="btn-default ripple-effect">Đến gian hàng</a>
                                </div>
                                <div class="commerce-link">
                                    <?= wp_get_attachment_image(
                                        attachment_url_to_postid(get_sub_field('logo_shoppe', 'option')),
                                        'full',
                                        false,
                                        [
                                            'alt' => '',
                                        ]
                                    ); ?>
                                    <a target="_blank" href="<?= get_sub_field('link_shoppe', 'option'); ?>" class="btn-default ripple-effect">Đến gian hàng</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
                <?php
                if (have_rows('box_right_section_sale', 'option')):
                    while (have_rows('box_right_section_sale', 'option')): the_row();
                ?>
                        <div class="box-right">
                            <div class="img-right">
                                <?= wp_get_attachment_image(
                                    attachment_url_to_postid(get_sub_field('image', 'option')),
                                    'full',
                                    false,
                                    [
                                        'alt' => '',
                                    ]
                                ); ?>
                            </div>
                            <div class="infor-right">
                                <h4 class="title"><?= get_sub_field('title', 'option'); ?></h4>
                                <span class="desc"><?= get_sub_field('desc', 'option'); ?></span>
                            </div>
                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
