<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-3-10 uk-visible-large">
            <?=View::factory('sidebar_user_prof')?>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <?= Alert::show() ?>
            <h3 class="uk-text-bold"><?=__('My Favorites')?></h3>
            <hr>
            <? if(count($favorites)): ?>
            <table class="uk-table responsive">
                <thead>
                    <tr>
                        <th width="40%"><?=__('Name') ?></th>
                        <th><?= __('Favorited on') ?></th>
                        <th><?= __('Price') ?></th>
                        <th><?= __('Status') ?></th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach($favorites as $favorite):?>
                    <tr id="tr<?=$favorite->id_favorite?>">
                        <td><a target="_blank" href="<?=Route::url('ad', array('controller'=>'ad','category'=>$favorite->ad->category->seoname,'seotitle'=>$favorite->ad->seotitle))?>"><?= $favorite->ad->title; ?></a></td>
                        <td><?= Date::format($favorite->created, core::config('general.date_format'))?></td>
                        <td><?= i18n::money_format($favorite->ad->price) ?></td>
                        <td>
                            <?if($favorite->ad->status == Model_Ad::STATUS_NOPUBLISHED):?>
                            <i class="uk-icon-close uk-text-danger"></i>
                            <? elseif($favorite->ad->status == Model_Ad::STATUS_PUBLISHED):?>
                            <i class="uk-icon-check uk-text-success"></i>
                            <? elseif($favorite->ad->status == Model_Ad::STATUS_SPAM):?>
                            <?= __('Spam') ?>
                            <? elseif($favorite->ad->status == Model_Ad::STATUS_UNAVAILABLE):?>
                            <?= __('Unavailable') ?>
                            <?endif?>
                        </td>
                        <td>
                            <a
                                href="<?=Route::url('oc-panel', array('controller'=>'profile', 'action'=>'favorites','id'=>$favorite->id_ad))?>"
                                class="uk-margin-small-left uk-button uk-button-mini uk-button-danger"
                                data-title="<?=__('Are you sure you want to delete?')?>"
                                data-id="tr<?=$favorite->id_favorite?>"
                                data-btnOkLabel="<?=__('Yes, definitely!')?>"
                                data-btnCancelLabel="<?=__('No way!')?>">
                                <?=__('Remove')?>
                            </a>
                        </td>
                    </tr>
                <?endforeach?>
                </tbody>
            </table>
            <? else: ?>
            <p>No favorites added</p>
            <? endif ?>
        </div>
    </div>
</div>