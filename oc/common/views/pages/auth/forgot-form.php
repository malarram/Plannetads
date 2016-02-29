<?php defined('SYSPATH') or die('No direct script access.'); ?>
<form class="uk-form uk-form-stacked"  method="post" action="<?= Route::url('oc-panel', array('directory' => 'user', 'controller' => 'auth', 'action' => 'forgot')) ?>">
    <?= Form::errors() ?>
    <div class="uk-form-row">
        <label class="uk-form-label"><?= __('Enter your email address to reset your password') ?></label>
        <input class="uk-width-1-1 uk-form-large" type="text" name="email" placeholder="<?= __('Email') ?>" placeholder="Enter your email">
    </div>
    <div class="uk-form-row">
        <a href="#signin_form" class="uk-align-left uk-margin-small-top" data-uk-modal="{target:'#signin_form'}"><?= __('Back to login') ?></a>
        <button type="submit" class="uk-align-right uk-button uk-button-large uk-button-primary "><?= __('Reset my password') ?></button>
    </div>
    <div class="uk-modal-footer uk-text-center">Don't have an account? <a href="#signup_form" data-uk-modal="{target:'#signup_form'}">Sign up now</a></div>
    <?= Form::CSRF('forgot') ?>
</form>