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
        <div class="product-newest section-products">
            <div class="container-layout-page">
                <div class="container-fluid">
                    <h3 class="title-section text-center"><?= get_field('title_section_product_newest'); ?></h3>
                    <div class="row">
                        <?php
                        $listProducts = get_field('list_product') ?? [];
                        if ($listProducts) :
                            foreach ($listProducts as $product) :
                        ?>
                                <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                                    <div class="product-item">
                                        <a class="thumb" href="<?= the_permalink($product->ID); ?>">
                                            <?php
                                            if (has_post_thumbnail($product->ID)) :
                                                echo get_the_post_thumbnail($product->ID);
                                            endif;
                                            ?>
                                        </a>
                                        <div class="product-infor">
                                            <a href="<?= the_permalink($product->ID); ?>" class="product-title"><?= $product->post_title; ?></a>
                                            <span class="price-sale"><?= number_format((float) get_field('price_sale', $product->ID), 0, '.', '.') . 'đ'; ?></span>
                                            <span class="price"><?= number_format((float) get_field('price', $product->ID), 0, '.', '.') . 'đ'; ?></span>
                                        </div>
                                        <a href="<?= the_permalink($product->ID); ?>" class="product-detail">Đến xem sản phẩm →</a>
                                    </div>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
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
