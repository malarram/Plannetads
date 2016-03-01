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
            <?
            if (isset($category) && $category!==NULL):
            $listing_title = __('Listings for '.$category->name);
            elseif (isset($location) && $location!==NULL):
            $listing_title = __('Listings for '.$location->name);
            else:
            $listing_title = __('Search results for "{TITLE}"',array('{TITLE}' => core::get('title')));
            endif
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