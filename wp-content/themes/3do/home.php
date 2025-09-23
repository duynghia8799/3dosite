<?php
/*
*   Template name: Trang chủ 3DO
*/
get_header(); ?>

<div class="page-layout home-page">
    <div class="hero-banner container-layout-large">
        <div class="container-fluid">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <?php
                    if (have_rows('banner_slide')):
                        $i = 0;
                        while (have_rows('banner_slide')): the_row();
                    ?>
                            <div class="swiper-slide">
                                <a href="<?= get_sub_field('link_slide'); ?>">
                                    <?= wp_get_attachment_image(
                                        attachment_url_to_postid(get_sub_field('image_slide')),
                                        'full',
                                        false,
                                        [
                                            'alt'   => 'Hero banner',
                                            'class' => 'hero-bgr' . ($i == 0 ? ' skip-lazy' : '')
                                        ]
                                    ); ?>
                                </a>
                                <div class="hero-text">
                                    <h2 class="title"><?= get_sub_field('title_slide'); ?></h2>
                                    <p class="description"><?= get_sub_field('desc_slide'); ?></p>
                                    <?php if (get_sub_field('link_slide')): ?>
                                        <a href="<?= get_sub_field('link_slide'); ?>" class="btn-default ripple-effect">Tìm hiểu thêm</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                    <?php
                            $i++;
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="about-us container-layout-page">
        <div class="container-fluid">
            <div class="swiper">
                <div class="swiper-wrapper" style="padding-bottom: 30px;">
                    <?php
                    if (have_rows('about_slide')):
                        while (have_rows('about_slide')): the_row();
                    ?>
                            <div class="swiper-slide">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5 col-md-12 mb-4 mb-xl-0 mb-lg-0">
                                        <h3 class="title-section"><?= get_sub_field('title_slide'); ?></h3>
                                        <span class="description"><?= get_sub_field('desc_slide'); ?></span>
                                        <?php if (get_sub_field('link_slide')): ?>
                                            <a href="<?= get_sub_field('link_slide'); ?>" class="btn-default ripple-effect">Xem thêm</a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-xl-7 col-lg-7 col-md-12">
                                        <div class="list-img">
                                            <?php for ($i = 1; $i <= 3; $i++) { ?>
                                                <div class="img-item img-<?= $i; ?>">
                                                    <?= wp_get_attachment_image(
                                                        attachment_url_to_postid(get_sub_field('image_slide_' . $i)),
                                                        'full',
                                                        false,
                                                        [
                                                            'alt'   => 'Imgage about us',
                                                            'loading' => 'lazy'
                                                        ]
                                                    ); ?>
                                                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </div>
    <div class="about-certs section-certs container-layout-page">
        <div class="container-fluid">
            <h3 class="title-section text-center"><?= get_field('title_section_cert', 'option') ?></h3>
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
    <div class="background-special">
        <div class="product-newest">
            <div class="container-layout-page">
                <div class="container-fluid">
                    <h3 class="title-section text-center"><?= get_field('title_section_product_newest'); ?></h3>
                    <div class="box-product">
                        <div class="swiper">
                            <div class="swiper-wrapper" style="padding-bottom:30px;">
                                <?php
                                if (have_rows('slide_product')):
                                    while (have_rows('slide_product')): the_row();
                                ?>
                                        <div class="swiper-slide">
                                            <div class="row">
                                                <div class="col-xl-5 mb-4 mb-xl-0 d-flex align-item-center justify-content-center">
                                                    <div class="product-avatar">
                                                        <?= wp_get_attachment_image(
                                                            attachment_url_to_postid(get_sub_field('product_image')),
                                                            'full',
                                                            false,
                                                            [
                                                                'alt'   => 'Product image',
                                                                'loading' => 'lazy'
                                                            ]
                                                        ); ?>
                                                        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-7">
                                                    <div class="product-info">
                                                        <h4 class="title"><?= get_sub_field('product_name'); ?></h4>
                                                        <span class="description"><?= get_sub_field('product_desc'); ?></span>
                                                        <div class="brand-info">
                                                            <span class="label">Thương hiệu:</span>
                                                            <?php
                                                            $brand = get_sub_field('product_brand');
                                                            ?>
                                                            <a href="<?= home_url('brand/' . $brand->slug) ?>" class="icon">
                                                                <?= wp_get_attachment_image(
                                                                    get_term_meta($brand->term_id, 'logo_brand', true),
                                                                    'full',
                                                                    false,
                                                                    [
                                                                        'alt' => esc_attr($brand->name),
                                                                        'loading' => 'lazy'
                                                                    ]
                                                                ); ?>
                                                                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                                            </a>
                                                        </div>
                                                        <div class="product-action">
                                                            <a target="_blank" href="<?= get_sub_field('product_url') ? get_sub_field('product_url') : '#'; ?>" class="btn-default ripple-effect">
                                                                <img loading="lazy" width="24" height="24" src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-cart.svg'); ?>" alt="Icon">
                                                                Đến mua hàng
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-kols container-layout-page">
            <div class="container-fluid">
                <h3 class="title-section text-center"><?= get_field('title_section_partner', 'option') ?></h3>
                <div class="tab-kol">
                    <div class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Nhà cung cấp</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">KOLs/KOC</button>
                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Chuyên gia dinh dưỡng</button>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
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
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                            <div class="list-kols lists-slide-images image-text">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?php
                                        if (have_rows('list_kol', 'option')):
                                            while (have_rows('list_kol', 'option')): the_row();
                                        ?>
                                                <div class="swiper-slide">
                                                    <div class="box-content">
                                                        <div class="box-img">
                                                            <?= wp_get_attachment_image(
                                                                attachment_url_to_postid(get_sub_field('kol_image', 'option')),
                                                                'full',
                                                                false,
                                                                [
                                                                    'alt' => 'Logo KOL',
                                                                    'loading' => 'lazy'
                                                                ]
                                                            ); ?>
                                                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                                        </div>
                                                        <span class="box-text"><?= get_sub_field('kol_name', 'option'); ?></span>
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
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                            <div class="list-experts lists-slide-images image-text">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <?php
                                        if (have_rows('list_expert', 'option')):
                                            while (have_rows('list_expert', 'option')): the_row();
                                        ?>
                                                <div class="swiper-slide">
                                                    <div class="box-content">
                                                        <div class="box-img">
                                                            <?= wp_get_attachment_image(
                                                                attachment_url_to_postid(get_sub_field('expert_image', 'option')),
                                                                'full',
                                                                false,
                                                                [
                                                                    'alt' => 'Logo expert',
                                                                    'loading' => 'lazy'
                                                                ]
                                                            ); ?>
                                                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                                                        </div>
                                                        <span class="box-text"><?= get_sub_field('expert_name', 'option'); ?></span>
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
    </div>
    <div class="list-parper container-layout-page">
        <div class="container-fluid">
            <h3 class="title-section text-center"><?= get_field('title_section_parper_about', 'option'); ?></h3>
            <div class="row">
                <?php
                if (have_rows('list_section_parper_about', 'option')):
                    $i = 0;
                    while (have_rows('list_section_parper_about', 'option')): the_row();
                        if ($i == 2) {
                            continue;
                        }
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
                        $i++;
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
    <?php
    if (get_field('image_ads')): ?>
        <div class="banner-ads container-layout-page">
            <div class="container-fluid">
                <a target="_blank" href="<?= get_field('link_ads'); ?>" class="image-ads">
                    <?= wp_get_attachment_image(
                        attachment_url_to_postid(get_field('image_ads')),
                        'full',
                        false,
                        [
                            'alt' => 'Banner ads',
                        ]
                    ); ?>
                </a>
            </div>
        </div>
    <?php endif; ?>
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
    <div class="list-news container-layout-page">
        <div class="container-fluid">
            <h3 class="title-section text-center"><?= get_field('title_section_newest'); ?></h3>
            <div class="row">
                <?php
                $listPosts = get_field('list_post') ?? [];
                if ($listPosts) :
                    foreach ($listPosts as $post) :

                ?>
                        <div class="col-xl-4 col-md-4 mb-4 mb-xl-0 mb-md-0">
                            <div class="box-post layout-vertical">
                                <div class="thumb">
                                    <?php
                                    if (has_post_thumbnail($post)) :
                                        the_post_thumbnail();
                                    endif;
                                    ?>
                                </div>
                                <div class="infor">
                                    <a href="<?= the_permalink($post->ID); ?>" class="title-post"><?= $post->post_title; ?></a>
                                    <span class="date"><?= get_the_date('d/m/Y', $post); ?></span>
                                    <span class="desc"><?= getExcerpt(); ?></span>
                                    <a href="<?= the_permalink($post->ID); ?>" class="see-more">Xem thêm →</a>
                                </div>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
