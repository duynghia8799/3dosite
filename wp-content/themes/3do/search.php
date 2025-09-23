<?php
$keyword = esc_sql(esc_js(esc_html(wp_strip_all_tags(get_search_query()))));
global $query_string;
wp_parse_str($query_string, $search_query);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$search = new WP_Query($search_query);

$postsRecent = get_posts([
    'post_type'      => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'order' => 'DESC',
    'orderby' => 'date',
]);
$recentIds = [];
if ($postsRecent) {
    foreach ($postsRecent as $pR) {
        $recentIds[] = $pR->ID;
    }
}

$postsPopular = get_posts([
    'post_type'      => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'post__not_in'   => $recentIds,
    'order' => 'DESC',
    'orderby' => 'date',
]);

$tags = get_the_tags(get_the_ID());
get_header();
?>

<div class="page-layout post-layout">
    <div class="banner-page">
        <ul class="bread-crumb">
            <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
        </ul>
        <h2 class="title-page">Tìm kiếm: <?= $keyword; ?></h2>
    </div>
    <div class="search-page container-layout-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-8 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
                    <div class="form-search-mobile">
                        <?= get_search_form(); ?>
                    </div>
                    <div class="list-posts">
                        <?php
                        if ($search->have_posts() && $keyword) :
                            while ($search->have_posts()) : $search->the_post();
                        ?>
                                <div class="item">
                                    <div class="thumb">
                                        <?php
                                        if (has_post_thumbnail()) :
                                            the_post_thumbnail();
                                        endif;
                                        ?>
                                    </div>
                                    <div class="infor">
                                        <div class="infor-post">
                                            <span class="date"><?= get_the_date('d/m/Y'); ?></span>
                                            <span class="author">By <?= get_the_author(); ?> | <?= getPostViews(get_the_ID()); ?> view</span>
                                        </div>
                                        <a href="<?= the_permalink(); ?>" class="title-post"><?= the_title(); ?></a>
                                        <span class="desc"><?= getExcerpt(30) ?></span>
                                        <a href="<?= the_permalink(); ?>" class="see-more">Đọc thêm →</a>
                                    </div>
                                </div>
                        <?php
                            endwhile;
                        else : echo
                            '<div class="alert alert-secondary text-center" role="alert">
                                Không có kết quả phù hợp ...!
                            </div>';
                        endif;
                        ?>
                    </div>
                    <div class="text-center" id="pagination">

                        <?php
                        echo paginate_links(array(
                            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'total'        => $search->max_num_pages,
                            'current'      => max(1, get_query_var('paged')),
                            'format'       => '?paged=%#%',
                            'show_all'     => false,
                            'type'         => 'plain',
                            'end_size'     => 2,
                            'mid_size'     => 1,
                            'prev_next'    => true,
                            'prev_text'    => sprintf('<i></i> %1$s', __('<img src="' . home_url('/wp-content/themes/3do/assets/images/icons/icon-down.svg') . '" />', 'text-domain')),
                            'next_text'    => sprintf('%1$s <i></i>', __('<img src="' . home_url('/wp-content/themes/3do/assets/images/icons/icon-down.svg') . '" />', 'text-domain')),
                            'add_args'     => false,
                            'add_fragment' => '',
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="sidebar">
                        <div class="form-search">
                            <span class="title">Tìm kiếm</span>
                            <?= get_search_form(); ?>
                        </div>

                        <?php
                        // Widget Bài viết gần đây
                        if ($postsRecent):
                        ?>
                            <div class="widget">
                                <span class="title">Bài viết gần đây</span>
                                <div class="list-posts small">
                                    <?php
                                    foreach ($postsRecent as $post) :
                                        setup_postdata($post);
                                    ?>
                                        <div class="item">
                                            <div class="thumb">
                                                <?php
                                                if (has_post_thumbnail($post)) :
                                                    the_post_thumbnail();
                                                endif;
                                                ?>
                                            </div>
                                            <div class="infor">
                                                <div class="infor-post">
                                                    <span class="date"><?= get_the_date('d/m/Y', $post); ?></span>
                                                </div>
                                                <a href="<?= get_permalink($post->ID) ?>" class="title-post"><?= $post->post_title; ?></a>
                                            </div>
                                        </div>
                                    <?php
                                    endforeach;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        <?php
                        endif;
                        ?>

                        <?php
                        // Widget bài viết phổ biến
                        if ($postsPopular):
                        ?>
                            <div class="widget">
                                <span class="title">Bài viết phổ biến</span>
                                <div class="list-posts small">
                                    <?php
                                    foreach ($postsPopular as $post) :
                                        setup_postdata($post);
                                    ?>
                                        <div class="item">
                                            <div class="thumb">
                                                <?php
                                                if (has_post_thumbnail($post)) :
                                                    the_post_thumbnail();
                                                endif;
                                                ?>
                                            </div>
                                            <div class="infor">
                                                <div class="infor-post">
                                                    <span class="date"><?= get_the_date('d/m/Y', $post); ?></span>
                                                </div>
                                                <a href="<?= get_permalink($post->ID) ?>" class="title-post"><?= $post->post_title; ?></a>
                                            </div>
                                        </div>
                                    <?php
                                    endforeach;
                                    wp_reset_postdata();
                                    ?>
                                </div>
                            </div>
                        <?php
                        endif;
                        ?>

                        <?php
                        // Widget Tags
                        if ($tags):
                        ?>
                            <div class="widget">
                                <span class="title">Tag Cloud</span>
                                <div class="list-tags">
                                    <?php
                                    foreach ($tags as $tag) :
                                    ?>
                                        <a href="<?= home_url('tag/' . $tag->slug) ?>" class="item"><?= $tag->name; ?></a>
                                    <?php
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        <?php
                        endif;
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
