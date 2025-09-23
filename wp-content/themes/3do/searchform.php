<form class="search-form" action="<?= esc_url(home_url('/')); ?>" method="GET">
    <input type="search" name="s" value="<?= esc_attr(get_search_query()); ?>" class="input-search" placeholder="Tìm kiếm">
    <button type="submit" class="icon-search">
        <img width="16" height="16" alt="icon" src="<?= home_url('/wp-content/themes/3do/assets/images/icons/icon-search-white.svg'); ?>">
    </button>
</form>