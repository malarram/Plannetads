<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?if (core::config('payment.fraudlabspro')!=''): ?>
<script type="text/javascript">
    document.write(unescape("%3Cscript src='" + ('https:' == document.location.protocol ? 'https://' : 'http://') + "static.fraudlabspro.com/agent.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
    try {
        var flp = new FraudLabsPro;
        flp.start({session_id: '<?php echo session_id(); ?>'});
    }
    catch (e) {
    }
</script>
<?endif?>
<?= Breadcrumbs::render('breadcrumbs') ?>

<div class="uk-container  uk-container-center new-ad-form">
    <div class="uk-grid">
        <div class="uk-width-7-10 uk-container-center">
            <h3 class="uk-text-bold uk-text-center"><?= __('Checkout') ?></h3>
            <div class="uk-text-muted uk-text-primary uk-text-center"><?= __("Ad title : {$orders[0]->ad->title}") ?></div>
            <form action="" class="uk-form">
                <table class="uk-table">
                    <hr>
                    <thead>
                        <tr>
                            <th><?= __('S.No') ?></th>
                            <th><?= __('Plan name') ?></th>
                            <th><?= __('Duration') ?></th>
                            <th><?= __('Total Price') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <? $total_amt = 0; foreach($orders as $order):?>
                        <tr>
                            <td><?= $order->id_product ?></td>
                            <td><?= $order->description ?></td>
                            <td><?= __("{$order->featured_days} Days") ?></td>
                            <td><?= i18n::format_currency(($order->coupon->loaded()) ? $order->original_price() : $order->amount, $order->currency) ?></td>
                        </tr>
                        <?if (Theme::get('premium')==1 AND $order->coupon->loaded()):?>
                        <?$discount = ($order->coupon->discount_amount==0)?($order->original_price() * $order->coupon->discount_percentage/100):$order->coupon->discount_amount;?>
                        <tr>
                            <td class="uk-width-1-10" style="text-align: center">
                                <?= $order->id_coupon ?>
                            </td>
                            <td class="uk-width-7-10">
                                <?= __('Coupon') ?> '<?= $order->coupon->name ?>'
                                <?= __('valid until') ?> <?= Date::format($order->coupon->valid_date) ?>.
                            </td>
                            <td class="uk-width-2-10 uk-text-center uk-text-danger">
                                -<?= i18n::format_currency($discount, $order->currency) ?>
                            </td>
                        </tr>
                        <?endif?>
                        <? $total_amt += $order->amount; endforeach;?>
                        <tr class="summary uk-alert uk-alert-warning">
                            <td></td>
                            <td></td>
                            <td class="uk-text-bold uk-text-large"><?= __('Total') ?></td>
                            <td class="uk-text-bold uk-text-large"><?= i18n::format_currency($total_amt, $orders[0]->currency) ?></td>
                        </tr>
                    </tbody>
                </table>
                <div class="uk-form-controls">
                    <?if ($total_amt>0):?>
                    <?if (Core::config('payment.paypal_account')!=''):?>
                    <a class="uk-button uk-button-primary uk-button-large uk-float-right" href="<?= Route::url('default', array('controller' => 'paypal', 'action' => 'pay', 'id' => $orders[0]->order_no)) ?>">
                        <?= __('Pay now') ?>
                    </a>
                    <?endif?>

                    <?if ($order->id_product!=Model_Order::PRODUCT_AD_SELL):?>
                    <?if ( ($user = Auth::instance()->get_user())!=FALSE AND ($user->id_role == Model_Role::ROLE_ADMIN OR $user->id_role == Model_Role::ROLE_MODERATOR)):?>
                    <a title="<?= __('Mark as paid') ?>" class="uk-button uk-button-large uk-float-right uk-margin-small-right" href="<?= Route::url('oc-panel', array('controller' => 'order', 'action' => 'pay', 'id' => $orders[0]->order_no)) ?>">
                        <i class="uk-icon-usd"></i> <?= __('Mark as paid') ?>
                    </a>
                    <?endif?>
                    <?if (Theme::get('premium')==1) :?>
                    <?= Controller_Authorize::form($order) ?>
                    <div class="uk-text-right">
                        <ul class="uk-list uk-list-inline">
                            <?if(($pm = Paymill::button($order)) != ''):?>
                            <li class="uk-text-right"><?= $pm ?></li>
                            <?endif?>
                        </ul>
                    </div>
                    <div class="uk-text-right">
                        <ul class="uk-list uk-list-inline">
                            <?if(($sk = StripeKO::button($order)) != ''):?>
                            <li class="uk-text-right"><?= $sk ?></li>
                            <?endif?>
                            <?if(($bp = Bitpay::button($order)) != ''):?>
                            <li class="uk-text-right"><?= $bp ?></li>
                            <?endif?>
                            <?if(($two = twocheckout::form($order)) != ''):?>
                            <li class="uk-text-right"><?= $two ?></li>
                            <?endif?>
                            <?if(($paysbuy = paysbuy::form($order)) != ''):?>
                            <li class="uk-text-right"><?= $paysbuy ?></li>
                            <?endif?>
                            <?if( ($alt = $order->alternative_pay_button()) != ''):?>
                            <li class="uk-text-right"><?= $alt ?></li>
                            <?endif?>
                        </ul>
                        <?= View::factory('coupon') ?>
                    </div>
                    <?elseif ( ($alt = $order->alternative_pay_button()) != '') :?>
                    <div class="uk-text-right">
                        <ul class="uk-list uk-list-inline">
                            <li class="uk-text-right"><?= $alt ?></li>
                        </ul>
                    </div>
                    <?endif?>
                    <?endif?>

                    <?else:?>
                    <ul class="uk-list uk-list-inline uk-text-right">
                        <li>
                            <a title="<?= __('Click to proceed') ?>" class="uk-button uk-button-success" href="<?= Route::url('default', array('controller' => 'ad', 'action' => 'checkoutfree', 'id' => $orders[0]->order_no)) ?>">
                                <?= __('Click to proceed') ?>
                            </a>
                        </li>
                        <?= View::factory('coupon') ?>
                    </ul>
                    <?endif?>
                </div>
            </form>
        </div>
    </div>
</div>

