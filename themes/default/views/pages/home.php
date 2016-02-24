<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- Search bar starts -->
<?=View::factory('top_search')?>


<!-- Featured Listing -->
<div class="uk-container uk-container-center featured-listing">
    <div class="uk-block uk-text-center">
        <h2 class="uk-text-upper"><?= __('Featured Ads') ?></h2>
        <p>Lorem ipsum dolor sit amet, Vivamus congue euismod ex, at sodales eros tincidunt eget
            <br> In hac habitasse platea dictumst. Nulla commodo elementum elit, et ultrices magna venenatis nec</p>
    </div>
    <div data-uk-slideset="{small: 2, medium: 4, large: 4, autoplay:true, autoplayInterval:5000}">
        <div class="uk-slidenav-position uk-slidenav-custom">
            <a href="" class="uk-slidenav uk-slidenav-previous" data-uk-slideset-item="previous"></a>
            <a href="" class="uk-slidenav uk-slidenav-next" data-uk-slideset-item="next"></a>
        </div>
        <ul class="uk-grid uk-slideset">
            <?
            $i=0; foreach($ads as $ad):
            if(!$ad_first = $ad->get_first_image()):
                $ad_first = URL::base().'themes/default/images/default-ad-thumb.jpg';
            endif;
            ?>
            <li>
                <div class="uk-panel uk-panel-box">
                    <div class="uk-panel-teaser">
                        <a href="<?= Route::url('ad', array('category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                            <img src="<?=$ad_first?>" alt="<?= HTML::chars($ad->title) ?>">
                        </a>
                    </div>
                    <span class="uk-text-danger uk-text-bold uk-text-small"><?=i18n::money_format( $ad->price)?></span>
                    <h5 class="uk-margin-top-remove">
                        <a href="<?= Route::url('ad', array('category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                            <?= $ad->title ?>
                        </a>
                    </h5>
                </div>
            </li>
            <?endforeach?>
        </ul>
    </div>
</div>
<!-- Category Listing -->
<div class="uk-container uk-container-center categories-listing">
    <div class="uk-block uk-text-center">
        <h2 class="uk-text-upper"><?= __("Browse categories") ?></h2>
        <p>Lorem ipsum dolor sit amet, Vivamus congue euismod ex, at sodales eros tincidunt eget
            <br> In hac habitasse platea dictumst. Nulla commodo elementum elit, et ultrices magna venenatis nec</p>
    </div>
    <div class="uk-grid-width-small-1-2 uk-grid-width-medium-1-4" data-uk-grid="{gutter: 20}">
<?$i=0; foreach($categs as $c):?>
        <?if($c['id_category_parent'] == 1 && $c['id_category'] != 1): $icon_class = (!empty($c['has_icon_class'])) ? $c['has_icon_class'] : 'uk-icon-home';?>
        <div class="uk-panel uk-accordion"  data-uk-accordion="{animate: false}">
            <h3 class="uk-padding-remove uk-position-relative category-acc">
                <a title="<?= HTML::chars($c['name']) ?>" rel="<?= HTML::chars($c['name']) ?>" href="<?= Route::url('list', array('category' => $c['seoname'], 'location' => $user_location ? $user_location->seoname : NULL)) ?>" class="uk-panel-title uk-display-block">
                    <i class="<?=$icon_class?> uk-margin-small-right"></i><?= $c['name']; ?>
                </a>
                <a href="javascript:void(0);" class="uk-accordion-title uk-active uk-position-absolute uk-position-top-right"  data-uk-toggle="{target:'.cat-plus-<?=$i?>'}">
                    <i class="uk-icon-plus uk-text-small cat-plus-<?=$i?>"></i>
                    <i class="uk-icon-minus uk-text-small cat-plus-<?=$i?> uk-hidden"></i>
                </a>
            </h3>
            <div class="uk-panel-box uk-accordion-content">
                <ul class="uk-list uk-list-space">
                    <?foreach($categs as $chi):?>
                        <?if($chi['id_category_parent'] == $c['id_category']):?>
                        <li>
                            <a title="<?= HTML::chars($chi['name']) ?>" rel="<?= HTML::chars($chi['name']) ?>" href="<?= Route::url('list', array('category' => $chi['seoname'], 'location' => $user_location ? $user_location->seoname : NULL)) ?>"><?= $chi['name']; ?>
                            </a>
                        </li>
                        <?endif?>
                        <?endforeach?>
                </ul>
            </div>
        </div>
        <? $i++;?>
        <?endif?>
        <?endforeach?>
    </div>
</div>

<?if(core::config('general.auto_locate') AND ! Cookie::get('user_location')):?>
<input type="hidden" name="auto_locate" value="<?= core::config('general.auto_locate') ?>">
<?if(count($auto_locats) > 0):?>
<div class="modal fade" id="auto-locations" tabindex="-1" role="dialog" aria-labelledby="autoLocations" aria-hidden="true">
    <div class="modal-dialog	modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 id="autoLocations" class="modal-title text-center"><?= __('Please choose your closest location') ?></h4>
            </div>
            <div class="modal-body">
                <div class="list-group">
                    <?foreach($auto_locats as $loc):?>
                    <a href="<?= Route::url('default') ?>" class="list-group-item" data-id="<?= $loc->id_location ?>"><span class="pull-right"><span class="glyphicon glyphicon-chevron-right"></span></span> <?= $loc->name ?> (<?= i18n::format_measurement($loc->distance) ?>)</a>
                    <?endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>
<?endif?>
<?endif?>