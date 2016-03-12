<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?if (!Auth::instance()->logged_in()):?>
<a class="uk-button uk-button-large uk-margin-small-right" href="#signin_form" data-uk-modal><span ><?= __('Sign in') ?></span></a>
<?endif?>
<a class="uk-button uk-button-large uk-button-success" href="<?=Route::url('post_new')?>"><?= __('Post an Ad') ?></a>
<?if (Auth::instance()->logged_in()):?>
<ul class="uk-navbar-nav uk-margin-left uk-float-right">
    <li class="uk-parent" data-uk-dropdown="{mode:'click', pos:'bottom-right'}">
        <a class="uk-height-1-1 uk-vertical-align  uk-text-contrast"> <span class="uk-vertical-align-middle">
                <img src="<?= Auth::instance()->get_user()->get_profile_image() ?>" alt="..." class="uk-border-circle uk-thumbnail-xx-mini uk-margin-right"><span class="uk-hidden-small"><?=  ucwords(Auth::instance()->get_user()->name)?></span>
                <i class="uk-icon uk-icon-caret-down uk-margin-small-top uk-text-small" aria-hidden="false"></i>
            </span>
        </a>
        <!-- This is the dropdown -->
        <div class="uk-dropdown uk-dropdown-navbar <?= (Auth::instance()->logged_in()) ? "uk-contrast" : "" ?>">
            <ul class="uk-nav uk-nav-navbar">
                <li><a href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'index')) ?>"><?= __('My Ads') ?></a></li>
                <li><a href="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'favorites')) ?>"><?= __('My Favourties') ?></a></li>
                <li><a href="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'orders')) ?>"><?= __('My Payments') ?></a></li>
                <li><a href="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'index')) ?>"><?= __('My Messages') ?></a></li>
                <li><a href="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'subscriptions')) ?>"><?= __('My Subscriptions') ?></a></li>
                <li><a href="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'edit')) ?>"><?= __('Settings') ?></a></li>
                <li><a href="<?= Route::url('oc-panel', array('directory' => 'user', 'controller' => 'auth', 'action' => 'logout')) ?>"><?= __('Logout') ?></a></li>
            </ul>
        </div>
    </li>
</ul>
<?endif?>