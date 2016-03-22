<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?= Form::errors() ?>
<?if (Request::current()->query()):?>
<?if (count($ads)>0):?>
<?= View::factory('pages/ad/listing', array('pagination' => $pagination, 'ads' => $ads, 'category' => NULL, 'location' => NULL, 'user' => $user, 'featured' => NULL)) ?>
<?else:?>
<?= View::factory('top_search') ?>
<?= Breadcrumbs::render('breadcrumbs') ?>
<div class="uk-container uk-container-center">
    <div class="uk-grid">
        <?= View::factory('sidebar_category') ?>
        <div class="uk-width-large-8-10 uk-width-medium-7-10">
            <?php
            $replace['{CATEGORY}'] = (isset($category) && $category!==NULL) ? " in {$category->name}" : "";
            $replace['{LOCATION}'] = (isset($location) && $location!==NULL) ? " at {$location->name}" : "";
            $replace['{TITLE}'] = (core::get('title')) ? " for ". core::get('title') : " for All";

            $listing_title = __('Search results{TITLE} {CATEGORY} {LOCATION}', $replace);
            ?>
            <h3 class="text-bolder"> <?= $listing_title ?></h3>
            <!-- Sponsors ads -->
            <?= View::factory('top_sponsors') ?>
            <h3><?= __('Your search did not match any ads.') ?></h3>
        </div>
    </div>
</div>
<?endif?>
<?endif?>