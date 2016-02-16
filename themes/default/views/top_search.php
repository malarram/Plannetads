<?php
$categories = Model_Category::get_as_array();
$order_categories = Model_Category::get_multidimensional();
if (!function_exists('category_tree')) {

    function category_tree($item, $key, $cats) {
        if (core::config('general.search_multi_catloc')):
            ?>
            <option value="<?php echo $cats[$key]['seoname'] ?>" data-id="<?php echo $cats[$key]['id'] ?>" <?php echo (is_array(core::request('category')) AND in_array($cats[$key]['seoname'], core::request('category'))) ? "selected" : '' ?> ><?php echo $cats[$key]['name'] ?></option>
        <?php else: ?>
            <option value="<?php echo $cats[$key]['seoname'] ?>" data-id="<?php echo $cats[$key]['id'] ?>" <?php echo (core::request('category') == $cats[$key]['seoname']) ? "selected" : '' ?> ><?php echo $cats[$key]['name'] ?></option>
        <?php endif ?>
        <?php if (count($item) > 0): ?>
            <optgroup label="<?php echo $cats[$key]['name'] ?>">
                <?php if (is_array($item)) array_walk($item, 'category_tree', $cats); ?>
            </optgroup>
        <?php endif ?>
        <?php
    }

}


$locations = Model_Location::get_as_array();
$order_locations = Model_Location::get_multidimensional();

if (!function_exists('location_tree')) {

    function location_tree($item, $key, $locs) {
        ?>
        <?php if (core::config('general.search_multi_catloc')): ?>
            <option value="<?php echo $locs[$key]['seoname'] ?>" <?php echo (is_array(core::request('location')) AND in_array($locs[$key]['seoname'], core::request('location'))) ? "selected" : '' ?> ><?php echo $locs[$key]['name'] ?></option>
        <?php else: ?>
            <option value="<?php echo $locs[$key]['seoname'] ?>" <?php echo (core::request('location') == $locs[$key]['seoname']) ? "selected" : '' ?> ><?php echo $locs[$key]['name'] ?></option>
        <?php endif ?>
        <?php if (count($item) > 0): ?>
            <optgroup label="<?php echo $locs[$key]['name'] ?>">
                <?php if (is_array($item)) array_walk($item, 'location_tree', $locs); ?>
            </optgroup>
        <?php endif ?>
    <?php
    }

}
?>

<div class="main-search">
    <div class="uk-container uk-container-center">
        <div class="uk-block">
            <h1><?php echo __('Sell / Buy / Find Everything You Want') ?></h1>
<?php echo FORM::open(Route::url('search'), array('class' => 'search-container', 'method' => 'GET', 'action' => '', 'enctype' => 'multipart/form-data')) ?>
            <div class="uk-grid uk-grid-collapse">
                <div class="uk-width-medium-1-4 uk-width-small-1-1">
                    <select <?php echo core::config('general.search_multi_catloc') ? 'multiple' : NULL ?> name="category<?php echo core::config('general.search_multi_catloc') ? '[]' : NULL ?>" id="category" data-placeholder="<?php echo __('Category') ?>" class="uk-form custom-select">
                        <?php if (!core::config('general.search_multi_catloc')) : ?>
                            <option value=""><?php echo __('All Category') ?></option>
                        <?php endif ?>
<?php array_walk($order_categories, 'category_tree', $categories); ?>
                    </select>
                </div>
                <div class="uk-width-medium-4-10 uk-width-small-1-1" class="uk-search">
                    <input type="search" id="title" name="title" class="keyword-input uk-form-large" value="<?= core::get('title') ?>" placeholder="<?= __('Type a keyword') ?>">
                </div>
                <div class="uk-width-medium-1-4 uk-width-small-1-1 uk-form-icon">
                    <i class="uk-icon-map-marker"></i>
                    <select <?php echo core::config('general.search_multi_catloc') ? 'multiple' : NULL ?> name="location<?php echo core::config('general.search_multi_catloc') ? '[]' : NULL ?>" id="location" class="form-control" data-placeholder="<?php echo __(' AllLocation') ?>" class="uk-form custom-select">
                        <?php if (!core::config('general.search_multi_catloc')) : ?>
                            <option value=""><?php echo __('All Location') ?></option>
                        <?php endif ?>
<?php array_walk($order_locations, 'location_tree', $locations); ?>
                    </select>
                </div>
                <div class="uk-width-medium-1-10 uk-small-medium-1-1">
                    <input type="submit" name="submit" value="Search" id="submit-search" class="loc-search uk-button-primary uk-button-large uk-button">
                </div>
            </div>
<?php echo FORM::close() ?>
        </div>
    </div>
</div>