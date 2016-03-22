<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php __('dsdsd') ?>
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

            <!-- Cateogry listing -->
            <div class="uk-block">

                <?if(count($ads)):?>
                <div class="btn-group pull-right uk-hidden">
                    <?if(core::config('general.auto_locate')):?>
                    <button
                        class="btn btn-sm btn-default <?= core::request('userpos') == 1 ? 'active' : NULL ?>"
                        id="myLocationBtn"
                        type="button"
                        data-toggle="modal"
                        data-target="#myLocation"
                        data-marker-title="<?= __('My Location') ?>"
                        data-marker-error="<?= __('Cannot determine address at this location.') ?>"
                        data-href="?<?= http_build_query(['userpos' => 1] + Request::current()->query()) ?>">
                        <i class="glyphicon glyphicon-map-marker"></i> <?= sprintf(__('%s from you'), i18n::format_measurement(Core::config('advertisement.auto_locate_distance', 1))) ?>
                    </button>
                    <?endif?>
                    <?if (core::config('advertisement.map')==1):?>
                    <a href="<?= Route::url('map') ?>?category=<?= Model_Category::current()->loaded() ? Model_Category::current()->seoname : NULL ?>&location=<?= Model_Location::current()->loaded() ? Model_Location::current()->seoname : NULL ?>"
                       class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-globe"></span> <?= __('Map') ?>
                    </a>
                    <?endif?>
                    <button type="button" id="sort" data-sort="<?= core::request('sort') ?>" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-list-alt"></span> <?= __('Sort') ?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" id="sort-list">
                        <li><a href="?<?= http_build_query(['sort' => 'title-asc'] + Request::current()->query()) ?>"><?= __('Name (A-Z)') ?></a></li>
                        <li><a href="?<?= http_build_query(['sort' => 'title-desc'] + Request::current()->query()) ?>"><?= __('Name (Z-A)') ?></a></li>
                        <?if(core::config('advertisement.price')!=FALSE):?>
                        <li><a href="?<?= http_build_query(['sort' => 'price-asc'] + Request::current()->query()) ?>"><?= __('Price (Low)') ?></a></li>
                        <li><a href="?<?= http_build_query(['sort' => 'price-desc'] + Request::current()->query()) ?>"><?= __('Price (High)') ?></a></li>
                        <?endif?>
                        <li><a href="?<?= http_build_query(['sort' => 'featured'] + Request::current()->query()) ?>"><?= __('Featured') ?></a></li>
                        <li><a href="?<?= http_build_query(['sort' => 'favorited'] + Request::current()->query()) ?>"><?= __('Favorited') ?></a></li>
                        <?if(core::config('general.auto_locate')):?>
                        <li><a href="?<?= http_build_query(['sort' => 'distance'] + Request::current()->query()) ?>" id="sort-distance"><?= __('Distance') ?></a></li>
                        <?endif?>
                        <li><a href="?<?= http_build_query(['sort' => 'published-desc'] + Request::current()->query()) ?>"><?= __('Newest') ?></a></li>
                        <li><a href="?<?= http_build_query(['sort' => 'published-asc'] + Request::current()->query()) ?>"><?= __('Oldest') ?></a></li>
                    </ul>
                </div>

                <?foreach($ads as $ad ):?>
                <?
                $highlighted = ($ad->highlighted >= Date::unix2mysql(time())) ? true : false;
                $premium = ($ad->premium >= Date::unix2mysql(time())) ? true : false;
                ?>
                <div class="listings <?= $premium ? "group corner" : "" ?>" id="fav-<?= $ad->id_ad ?>">
                    <a  class="<?= $highlighted ? "highlighted-ads" : "" ?>"
                        title="<?= HTML::chars($ad->title) ?>"
                        href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                        <? if($premium): ?>
                        <div class="ribbon-wrapper"><div class="ribbon">Premium</div></div>
                        <? endif; ?>
                        <div class="uk-grid">
                            <div class="uk-width-large-2-10 uk-width-medium-3-10 uk-width-small-3-10">
                                <img src="<?=$ad->get_list_image()?>" alt="<?= HTML::chars($ad->title) ?>" class="uk-thumbnail" />
                            </div>
                            <div class="uk-width-large-8-10 uk-width-medium-7-10 uk-width-small-7-10">
                                <h5 class="text-bold"><?= $ad->title ?></h5>
                                <span class="posted-on uk-text-small uk-text-muted"><?= Date::fuzzy_span(Date::mysql2unix($ad->created)) ?> | </span>
                                <?if($ad->id_location != 1):?>
                                    <span class="location uk-text-small uk-text-muted"><?= $ad->location->name ?></span>
                                <?endif?>
                                <div class="uk-text-bold uk-text-danger"> <?= i18n::money_format($ad->price) ?></div>
                                <?if(core::config('advertisement.description')!=FALSE):?>
                                <p class="uk-text-muted"><?= Text::limit_chars(Text::removebbcode($ad->description), 255, NULL, TRUE); ?></p>
                                <?endif?>
                            </div>
                        </div>
                    </a>
                </div>
                <?endforeach?>
                <?else:?>
                <div class="no-listings uk-grid">
                    <div class="uk-width-medium-1-1">
                        <h3><?= __('We do not have any advertisements in this category') ?></h3>
                    </div>
                </div>
                <?endif?>
            </div>
            <?= $pagination ?>
        </div>
    </div>
</div>
