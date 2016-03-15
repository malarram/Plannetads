<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-3-10 uk-visible-large">
            <?= View::factory('sidebar_user_prof') ?>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <h3 class="uk-text-bold"><?= __('My Orders') ?></h3>
            <hr>
            <table class="uk-table responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><?= __('Status') ?></th>
                        <th><?= __('Product') ?></th>
                        <th><?= __('Amount') ?></th>
                        <th><?= __('Ad') ?></th>
                        <th><?= __('Date') ?></th>
                        <th><?= __('Date Paid') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach($orders as $k => $order):?>
                    <tr id="tr<?= $order->pk() ?>">

                        <td><?= ++$k ?></td>

                        <td>
                            <?if ($order->status == Model_Order::STATUS_CREATED):?>
                            <a class="uk-button uk-button-warning" href="<?= Route::url('default', array('controller' => 'ad', 'action' => 'checkout', 'id' => $order->order_no)) ?>">
                                <i class="uk-icon-shopping-cart"></i> <?= __('Pay') ?>   
                            </a>
                            <?else:?>
                            <?= Model_Order::$statuses[$order->status] ?>
                            <?endif?>
                        </td>

                        <td><?= str_replace(",","<br />",$order->order_description) ?></td>

                        <td><?= i18n::format_currency($order->total_amount, $order->currency) ?></td>

                        <td><a href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $order->ad->pk())) ?>" title="<?= HTML::chars($order->ad->title) ?>">
                                <?= Text::limit_chars($order->ad->title, 30, NULL, TRUE) ?></a></td>

                        <td><?= $order->created ?></td>

                        <td><?= $order->pay_date ?></td>

                    </tr>
                    <?endforeach?>
                </tbody>
            </table>
            <div class="text-center"><?= $pagination ?></div>
        </div>
    </div>
</div>
