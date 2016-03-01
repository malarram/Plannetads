<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-3-10 uk-visible-large">
            <?=View::factory('sidebar_user_prof')?>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <?= Alert::show() ?>
            <h3 class="uk-text-bold"><?= __('My Advertisements') ?></h3>
            <hr>
            <table class="uk-table responsive">
                <thead>
                    <tr>
                        <th width="40%"><?= __('Name') ?></th>
                        <th><?= __('Posted on') ?></th>
                        <th><?= __('Price') ?></th>
<!--                        <th><?= __('Category') ?></th>
                        <th><?= __('Location') ?></th>-->
                        <th><?= __('Status') ?></th>
                        <?if( core::config('payment.to_featured')):?>
                        <th><?= __('Featured') ?></th>
                        <?endif?>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <? $i = 0; foreach($ads as $ad):?>
                    <tr>
                        <? foreach($category as $cat){ if ($cat->id_category == $ad->id_category) $cat_name = $cat->seoname; }?>
                        <td><a href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $cat_name, 'seotitle' => $ad->seotitle)) ?>"><?= $ad->title; ?></a>
                        </td>
                        <td><?= Date::format($ad->published, core::config('general.date_format')) ?></td>
                        <td><?= i18n::money_format($ad->price) ?></td>

<!--                        <? foreach($category as $cat):?>
                        <? if ($cat->id_category == $ad->id_category):
                        $cat_name=$cat->name;
                        ?>
                        <td><?= $cat_name ?> </td>
                            <?endif?>
                            <?endforeach?>
                        <?if($cat_name == NULL):?>
                        <td>n/a</td>
                        <?endif?>

                            <?$locat_name = NULL;?>
                            <?foreach($location as $loc):?>
                            <? if ($loc->id_location == $ad->id_location):
                            $locat_name=$loc->name;?>
                        <td><?= $locat_name ?></td>
                        <?endif?>
                        <?endforeach?>
                        <?if($locat_name == NULL):?>
                        <td>n/a</td>
                        <?endif?>-->


                        <?if( core::config('payment.to_featured')):?>
                        <td>
                            <?if($ad->featured == NULL):?>
                            <a class="btn btn-default"
                               href="<?= Route::url('default', array('controller' => 'ad', 'action' => 'to_featured', 'id' => $ad->id_ad)) ?>"
                               onclick="return confirm('<?= __('Make featured?') ?>');"
                               rel="tooltip" title="<?= __('Featured') ?>" data-id="tr1" data-text="<?= __('Are you sure you want to make it featured?') ?>">
                                <i class="glyphicon glyphicon-bookmark "></i> <?= __('Featured') ?>
                            </a>
                            <?else:?>
                            <?= Date::format($ad->featured, core::config('general.date_format')) ?>
                            <?endif?>
                        </td>
                        <?endif?>

                        <td>
<!--                            <a class="uk-margin-small-left uk-button uk-button-mini uk-button-primary"
                               href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'stats', 'id' => $ad->id_ad)) ?>"
                               rel="tooltip" title="<?= __('Stats') ?>">
                                <?= __('Stats') ?>
                            </a>-->
                            <a class="uk-margin-small-left uk-button-mini uk-button-primary uk-button"
                               href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"
                               rel="tooltip" title="<?= __('Update') ?>">
                                <?= __('Edit') ?>
                            </a>
                            <? if( $ad->status == Model_Ad::STATUS_UNAVAILABLE
                            AND !in_array(core::config('general.moderation'), Model_Ad::$moderation_status)
                            ):?>
                            <?if ( ($order = $ad->get_order()) === FALSE OR ($order !== FALSE AND $order->status == Model_Order::STATUS_PAID) ):?>
                            <a
                                href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'activate', 'id' => $ad->id_ad)) ?>"
                                class="uk-margin-small-left uk-button uk-button-mini uk-button-success"
                                title="<?= __('Activate?') ?>"
                                data-toggle="confirmation"
                                data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                                data-btnCancelLabel="<?= __('No way!') ?>">
                                <i class="glyphicon glyphicon-ok"></i>
                            </a>
                            <?endif?>
                            <?elseif($ad->status != Model_Ad::STATUS_UNAVAILABLE):?>
                            <a
                                href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'deactivate', 'id' => $ad->id_ad)) ?>"
                                class="uk-margin-small-left uk-button uk-button-mini uk-button-danger"
                                title="<?= __('Deactivate?') ?>"
                                data-toggle="confirmation"
                                data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                                data-btnCancelLabel="<?= __('No way!') ?>">
                                <?= __('Delete') ?>
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
                                <i class="glyphicon glyphicon-circle-arrow-up"></i>
                            </a>
                            <?endif?>
                        </td>
                        <td>
                            <?if($ad->status == Model_Ad::STATUS_NOPUBLISHED):?>
                            <i class="uk-icon-close uk-text-danger"></i>
                            <? elseif($ad->status == Model_Ad::STATUS_PUBLISHED):?>
                            <i class="uk-icon-check uk-text-success"></i>
                            <? elseif($ad->status == Model_Ad::STATUS_SPAM):?>
                            <?= __('Spam') ?>
                            <? elseif($ad->status == Model_Ad::STATUS_UNAVAILABLE):?>
                            <?= __('Unavailable') ?>
                            <?endif?>

                            <?if( ($order = $ad->get_order())!==FALSE ):?>
                            <?if ($order->status==Model_Order::STATUS_CREATED AND $ad->status != Model_Ad::STATUS_PUBLISHED):?>
                            <a class="btn btn-warning" href="<?= Route::url('default', array('controller' => 'ad', 'action' => 'checkout', 'id' => $order->id_order)) ?>">
                                <i class="glyphicon glyphicon-shopping-cart"></i> <?= __('Pay') ?>Â Â <?= i18n::format_currency($order->amount, $order->currency) ?>Â 
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
