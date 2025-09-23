<?php
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'rest_output_link_header', 11);
remove_action('wp_head', 'rsd_link');

add_action('wp_enqueue_scripts', function () {
    $version = '1.0.1';
    wp_enqueue_script('corejs', get_template_directory_uri() . '/libs/jquery/jquery.min.js', [], '3.7.1', true);
    wp_enqueue_style('main', get_template_directory_uri() . '/style.css', [], $version, 'all');
    wp_enqueue_script('main', get_template_directory_uri() . '/js/base.js', [], $version, true);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/libs/bootstrap/css/bootstrap.min.css', [], '5.3', 'all');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/libs/bootstrap/js/bootstrap.min.js', [], '5.3', true);
    wp_enqueue_style('swiper', get_template_directory_uri() . '/libs/swiper/css/swiper.min.css', [], '11.2.10', 'all');
    wp_enqueue_script('swiper', get_template_directory_uri() . '/libs/swiper/js/swiper.min.js', [], '11.2.10', true);
    //
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
    wp_dequeue_style('classic-theme-styles');
});

if (function_exists('acf_add_options_page')) {

    acf_add_options_page([
        'page_title' => 'Sections Chung',
        'menu_title' => 'Sections Chung',
        'menu_slug' => 'options_common',
        'capability' => 'edit_posts',
        'redirect' => false,
    ]);
}


add_action('init', function () {
    register_nav_menus(
        array(
            'header' => 'Header Menu',
            'footer1'  => 'Footer Column 1',
            'footer2' => 'Footer Column 2',
            'footer3' => 'Footer Column 3',
        )
    );
});


add_filter(
    'wpcf7_is_tel',
    function ($result, $tel) {
        $regex = '/^\(?\+?([0-9]{1,4})?\)?[-\. ]?(\d{10})$/';
        $result = preg_match($regex, $tel);
        return $result;
    },
    10,
    2
);

add_shortcode('form_contact', function () {
    $formDefault = do_shortcode('[contact-form-7 id="641e0ca" title="Contact form"]');
    $html = "<div class='form-contact'>
                {$formDefault}
            </div>";
    return $html;
});

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');

        return "0";
    }
    return $count;
}

function getExcerpt($limit = 130)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }
    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}

add_action('pre_get_posts', function ($query) {
    if ($query->is_search && !$query->is_admin) {
        $query->set('post_type', ['post', 'product']);
    }

    $s = $query->get('s');
    $s = wp_strip_all_tags($s);
    $s = preg_replace('/[^a-zA-Z0-9\s\p{L}]/u', '', $s);
    $query->set('s', $s);
}, 9999);


add_action(
    'after_setup_theme',
    function () {
        add_theme_support('post-thumbnails');
        add_theme_support(
            'html5',
            array(
                'search-form',
                // 'comment-form',
                // 'comment-list',
                'gallery',
                'caption',
            )
        );
    }
);

add_action('init', function () {

    $labels = array(
        'name'                  => __('Sản phẩm', 'product-custom-post-type'),
        'singular_name'         => __('Sản phẩm', 'product-custom-post-type'),
        'menu_name'             => __('Sản phẩm', 'product-custom-post-type'),
        'name_admin_bar'        => __('Sản phẩm', 'product-custom-post-type'),
        'all_items'             => __('Xem tất cả', 'product-custom-post-type'),
        'add_new_item'          => __('Thêm mới', 'product-custom-post-type'),
        'add_new'               => __('Thêm mới', 'product-custom-post-type'),
        'new_item'              => __('Thêm mới', 'product-custom-post-type'),
        'edit_item'             => __('Chỉnh sửa', 'product-custom-post-type'),
        'update_item'           => __('Chỉnh sửa', 'product-custom-post-type'),
        'view_item'             => __('Xem', 'product-custom-post-type'),
        'view_items'            => __('Xem', 'product-custom-post-type'),
    );
    $args = array(
        'label'                 => __('Sản phẩm', 'product-custom-post-type'),
        'description'           => __('Sản phẩm', 'product-custom-post-type'),
        'labels'                => $labels,
        'supports'              => ["title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "page-attributes", "post-formats"],
        'hierarchical'          => true,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_icon'             => 'dashicons-image-filter',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'capability_type'       => 'post',
    );
    register_post_type('product', $args);
}, 0);



add_action('init', function () {

    $labels = array(
        'name'                       => __('Thương hiệu', 'brand-custom-post-type'),
        'singular_name'              => __('Thương hiệu', 'brand-custom-post-type'),
        'menu_name'                  => __('Thương hiệu', 'brand-custom-post-type'),
        'all_items'                  => __('Xem tất cả', 'brand-custom-post-type'),
        'parent_item'                => __('Parent Item', 'brand-custom-post-type'),
        'parent_item_colon'          => __('Parent Item:', 'brand-custom-post-type'),
        'new_item_name'              => __('Thêm mới', 'brand-custom-post-type'),
        'add_new_item'               => __('Thêm mới', 'brand-custom-post-type'),
        'edit_item'                  => __('Chỉnh sửa', 'brand-custom-post-type'),
        'update_item'                => __('Chỉnh sửa', 'brand-custom-post-type'),
        'view_item'                  => __('Xem', 'brand-custom-post-type'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('brand', array('product'), $args);
}, 0);


add_action('template_redirect', function () {
    if (is_404() && $_SERVER['REQUEST_URI'] !== '/404') {
        wp_redirect(home_url('/404'), 302);
        exit;
    }
});
