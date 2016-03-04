<?php
$categories = (new Model_Category())->where('id_category_parent', '=', 1)->order_by('order', 'asc')->find_all()->cached()->as_array('id_category');
$parent_loc = (new Model_Location())->where('id_location_parent', '<>', 0)->order_by('order', 'asc')->cached()->find_all();
$locations = array();
foreach ($parent_loc as $loc) {
    if ($loc->id_location_parent == 1)
        $locations[$loc->id_location]['optgroup'] = $loc->name;
    else
        $locations[$loc->id_location_parent]['options'][] = [$loc->id_location, $loc->name, $loc->seoname];
}
ksort($locations);

$selected_option = Cookie::get('current_location');
?>
<div class="main-search">
    <div class="uk-container uk-container-center">
        <div class="uk-block">
            <h1><?php echo __('Sell / Buy / Find Everything You Want') ?></h1>
            <?php echo FORM::open(Route::url('search'), array('class' => 'search-container', 'method' => 'GET', 'action' => '', 'enctype' => 'multipart/form-data')) ?>
            <div class="uk-grid uk-grid-collapse">
                <div class="uk-width-medium-1-4 uk-width-small-1-1">
                    <select name="category" id="category" data-placeholder="<?php echo __('Category') ?>" class="uk-form selectric-select">
                        <option value=""><?php echo __('All Category') ?></option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->seoname ?>" data-id="<?php echo $category->id_category ?>" <?php echo (core::request('category') == $category->seoname) ? "selected" : '' ?> ><?php echo $category->name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="uk-width-medium-4-10 uk-width-small-1-1" class="uk-search">
                    <input type="search" id="title" name="title" class="keyword-input uk-form-large" value="<?= core::get('title') ?>" placeholder="<?= __('Type a keyword') ?>">
                </div>
                <div class="uk-width-medium-1-4 uk-width-small-1-1 uk-form-icon">
                    <i class="uk-icon-map-marker"></i>
                    <select name="location" id="location" data-placeholder="<?php echo __(' All Location') ?>" class="uk-form chosen-select search-location">
                        <option value=""><?php echo __('All Location') ?></option>
                        <?foreach($locations as $loc):?>
                        <optgroup label="<?= $loc['optgroup'] ?>">
                            <?foreach($loc['options'] as $option):?>
                            <option <?= ($option[2] == $selected_option) ? 'selected="selected"' : '' ?> value="<?= $option[2] ?>"><?= $option[1] ?></option>
                            <?endforeach?>
                        </optgroup>
                        <?endforeach?>
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