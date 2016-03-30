<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?= Breadcrumbs::render('breadcrumbs') ?>

<div class="uk-container  uk-container-center new-ad-form">
    <div class="uk-grid">
        <div class="uk-width-7-10 uk-container-center">
            <h3 class="uk-text-bold uk-text-center">Choose Premium Plan <span class="uk-text-muted">(Optional)</span></h3>
            <div class="uk-text-muted uk-text-primary uk-text-center">Ad title : <?= $ad->title ?></div>
            <?= FORM::open(Route::url('default', array('controller' => 'ad', 'action' => 'add_plan', 'id' => $ad->id_ad)), array('class' => 'uk-form', 'enctype' => 'multipart/form-data')) ?>
            <table class="uk-table" id="choose_plans">
                <hr>
                <thead>
                    <tr>
                        <th></th>
                        <th>Plan name</th>
                        <th>Duration</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
//                  Remove unwanted promotion
                    foreach($promotions as $k => $promotion){
                    $plan_plans = json_decode(Core::config("payment.{$k}_plans"), TRUE);
                    $exp_date = @$ad->$k;

                    if(!$plan_plans || $exp_date > Date::unix2mysql(time()))
                    unset($promotions[$k]);
                    }
                    if($promotions):
                    foreach($promotions as $k => $promotion):
                    $plans = json_decode(Core::config("payment.{$k}_plans"), TRUE);
                    ?>
                    <tr>
                        <td><input type="checkbox" name="plan_enable_disable" id="plan_check_<?= $k ?>" /></td>
                        <td>
                            <label for="plan_check_<?= $k ?>"><?= $promotion ?></label>
                            <? if($k == 'linkweb'): ?>
                            <br />
                            <input type="text" class="uk-form uk-form-large uk-margin-small-top website" name="website" disabled>
                            <? endif; ?>
                        </td>
                        <td>
                            <select name="plan[<?= $k ?>]" class="chosen-select-no-search plan_list" disabled>
                                <?foreach($plans as $days => $amt):?>
                                <option value="<?= $days ?>" data-price="<?= $amt ?>"><?= "$days Days" ?></option>
                                <?endforeach?>
                            </select>
                        </td>
                        <td><span class="plan_price">0.00</span></td>
                    </tr>
                    <? endforeach; ?>
                    <tr class="summary uk-alert uk-alert-warning">
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td class="uk-text-bold uk-text-large">Total</td>
                        <td class="uk-text-bold uk-text-large"><span class="total_price">0.00</span></td>
                    </tr>
                    <? else:  ?>
                    <tr class="summary uk-disabled">
                        <td colspan="3"><?= __('No promotion available for this ad') ?></td>
                    </tr>
                    <? endif;?>
                </tbody>
            </table>
            <div class="uk-form-controls">
                <a id="skip-continue" href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'index')) ?>" class="uk-button uk-button-primary uk-button-large uk-float-right"><?= __('Skip & Publish ad') ?></a>
                <button id="proceed-checkout" name="proceed" type="submit" class="uk-button uk-button-primary uk-button-large uk-float-right uk-hidden"><?= __('Proceed to checkout') ?></button>
            </div>
            <?= FORM::close() ?>
        </div>
    </div>
</div>