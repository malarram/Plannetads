<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php __('dsdsd') ?>
<?= View::factory('top_search') ?>
<?= Breadcrumbs::render('breadcrumbs') ?>
<div class="uk-container uk-container-center">
    <div class="uk-grid">
        <?= View::factory('sidebar_category') ?>

        <div class="uk-width-large-8-10 uk-width-medium-7-10">
            <?
            if ($category!==NULL):
            $listing_title = __('Listings for '.$category->name);
            elseif ($location!==NULL):
            $listing_title = __('Listings for '.$location->name);
            else:
            $listing_title = __('Search results for "{TITLE}"',array('{TITLE}' => core::get('title')));
            endif
            ?>
            <h3 class="text-bolder"> <?= $listing_title ?></h3>
            <!-- Sponsors ads -->
            <?= View::factory('top_sponsors') ?>

            <!-- Cateogry listing -->
            <div class="uk-block">

                <?if(count($ads)):?>
                <?foreach($ads as $ad ):?>
                <?
                $highlighted = $premium = false;
                if($ad->highlighted >= Date::unix2mysql(time())):
                    $highlighted = true;
                endif;
                if($ad->premium >= Date::unix2mysql(time())):
                    $premium = true;
                endif;
                ?>
                <div class="listings <?=$premium ? "group corner" : "" ?>" id="fav-<?= $ad->id_ad ?>">
                    <a class="<?=$highlighted ? "highlighted-ads" : "" ?>" title="<?= HTML::chars($ad->title) ?>" href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                        <? if($premium): ?>
                        <div class="ribbon-wrapper"><div class="ribbon">Premium</div></div>
                        <? endif ?>

                        <div class="uk-grid">
                            <div class="uk-width-large-2-10 uk-width-medium-3-10 uk-width-small-3-10">
                                <?if($ad->get_first_image() !== NULL):?>
                                <img src="<?= $ad->get_first_image() ?>" class="uk-thumbnail" alt="<?= HTML::chars($ad->title) ?>" />
                                <?elseif(( $icon_src = $ad->category->get_icon() )!==FALSE ):?>
                                <img src="<?= $icon_src ?>" class="uk-thumbnail" alt="<?= HTML::chars($ad->title) ?>" />
                                <?elseif(( $icon_src = $ad->location->get_icon() )!==FALSE ):?>
                                <img src="<?= $icon_src ?>" class="uk-thumbnail" alt="<?= HTML::chars($ad->title) ?>" />
                                <?else:?>
                                <img src="<?= URL::base() . 'themes/default/images/default-ad-thumb.jpg' ?>" class="uk-thumbnail" alt="<?= HTML::chars($ad->title) ?>">
                                <?endif?>
                            </div>
                            <div class="uk-width-large-8-10 uk-width-medium-7-10 uk-width-small-7-10">
                                <h5 class="text-bold"><?= $ad->title ?></h5>
                                <span class="posted-on uk-text-small uk-text-muted"><?= Date::fuzzy_span(Date::mysql2unix($ad->created)) ?> | </span>
                                <?if($ad->id_location != 1):?>
                                <a href="<?= Route::url('list', array('location' => $ad->location->seoname)) ?>" title="<?= HTML::chars($ad->location->name) ?>">
                                    <span class="location uk-text-small uk-text-muted"><?= $ad->location->name ?></span>
                                </a>
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
