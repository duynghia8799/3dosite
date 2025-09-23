<?php
$categories = get_the_category(get_the_ID());
setPostViews(get_the_ID());
get_header();

$postRelateds = get_posts([
    'post_type'      => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'post__not_in'   => [get_the_ID()],
    'order' => 'DESC',
    'orderby' => 'date',
]);
$relatedIds = [];
if ($postRelateds) {
    foreach ($postRelateds as $postRelated) {
        $relatedIds[] = $postRelated->ID;
    }
}
$relatedIds = array_merge($relatedIds, [get_the_ID()]);

$postsRecent = get_posts([
    'post_type'      => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'post__not_in'   => $relatedIds,
    'order' => 'DESC',
    'orderby' => 'date',
]);
$recentIds = [];
if ($postsRecent) {
    foreach ($postsRecent as $pR) {
        $recentIds[] = $pR->ID;
    }
}
$recentIds = array_merge($recentIds, $relatedIds);

$postsPopular = get_posts([
    'post_type'      => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'post__not_in'   => $recentIds,
    'order' => 'DESC',
    'orderby' => 'date',
]);

$tags = get_the_tags(get_the_ID());
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <div class="page-layout post-layout single-layout" id="post-id-<?php the_ID(); ?>">
            <div class="banner-page">
                <ul class="bread-crumb">
                    <li><a href="<?= home_url(); ?>">Trang chủ</a></li>
                    <?php if ($categories) { ?>
                        <li class="category"><a href="<?= home_url('category/' . $categories[0]->slug); ?>"><?= $categories[0]->name; ?></a></li>
                    <?php } ?>
                    <li class="active"><a href="<?= the_permalink(); ?>"><?= the_title(); ?></a></li>
                </ul>
                <h2 class="title-page"><?= the_title(); ?></h2>
            </div>
            <div class="single-page container-layout-page">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-9 col-lg-8 col-md-8 mb-4 mb-xl-0 mb-lg-0 mb-md-0">
                            <div class="form-search-mobile">
                                <?= get_search_form(); ?>
                            </div>
                            <div class="infor-single">
                                <h2 class="title-post"><?= the_title(); ?></h2>
                                <div class="infor-post">
                                    <span class="date"><?= get_the_date('d/m/Y'); ?></span>
                                    <span class="author">By <?= get_the_author(); ?> | <?= getPostViews(get_the_ID()); ?> view</span>
                                </div>
                                <div class="thumb">
                                    <?php
                                    if (has_post_thumbnail()) :
                                        the_post_thumbnail();
                                    endif;
                                    ?>
                                </div>
                            </div>
                            <div class="content-page"><?= the_content(); ?></div>
                            <div class="shares">
                                <span class="label">Chia sẻ</span>
                                <div class="list-social">
                                    <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/sharer/sharer.php?u=<?= the_permalink(); ?>" class="item">
                                        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-fb.svg') ?>" alt="Icon">
                                    </a>
                                    <a target="_blank" rel="noopener noreferrer" href="https://zalo.me/share/?url=<?= the_permalink(); ?>" class="item">
                                        <img src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-zalo.svg') ?>" alt="Icon">
                                    </a>
                                </div>
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
            <div class="list-news container-layout-page">
                <div class="container-fluid">
                    <h3 class="title-section text-center">Tin tức liên quan</h3>
                    <div class="row">
                        <?php
                        foreach ($postRelateds as $post) :
                            setup_postdata($post);
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
                                        <a href="<?= get_permalink($post->ID) ?>" class="title-post"><?= $post->post_title; ?></a>
                                        <span class="date"><?= get_the_date('d/m/Y', $post); ?></span>
                                        <span class="desc"><?= getExcerpt(); ?></span>
                                        <a href="<?= get_permalink($post->ID) ?>" class="see-more">Xem thêm →</a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
        </div>
<?php
        get_footer();
    endwhile;
endif;
?>