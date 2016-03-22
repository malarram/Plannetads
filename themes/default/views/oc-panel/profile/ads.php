<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-3-10 uk-visible-large">
            <?= View::factory('sidebar_user_prof') ?>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <h3 class="uk-text-bold"><?= __('My Ads') ?></h3>
            <hr>
            <table class="uk-table responsive uk-table-striped">
                <thead>
                    <tr>
                        <th width="50%"><?= __('Title') ?></th>
                        <th><?= __('Posted on') ?></th>
                        <th><?= __('Category') ?></th>
                        <th><?= __('Status') ?></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <? $i = 0; foreach($ads as $ad):?>
                    <tr>
                        <? foreach($category as $cat){ if ($cat->id_category == $ad->id_category) $cat_name = $cat->seoname; }?>
                        <td><a href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $cat_name, 'seotitle' => $ad->seotitle)) ?>"><?= ucfirst($ad->title); ?></a>
                            <? $active_plans = $ad->get_plan_tags(); if($active_plans): ?>
                            <div class="uk-panel uk-panel-box uk-panel-box-primary uk-margin-small-top">
                                <h6 class="uk-text-bold uk-margin-small-bottom">Active Plans:</h6>
                                <ul class="uk-list uk-margin-remove">
                                    <? foreach($active_plans as $plan): ?>
                                    <li><?=$plan?></li>
                                    <? endforeach ?>
                                </ul>
                            </div>
                            <? endif; ?>
                        </td>
                        <td><?= Date::format($ad->published, core::config('general.date_format')) ?></td>
                        <td>
                            <? foreach($category as $cat):?>
                            <? if ($cat->id_category == $ad->id_category): ?>
                            <?= $cat->name ?>
                            <?endif?>
                            <?endforeach?>
                        </td>
                        <td align="center">
                            <?if($ad->status == Model_Ad::STATUS_NOPUBLISHED || $ad->status == Model_Ad::STATUS_UNAVAILABLE):?>
                            <div class="uk-badge uk-badge-danger"><?= __('Deactive') ?></div>
                            <? elseif($ad->status == Model_Ad::STATUS_PUBLISHED):?>
                            <div class="uk-badge uk-badge-success"><?= __('Active') ?></div>
                            <? elseif($ad->status == Model_Ad::STATUS_SPAM):?>
                            <div class="uk-badge uk-badge-danger"><?= __('Spam') ?></div>
                            <? elseif($ad->status == Model_Ad::STATUS_UNCONFIRMED):?>
                            <div class="uk-badge uk-badge-danger"><?= __('Unconfirmed') ?></div>
                            <?endif?>
                        </td>
                        <td>
                            <div class="uk-button-dropdown actions-dropdown"  data-uk-dropdown="{mode:'click'}">
                                <!-- This is the button toggling the dropdown -->
                                <button class="uk-button uk-button-mini uk-float-right"><i class="uk-icon-caret-down"></i></button>
                                <!-- This is the dropdown -->
                                <div class="uk-dropdown uk-dropdown-small">
                                    <ul class="uk-nav uk-nav-dropdown">
                                        <li><a href="<?= Route::url('default', array('controller' => 'ad', 'action' => 'add_plan', 'id' => $ad->id_ad)) ?>"><i class="uk-icon-plus-circle uk-margin-small-right"></i>Add plans</a></li>
                                        <li><a href="<?=Route::url('oc-panel', array('controller'=>'myads','action'=>'update','id'=>$ad->id_ad))?>"><i class="uk-icon-pencil uk-margin-small-right"></i>Edit</a></li>
                                        <? if( $ad->status == Model_Ad::STATUS_UNAVAILABLE
                                        AND !in_array(core::config('general.moderation'), Model_Ad::$moderation_status)
                                        ):?>
                                        <?if ( ($order = $ad->get_order()) === FALSE OR ($order !== FALSE AND $order->status == Model_Order::STATUS_PAID) ):?>
                                        <li>
                                            <a
                                                href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'activate', 'id' => $ad->id_ad)) ?>"
                                                class="btn btn-success"
                                                title="<?= __('Activate?') ?>"
                                                data-toggle="confirmation"
                                                data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                                                data-btnCancelLabel="<?= __('No way!') ?>">
                                                <i class="uk-icon-check uk-margin-small-right"> <?= __('Activate') ?></i>
                                            </a>
                                        </li>
                                        <?endif?>
                                        <?elseif($ad->status != Model_Ad::STATUS_UNAVAILABLE):?>
                                        <li>
                                            <a
                                                href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'deactivate', 'id' => $ad->id_ad)) ?>"
                                                class="btn btn-warning"
                                                title="<?= __('Deactivate?') ?>"
                                                data-toggle="confirmation"
                                                data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                                                data-btnCancelLabel="<?= __('No way!') ?>">
                                                <i class="uk-icon-ban uk-margin-small-right"> <?= __('Deactivate') ?></i>
                                            </a>
                                        </li>
                                        <?endif?>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?endforeach?>
                </tbody>
            </table>
            <div class="text-center"><?= $pagination ?></div>
        </div>
    </div>
</div>
