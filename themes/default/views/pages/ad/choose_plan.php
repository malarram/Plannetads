<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?= Breadcrumbs::render('breadcrumbs') ?>

<div class="uk-container uk-container-center new-ad-form">
    <div class="uk-grid">
        <div class="uk-width-medium-7-10 uk-width-small-1-1 uk-container-center">
            <div class="uk-accordion" data-uk-accordion>
                <div class="uk-position-relative">
                    <h3 class="uk-accordion-title"><span class="steps active">Choose Plan</span><?=$ad->title?></h3>
                </div>

                <div class="uk-accordion-content">
                    <?= FORM::open(Route::url('default', array('controller' => 'ad', 'action' => 'add_plan', 'id' => $ad->id_ad)), array('class' => 'uk-form uk-form-stacked', 'enctype' => 'multipart/form-data')) ?>
                        <div class="uk-grid">
                            <div class="uk-width1-1-1">
                                <table class="uk-table uk-table-condensed" id="choose_plans">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Plan name</th>
                                            <th>Duration</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? foreach($promotions as $k => $promotion): ?>
                                        <tr class="uk-disabled">
                                            <td><input type="checkbox" name="plan_enable_disable" id="plan_check_<?=$k?>" /></td>
                                            <td><label for="plan_check_<?=$k?>"><?=$promotion?></label></td>
                                            <td>
                                                <?php
                                                    $plans = json_decode(Core::config("payment.{$k}_plans"),TRUE);
                                                    if($plans):
                                                ?>
                                                <select name="plan[<?=$k?>]" class="chosen-select-no-search plan_list" disabled>
                                                    <?foreach($plans as $days => $amt):?>
                                                    <option value="<?=$days?>" data-price="<?=$amt?>"><?="$days Days"?></option>
                                                    <?endforeach?>
                                                </select>
                                                <? endif ?>
                                            </td>
                                            <td><span class="plan_price">0.00</span></td>
                                        </tr>
                                        <? endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>Subtotal</td>
                                            <td><span class="total_price">0.00</span></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="uk-grid uk-float-right">
                            <div class="uk-form-controls">
                                <button type="submit" class="uk-button uk-button-primary uk-button-large"><?=__('Proceed to checkout')?></button>
                            </div>
                        </div>
                    <?= FORM::close() ?>
                </div>
            </div>
        </div>
    </div>
</div>