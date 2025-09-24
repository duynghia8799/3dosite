<?php
/*
*   Template name: Liên hệ
*/
get_header(); ?>

<div class="page-layout contact-page">
    <div class="banner-page">
        <ul class="bread-crumb">
            <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
            <li class="active"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></li>
        </ul>
        <h2 class="title-page"><?= the_title(); ?></h2>
    </div>
    <div class="contact-layout container-layout-page">
        <div class="contact-infor">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    if (have_rows('list_infor_contact')):
                        $i = 0;
                        while (have_rows('list_infor_contact')): the_row();
                            $i++;
                    ?>
                            <div class="<?= $i == 3 ? 'col-xl-4 col-lg-4 col-md-4 col-sm-12' : 'col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-4 mb-xl-0 mb-lg-0 mb-md-0' ?>">
                                <div class="box-infor">
                                    <div class="icon">
                                        <?= wp_get_attachment_image(
                                            attachment_url_to_postid(get_sub_field('icon_contact')),
                                            'full',
                                            false,
                                            [
                                                'alt' => 'Icon',
                                            ]
                                        ); ?>
                                    </div>
                                    <span class="title"><?= get_sub_field('type_contact'); ?></span>
                                    <span class="value"><?= get_sub_field('value_contact'); ?></span>
                                </div>
                            </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>

        </div>
        <div class="contact-main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
                        <div class="box-left">
                            <h4 class="sub-title"><?= get_field('title_section_contact'); ?></h4>
                            <h3 class="title-section"><?= get_field('sub_title_section_contact'); ?></h3>
                            <span class="desc"><?= get_field('desc_section_contact'); ?></span>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="box-right">
                            <?= do_shortcode('[form_contact]'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="about-brands section-brands container-layout-page">
        <div class="container-fluid">
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
                                                'alt' => 'Logo brand',
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
    <div class="contact-map container-layout-page">
        <div class="container-fluid">
            <div class="map">
                <?= get_field('google_map'); ?>
                <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d70676.88298279453!2d105.74304857037164!3d21.035914749603943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3135ab7de9746a17%3A0xb4931597c3a6e1a8!2zUmljaGxhbmQgU291dGhlcm4gVG93ZXIsIFJpY2hsYW5kIHNvdXRoZXJuLCA5QSBOZy4gMTgxIMSQLiBYdcOibiBUaOG7p3ksIEThu4tjaCBW4buNbmcgSOG6rXUsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!3m2!1d21.035841299999998!2d105.7841974!5e1!3m2!1svi!2s!4v1755527222286!5m2!1svi!2s" width="100%" height="496" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
