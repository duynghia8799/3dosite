<?php
$brands = get_the_terms(get_the_ID(), 'brand');
$mainBrand = [];
$brandIds = [];
if (!empty($brands) && is_array($brands)) {
    $mainBrand = reset($brands);
    $brandIds = wp_list_pluck($brands, 'term_id');
}

$relatedProducts = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 8,
    'post__not_in'   => array($post->ID),
    'order' => 'DESC',
    'orderby' => 'date',
    'post_status' => 'publish',
    'tax_query'      => array(
        array(
            'taxonomy' => 'brand',
            'field'    => 'term_id',
            'terms'    => $brandIds,
        ),
    ),
));
// echo "<pre>", var_dump($relatedProducts), "</pre>";
get_header();
?>

<div class="page-layout product-page">
    <div class="banner-page">
        <ul class="bread-crumb">
            <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
            <li class="active"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></li>
        </ul>
        <h2 class="title-page title-product"><?= the_title(); ?></h2>
    </div>
    <div class="product-infor container-layout-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-7 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="thumb-product">
                        <?php
                        if (has_post_thumbnail()) :
                            the_post_thumbnail();
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-5">
                    <?php if ($mainBrand): ?>
                        <div class="product-brand">
                            <span class="label">Thương hiệu</span>
                            <a href="<?= home_url('brand/' . $mainBrand->slug) ?>" class="logo">
                                <?= wp_get_attachment_image(
                                    get_term_meta($mainBrand->term_id, 'logo_brand', true),
                                    'full',
                                    false,
                                    [
                                        'alt' => esc_attr($mainBrand->name)
                                    ]
                                ); ?>
                            </a>
                        </div>
                    <?php endif ?>
                    <div class="section-sale">
                        <div class="box-left">
                            <div class="infor-left">
                                <h4 class="title">Kênh bán hàng</h4>
                                <div class="app-store">
                                    <div class="logo">
                                        <img width="60" height="60" src="<?= home_url('/wp-content/themes/3do/assets/images/logo-footer.svg'); ?>" alt="Logo">
                                    </div>
                                    <div class="store">
                                        <img src="<?= home_url('/wp-content/themes/3do/assets/images/store-app.svg'); ?>" alt>
                                    </div>
                                </div>
                                <div class="commerce-link">
                                    <img width="60" height="60" src="<?= home_url('/wp-content/themes/3do/assets/images/tiktok.svg'); ?>" alt="Logo">
                                    <a target="_blank" href="<?= get_field('link_tik_tok_shop'); ?>" class="btn-default ripple-effect">Đến gian hàng</a>
                                </div>
                                <div class="commerce-link">
                                    <img width="150" height="48" src="<?= home_url('/wp-content/themes/3do/assets/images/shoppe.svg'); ?>" alt="Logo">
                                    <a target="_blank" href="<?= get_field('link_shoppe'); ?>" class="btn-default ripple-effect">Đến gian hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-page product-content container-layout-page">
        <div class="container-fluid">
            <?= wp_kses_post(the_content()); ?>
        </div>
    </div>
    <?php if ($relatedProducts->have_posts()) : ?>
        <div class="section-products container-layout-page">
            <div class="container-fluid">
                <h3 class="title-section text-center">Sản phẩm cùng thương hiệu</h3>
                <div class="row">
                    <?php while ($relatedProducts->have_posts()) : $relatedProducts->the_post(); ?>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-12">
                            <div class="product-item">
                                <a class="thumb" href="<?= the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) :
                                        the_post_thumbnail();
                                    endif;
                                    ?>
                                </a>
                                <div class="product-infor">
                                    <a href="<?= the_permalink(); ?>" class="product-title"><?= the_title(); ?></a>
                                    <span class="price-sale"><?= number_format((float) get_field('price_sale'), 0, '.', '.') . 'đ'; ?></span>
                                    <span class="price"><?= number_format((float) get_field('price'), 0, '.', '.') . 'đ'; ?></span>
                                </div>
                                <a href="<?= the_permalink(); ?>" class="product-detail">Đến xem sản phẩm →</a>
                            </div>
                        </div>
                    <?php endwhile ?>
                </div>
            </div>
        </div>
    <?php endif ?>
</div>
<?php
get_footer();
