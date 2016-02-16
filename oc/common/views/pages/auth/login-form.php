<?php defined('SYSPATH') or die('No direct script access.'); ?>
<form class="uk-form uk-form-stacked auth" method="post" action="<?= Route::url('oc-panel', array('directory' => 'user', 'controller' => 'auth', 'action' => 'login')) ?>">
    <?= Form::errors() ?>
    <div class="uk-form-row">
        <label class="uk-form-label" for="username"><?= __('Email') ?></label>
        <input class="uk-width-1-1 uk-form-large" type="text" name="email" placeholder="<?= __('Email') ?>">
    </div>
    <div class="uk-form-row">
        <label class="uk-form-label" for="password"><?= __('Password') ?></label>
        <input class="uk-form-large uk-width-1-1" type="password" name="password" placeholder="<?= __('Password') ?>">
    </div>
    <div class="uk-form-row">
        <div class="uk-float-left">
            <label for="remember" class="uk-text-small">
            <input type="checkbox" name="remember" id="remember" checked="checked">&nbsp;<?= __('Remember me') ?>
            </label>
        </div>
        <div class="uk-float-right">
            <a href="#forgot_password_form" class="uk-text-small" data-uk-modal="{target:'<?= Route::url('oc-panel', array('directory' => 'user', 'controller' => 'auth', 'action' => 'forgot')) ?>#forgot_password_form'}"><?= __('Forgot password?') ?></a>
        </div>
    </div>

    <div class="uk-modal-footer uk-text-center">
        <div class="uk-form-row">
            <div class="uk-float-left uk-margin-small-bottom">
                Don't have an account?
                <a href="#signup_form" data-uk-modal="{target:'#signup_form'}"><?= __('Sign up now') ?></a>
            </div>
            <button class="uk-width-medium-3-10 uk-width-small-1-1 uk-button uk-button-large uk-button-primary uk-float-right" type="submit">
                <?= __('Sign in') ?>
            </button>
        </div>
    </div>
    <?= Form::redirect() ?>
    <?= Form::CSRF('login') ?>
    <?= View::factory('pages/auth/social') ?>
</form>