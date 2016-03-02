<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-5-10 uk-width-medium-1-1 uk-container-center">
            <?= Alert::show() ?>
            <h3 class="uk-text-bold"><?= __('Change password') ?></h3>
            <div class="uk-panel uk-panel-box uk-panel-box-secondary">
                <form class="uk-form uk-form-horizontal changepass"  method="post" action="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'changepass')) ?>">
                    <?= Form::errors() ?>

                    <div class="uk-form-row">
                        <label class="uk-form-label"><?= __('New password') ?></label>
                        <div class="uk-form-controls">
                            <input class="uk-width-1-1 uk-form-large" type="password" name="password1" id="password1" placeholder="<?= __('Password') ?>">
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label"><?= __('Repeat password') ?></label>
                        <div class="uk-form-controls">
                            <input class="uk-width-1-1 uk-form-large" type="password" name="password2" placeholder="<?= __('Password') ?>">
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label for="save" class="uk-form-label"></label>
                        <div class="uk-form-controls">
                            <button type="submit" class="uk-button uk-button-primary uk-button-large"><?= __('Save') ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>