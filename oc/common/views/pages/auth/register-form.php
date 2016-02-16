<?php defined('SYSPATH') or die('No direct script access.'); ?>

<form class="uk-form uk-form-stacked" method="post" action="<?= Route::url('oc-panel', array('directory' => 'user', 'controller' => 'auth', 'action' => 'register')) ?>">
    <?= Form::errors() ?>
    <div class="uk-grid uk-form-row">
        <div class="uk-width-1-1">
            <label class="uk-form-label " for="name"><?= __('Name') ?></label>
            <input class="uk-width-1-1 uk-form-large" type="text" name="name" value="<?= Request::current()->post('name') ?>" placeholder="<?= __('Full Name') ?>">
        </div>
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="email"><?= __('Email') ?></label>
        <input
            class="uk-width-1-1 uk-form-large"
            type="email"
            name="email"
            value="<?= Request::current()->post('email') ?>"
            placeholder="<?= __('Email Address') ?>"
            data-domain='<?= (core::config('general.email_domains') != '') ? json_encode(explode(',', core::config('general.email_domains'))) : '' ?>'
            data-error="<?= __('Email must contain a valid email domain') ?>"
            >
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="password"><?= __('New password') ?></label>
        <input class="uk-width-1-1 uk-form-large" type="password" name="password1" placeholder="<?= __('Password') ?>">
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="password"><?= __('Repeat password') ?></label>
        <input class="uk-width-1-1 uk-form-large" type="password" name="password2" placeholder="<?= __('Repeat password') ?>">
    </div>

    <div class="uk-form-row">
        <button type="submit" class="uk-width-1-1 uk-button uk-button-large uk-button-primary"><?= __('Sign up') ?></button>
    </div>
    <?= Form::redirect() ?>
    <?= Form::CSRF('register') ?>
    <?= View::factory('pages/auth/social') ?>
</form>
<div class="uk-modal-footer uk-text-center">Already have account? <a href="#signin_form" data-uk-modal="{target:'#signin_form'}">Sign in</a></div>