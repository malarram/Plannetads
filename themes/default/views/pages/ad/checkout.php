<?php defined('SYSPATH') or die('No direct script access.');?>
<?if (core::config('payment.fraudlabspro')!=''): ?>
<script type="text/javascript">
document.write(unescape("%3Cscript src='" + ('https:' == document.location.protocol ? 'https://' : 'http://') + "static.fraudlabspro.com/agent.js' type='text/javascript'%3E%3C/script%3E"));
</script>

<script type="text/javascript">
try{
    var flp = new FraudLabsPro;
    flp.start({session_id: '<?php echo session_id(); ?>'});
}
catch(e){}
</script>
<?endif?>
<div class="uk-container uk-container-center new-ad-form">
    <div class="uk-grid">
        <div class="uk-width-medium-8-10 uk-width-small-1-1 uk-container-center">
<div class="uk-panel uk-width-1-1">
    <div class="row">
        <div class="uk-width-1-2">
            <address>
                <strong><?=Core::config('general.site_name')?></strong>
                <br>
                <?=Core::config('general.base_url')?>
            </address>
        </div>
        <div class="uk-width-1-2 uk-text-right">
            <p>
                <em><?=__('Date')?>: <?= Date::format($orders[0]->created, core::config('general.date_format'))?></em>
                <br>
                <em><?=__('Checkout')?> :# <?=$orders[0]->id_order?></em>
                <br>
                <em><?=__('Product')?> :<?=$orders[0]->ad->title?></em>

            </p>
        </div>
    </div>
    <div class="row">
        <div class="uk-text-center">
            <h1><?=__('Checkout')?></h1>
        </div>
        <table class="uk-table uk-table-hover">
            <thead>
                <tr>
                    <th class="uk-text-center">#</th>
                    <th><?=__('Product')?></th>
                    <th class="uk-text-center"><?=__('Price')?></th>
                </tr>
            </thead>
            <tbody>
                <? $total_amt = 0; foreach($orders as $order):?>
                    <tr>
                        <td class="col-md-1" style="text-align: center"><?=$order->id_product?></td>
                            <td class="col-md-9">
                                <?=$order->description?>
                                <em>(<?=Model_Order::product_desc($order->id_product)?>
                                    <?if ($order->id_product == Model_Order::PRODUCT_TO_FEATURED):?>
                                        <?=$order->featured_days?> <?=__('Days')?>
                                    <?endif?>
                                    )
                                </em>
                            </td>
                        <td class="col-md-2 text-center"><?=i18n::format_currency(($order->coupon->loaded())?$order->original_price():$order->amount, $order->currency)?></td>
                    </tr>
                    <?if (Theme::get('premium')==1 AND $order->coupon->loaded()):?>
                        <?$discount = ($order->coupon->discount_amount==0)?($order->original_price() * $order->coupon->discount_percentage/100):$order->coupon->discount_amount;?>
                        <tr>
                            <td class="col-md-1" style="text-align: center">
                                <?=$order->id_coupon?>
                            </td>
                            <td class="col-md-9">
                                <?=__('Coupon')?> '<?=$order->coupon->name?>'
                                <?=__('valid until')?> <?=Date::format($order->coupon->valid_date)?>.
                            </td>
                            <td class="col-md-2 text-center text-danger">
                                -<?=i18n::format_currency($discount, $order->currency)?>
                            </td>
                        </tr>
                    <?endif?>
                <? $total_amt += $order->amount; endforeach;?>
            </tbody>
            <tfoot>
                <tr>
                    <td>&nbsp;</td>
                    <td class="text-right"><h4><strong><?=__('Total')?>: </strong></h4></td>
                    <td class="text-center text-danger"><h4><strong><?=i18n::format_currency($total_amt, $orders[0]->currency)?></strong></h4></td>
                </tr>
            </tfoot>
        </table>

        <?if ($total_amt>0):?>

        <?if (Core::config('payment.paypal_account')!=''):?>
            <p class="text-right">
                <a class="btn btn-success btn-lg" href="<?=Route::url('default', array('controller'=> 'paypal','action'=>'pay' , 'id' => $orders[0]->order_no))?>">
                    <?=__('Pay with Paypal')?> <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </p>
        <?endif?>

        <?if ($order->id_product!=Model_Order::PRODUCT_AD_SELL):?>
            <?if ( ($user = Auth::instance()->get_user())!=FALSE AND ($user->id_role == Model_Role::ROLE_ADMIN OR $user->id_role == Model_Role::ROLE_MODERATOR)):?>
                <ul class="list-inline text-right">
                    <li>
                        <a title="<?=__('Mark as paid')?>" class="btn btn-warning" href="<?=Route::url('oc-panel', array('controller'=> 'order', 'action'=>'pay','id'=>$orders[0]->order_no))?>">
                            <i class="glyphicon glyphicon-usd"></i> <?=__('Mark as paid')?>
                        </a>
                    </li>
                </ul>
            <?endif?>
            <?if (Theme::get('premium')==1) :?>
                <?=Controller_Authorize::form($order)?>
                <div class="text-right">
                    <ul class="list-inline">
                        <?if(($pm = Paymill::button($order)) != ''):?>
                            <li class="text-right"><?=$pm?></li>
                        <?endif?>
                    </ul>
                </div>
                <div class="text-right">
                    <ul class="list-inline">
                        <?if(($sk = StripeKO::button($order)) != ''):?>
                            <li class="text-right"><?=$sk?></li>
                        <?endif?>
                        <?if(($bp = Bitpay::button($order)) != ''):?>
                            <li class="text-right"><?=$bp?></li>
                        <?endif?>
                        <?if(($two = twocheckout::form($order)) != ''):?>
                            <li class="text-right"><?=$two?></li>
                        <?endif?>
                        <?if(($paysbuy = paysbuy::form($order)) != ''):?>
                            <li class="text-right"><?=$paysbuy?></li>
                        <?endif?>
                        <?if( ($alt = $order->alternative_pay_button()) != ''):?>
                            <li class="text-right"><?=$alt?></li>
                        <?endif?>
                    </ul>
                    <?=View::factory('coupon')?>
                </div>
            <?elseif ( ($alt = $order->alternative_pay_button()) != '') :?>
                <div class="text-right">
                    <ul class="list-inline">
                        <li class="text-right"><?=$alt?></li>
                    </ul>
                </div>
            <?endif?>
        <?endif?>

        <?else:?>
            <ul class="list-inline text-right">
                <li>
                    <a title="<?=__('Click to proceed')?>" class="btn btn-success" href="<?=Route::url('default', array('controller'=> 'ad', 'action'=>'checkoutfree','id'=>$orders[0]->order_no))?>">
                        <?=__('Click to proceed')?>
                    </a>
                </li>
                <?=View::factory('coupon')?>
            </ul>
        <?endif?>

    </div>
</div>
        </div>
    </div>
</div>

