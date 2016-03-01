<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-panel uk-panel-box uk-panel-box-secondary settings-sidebar">
    <h3 class="uk-panel-title">
        <img src="<?= Auth::instance()->get_user()->get_profile_image() ?>" alt="<?=  ucwords(Auth::instance()->get_user()->name)?>" class="uk-border-circle profile-thumb uk-margin-right"><span><?=  ucwords(Auth::instance()->get_user()->name)?></span>
    </h3>
    <ul class="uk-nav uk-nav-side">
        <li><a href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'index')) ?>"><i class="uk-icon-tags uk-margin-small-right"></i><?= __('My Ads') ?></a></li>
                <li><a href="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'favorites')) ?>"><i class="uk-icon-heart uk-margin-small-right"></i><?= __('Wishlists') ?></a></li>
                <li><a href="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'edit')) ?>"><i class="uk-icon-cog uk-margin-small-right"></i><?= __('Settings') ?></a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="<?= Route::url('oc-panel', array('directory' => 'user', 'controller' => 'auth', 'action' => 'logout')) ?>"><i class="uk-icon-sign-out uk-margin-small-right"></i><?= __('Logout') ?></a></li>
    </ul>
</div>