<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-3-10 uk-visible-large">
            <?=View::factory('sidebar_user_prof')?>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <h3 class="uk-text-bold"><?= __('My Advertisements') ?></h3>
            <hr>
            <table class="uk-table responsive">
                <thead>
                    <tr>
                        <th width="25%"><?= __('Name') ?></th>
                        <th><?= __('Category') ?></th>
                        <th><?= __('Posted on') ?></th>
                        <th><?= __('Price') ?></th>
                        <th style="text-align: center"><?= __('Plans') ?></th>
                        <th style="text-align: right"><?= __('Action') ?></th>
                        <th style="text-align: center"><?= __('Status') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <? $i = 0; foreach($ads as $ad):?>
                    <tr>
                        <? foreach($category as $cat){ if ($cat->id_category == $ad->id_category) $cat_name = $cat->seoname; }?>
                        <td><a href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $cat_name, 'seotitle' => $ad->seotitle)) ?>"><?= $ad->title; ?></a>
                        </td>
                        <td>
                            <? foreach($category as $cat):?>
                                <? if ($cat->id_category == $ad->id_category): ?>
                                    <?= $cat->name ?>
                                <?endif?>
                            <?endforeach?>
                        </td>
                        <td><?= Date::format($ad->published, core::config('general.date_format')) ?></td>
                        <td><?= i18n::money_format($ad->price) ?></td>
                        <td align="center">
                            <?=$ad->get_plan_tags()?>
                        </td>
                        <td align="right">
                            <a class="uk-margin-small-left uk-button uk-button-mini uk-button-primary  uk-hidden"
                               href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'stats', 'id' => $ad->id_ad)) ?>"
                               rel="tooltip" title="<?= __('Stats') ?>">
                                <i class="uk-icon-bar-chart"></i>
                             </a>
                            <a class="uk-margin-small-left uk-button uk-button-mini uk-button-primary"
                               href="<?= Route::url('default', array('controller' => 'ad', 'action' => 'add_plan', 'id' => $ad->id_ad)) ?>"
                               rel="tooltip" title="<?= __('Plans') ?>">
                                <i class="uk-icon-puzzle-piece"></i>
                             </a>
                            <a class="uk-margin-small-left uk-button uk-button-mini uk-button-primary"
                               href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"
                               rel="tooltip" title="<?= __('Update') ?>">
                                <i class="uk-icon-pencil"></i>
                            </a>
                            <?if($ad->status != Model_Ad::STATUS_UNAVAILABLE):?>
                            <a
                                href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'deactivate', 'id' => $ad->id_ad)) ?>"
                                class="uk-margin-small-left uk-button uk-button-mini uk-button-danger"
                                title="<?= __('Deactivate?') ?>"
                                data-toggle="confirmation"
                                data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                                data-btnCancelLabel="<?= __('No way!') ?>">
                                <i class="uk-icon-trash"></i>
                            </a>
                            <?endif?>
                            <?if( core::config('payment.to_top') ):?>
                            <a
                                href="<?= Route::url('default', array('controller' => 'ad', 'action' => 'to_top', 'id' => $ad->id_ad)) ?>"
                                class="uk-margin-small-left uk-button uk-button-mini uk-button-info"
                                title="<?= __('Refresh listing, go to top?') ?>"
                                data-toggle="confirmation"
                                data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                                data-btnCancelLabel="<?= __('No way!') ?>">
                                <i class="uk-icon uk-icon-circle-arrow-up"></i>
                            </a>
                            <?endif?>
                        </td>
                        <td align="center">
                            <?if($ad->status == Model_Ad::STATUS_NOPUBLISHED):?>
                            <i class="uk-icon-close uk-text-danger"></i>
                            <? elseif($ad->status == Model_Ad::STATUS_PUBLISHED):?>
                            <i class="uk-icon-check uk-text-success"></i>
                            <? elseif($ad->status == Model_Ad::STATUS_SPAM):?>
                            <?= __('Spam') ?>
                            <? elseif($ad->status == Model_Ad::STATUS_UNAVAILABLE):?>
                            <a
                                href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'activate', 'id' => $ad->id_ad)) ?>"
                                title="<?= __('Activate?') ?>"
                                data-toggle="confirmation"
                                data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                                data-btnCancelLabel="<?= __('No way!') ?>">
                                <i class="uk-icon-ban uk-text-danger"></i>
                            </a>
                            <?endif?>
                            <?if( ($order = $ad->get_order())!==FALSE ):?>
                            <?if ($order->status==Model_Order::STATUS_CREATED AND $ad->status != Model_Ad::STATUS_PUBLISHED):?>
                            <a class="uk-button uk-button-warning" href="<?= Route::url('default', array('controller' => 'ad', 'action' => 'checkout', 'id' => $order->id_order)) ?>">
                                <i class="uk-icon-shopping-cart"></i> <?= __('Pay') ?>Â Â <?= i18n::format_currency($order->amount, $order->currency) ?>Â 
                            </a>
                            <?elseif ($order->status==Model_Order::STATUS_PAID):?>
                            (<?= __('Paid') ?>)
                            <?endif?>
                            <?endif?>
                        </td>
                    </tr>
                    <?endforeach?>
                </tbody>
            </table>
            <div class="text-center"><?= $pagination ?></div>
        </div>
    </div>
</div>
