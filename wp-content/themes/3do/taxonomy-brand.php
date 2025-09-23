<?php
$allBrands = get_terms(
    array(
        'taxonomy' => 'brand',
        'hide_empty' => false,
        'hierarchical' => true,
        'number'     => 10,
        'orderby'    => 'id',
        'order'      => 'DESC'
    )
);

$slug = get_query_var('term');
$brandCurrent = get_term_by('slug', $slug, 'brand');
$kolList = get_field('list_kol_brand', 'brand_' . $brandCurrent->term_id);
$listKolImgs = [];
if ($kolList && is_array($kolList)) {
    $listKolImgs = array_filter($kolList, function ($kol) {
        return $kol['image'];
    });
}
// echo "<pre>", var_dump($listKolImgs), "</pre>";
$relatedProducts = new WP_Query(array(
    'post_type'      => 'product',
    'posts_per_page' => 8,
    'order' => 'DESC',
    'orderby' => 'date',
    'post_status' => 'publish',
    'tax_query'      => array(
        array(
            'taxonomy' => 'brand',
            'field'    => 'term_id',
            'terms'    => [$brandCurrent->term_id],
        ),
    ),
));
get_header(); ?>
<div class="page-layout brand-page">
    <div class="banner-page">
        <ul class="bread-crumb">
            <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
            <li class="active"><a href="<?= home_url('/brand/' . $brandCurrent->slug); ?>"><?= $brandCurrent->name; ?></a></li>
        </ul>
        <h2 class="title-page">Thương hiệu</h2>
    </div>
    <div class="brand-content container-layout-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="box-brands">
                        <span class="title">Thương hiệu</span>
                        <ul class="list-brands">
                            <?php foreach ($allBrands as $brand): ?>
                                <a href="<?= home_url('brand/' . $brand->slug); ?>" class="item <?= $brand->term_id == $brandCurrent->term_id ? 'active' : ''; ?>">
                                    <div class="logo">
                                        <?= wp_get_attachment_image(
                                            get_term_meta($brand->term_id, 'logo_brand', true),
                                            'full',
                                            false,
                                            [
                                                'alt' => esc_attr($brand->name)
                                            ]
                                        ); ?>
                                    </div>
                                    <img class="arrow" src="<?= home_url('/wp-content/themes/3do/assets/images//icons/icon-arrow-right.svg'); ?>" alt="Icon">
                                </a>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div class="brand-infor">
                        <a class="thumb">
                            <?= wp_get_attachment_image(
                                get_term_meta($brandCurrent->term_id, 'banner_brand', true),
                                'full',
                                false,
                                [
                                    'alt' => esc_attr($brandCurrent->name)
                                ]
                            ); ?>
                        </a>
                        <span class="content-page content-brand"><?= wp_kses_post(get_field('desc_brand', 'brand_' . $brandCurrent->term_id)); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($listKolImgs): ?>
        <div class="brand-kol container-layout-page">
            <div class="container-fluid">
                <h3 class="title-section text-center">KOLs</h3>
                <div class="list-kol">
                    <?php
                    $i = 0;
                    foreach ($listKolImgs as $row):
                        $i++;
                    ?>
                        <div class="item item-<?= $i; ?>">
                            <?= wp_get_attachment_image(
                                attachment_url_to_postid($row['image']),
                                'full'
                            ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
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
