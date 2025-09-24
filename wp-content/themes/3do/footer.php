<footer>
    <div class="container-fluid d-flex justify-content-center">
        <div class="footer container-layout-large">
            <div class="row">
                <div class="col-xl-4 col-lg-4 mb-4 mb-xl-0 mb-lg-0">
                    <div class="footer-logo">
                        <a href="<?= home_url(); ?>" class="logo-footer">
                            <?= wp_get_attachment_image(
                                attachment_url_to_postid(get_field('logo_footer', 'option')),
                                'full',
                                false,
                                [
                                    'alt' => 'Icon',
                                ]
                            ); ?>
                        </a>
                        <p class="footer-desc"><?= get_field('desc_footer', 'option'); ?></p>
                    </div>
                    <ul class="footer-info">
                        <li>
                            <div class="icon">
                                <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-email.svg'); ?>" alt="icon">
                            </div>
                            <div class="info">
                                <span class="label">Địa chỉ</span>
                                <span class="value"><?= get_field('address_footer', 'option'); ?></span>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-phone.svg'); ?>" alt="icon">
                            </div>
                            <div class="info">
                                <span class="label">Hotline</span>
                                <span class="value"><?= get_field('phone_footer', 'option'); ?></span>
                            </div>
                        </li>
                        <li>
                            <div class="icon">
                                <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-email.svg'); ?>" alt="icon">
                            </div>
                            <div class="info">
                                <span class="label">Email</span>
                                <span class="value"><?= get_field('email_footer', 'option'); ?></span>
                            </div>
                        </li>
                    </ul>
                    <div class="footer-certificate">
                        <div class="icon">
                            <img src="<?= home_url('/wp-content/themes/3do/assets/images/cert-footer-1.svg'); ?>" alt="cert">
                        </div>
                        <div class="icon">
                            <img src="<?= home_url('/wp-content/themes/3do/assets/images/cert-footer-2.svg'); ?>" alt="cert">
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8">
                    <div class="footer-nav">
                        <div class="footer-menu">
                            <h3 class="title">Thông tin và chính sách</h3>
                            <?=
                            wp_nav_menu([
                                'theme_location' => 'footer1',
                                'menu_class'     => 'menu-footer',
                                'container'      => false,
                            ]);
                            ?>
                        </div>
                        <div class="footer-menu">
                            <h3 class="title">Thông tin khác</h3>
                            <?=
                            wp_nav_menu([
                                'theme_location' => 'footer2',
                                'menu_class'     => 'menu-footer',
                                'container'      => false,
                            ]);
                            ?>
                        </div>
                        <div class="footer-menu">
                            <h3 class="title">Thương hiệu</h3>
                            <?=
                            wp_nav_menu([
                                'theme_location' => 'footer3',
                                'menu_class'     => 'menu-footer',
                                'container'      => false,
                            ]);
                            ?>
                        </div>
                    </div>
                    <div class="footer-more">
                        <span class="footer-copyright">Copyright <?= date('Y'); ?> © Bản quyền thuộc về 3DO</span>
                        <div class="footer-social">
                            <?php
                            if (have_rows('social_footer', 'option')):
                                while (have_rows('social_footer', 'option')): the_row();
                            ?>
                                    <a <?= get_sub_field('link_facebook', 'option') ? 'href="' . get_sub_field('link_facebook', 'option') . '"' : ''; ?> class="icon">
                                        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-fb.svg'); ?>" alt="Facebook">
                                    </a>
                                    <a <?= get_sub_field('link_zalo', 'option') ? 'href="' . get_sub_field('link_zalo', 'option') . '"' : ''; ?> class="icon">
                                        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-zalo.svg'); ?>" alt="Zalo">
                                    </a>
                                    <a <?= get_sub_field('link_youtube', 'option') ? 'href="' . get_sub_field('link_youtube', 'option') . '"' : ''; ?> class="icon">
                                        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-yt.svg'); ?>" alt="Youtube">
                                    </a>
                                    <a <?= get_sub_field('link_tiktok', 'option') ? 'href="' . get_sub_field('link_tiktok', 'option') . '"' : ''; ?> class="icon">
                                        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-tiktok.svg'); ?>" alt="Tik Tok">
                                    </a>
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
</footer>
<div class="lead-form-modal modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <?= do_shortcode('[form_contact]'); ?>
        </div>
    </div>
</div>
<div class="scroll-to-top">
    <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-down.svg'); ?>" alt="Icon">
</div>
<div class="group-call">
    <a <?= get_field('hotline_group_call', 'option') ? 'href="tel:' . get_field('hotline_group_call', 'option') . '"' : '' ?> class="item">
        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-phone-ring.svg'); ?>" width="57" height="57" alt="Icon">
    </a>
    <div class="item" data-bs-toggle="modal" data-bs-target=".lead-form-modal">
        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-mail-ring.svg'); ?>" width="57" height="57" alt="Icon">
    </div>
    <a <?= get_field('zalo_group_call', 'option') ? 'href="' . get_field('zalo_group_call', 'option') . '"' : '' ?> class="item" target="_blank">
        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-zalo-ring.svg'); ?>" width="57" height="57" alt="Icon">
    </a>
</div>
<?php
wp_footer();
get_template_part('embeds/content', 'footer');
?>
</body>

</html>