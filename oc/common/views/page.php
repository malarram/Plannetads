<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-2-10 uk-width-medium-3-10 uk-width-small-3-10 ">
            <div class="uk-panel uk-panel-box  uk-panel-box-secondary uk-margin-bottom">
                <h3 class="uk-h5 uk-text-bold">Plannetads Links</h3>
                <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
                    <li class="uk-nav-divider"></li>
                    <li <? if($page->seotitle == 'about-us') echo 'class="uk-active"'; ?>><a href="<?= Route::url('page', array('seotitle' => 'about-us')) ?>" title="<?= __('About Us') ?>"><?= __('About Us') ?></a></li>
                    <li <? if($page->seotitle == 'faq') echo 'class="uk-active"'; ?>><a href="<?= Route::url('page', array('seotitle' => 'faq')) ?>" title="<?= __('FAQ') ?>"><?= __('FAQ') ?></a></li>
                    <li <? if($page->seotitle == 'privacy-policy') echo 'class="uk-active"'; ?>><a href="<?= Route::url('page', array('seotitle' => 'privacy-policy')) ?>" title="<?= __('Privacy Policy') ?>"><?= __('Privacy Policy') ?></a></li>
                    <li <? if($page->seotitle == 'terms-of-service') echo 'class="uk-active"'; ?>><a href="<?= Route::url('page', array('seotitle' => 'terms-of-service')) ?>" title="<?= __('Terms of Service') ?>"><?= __('Terms of Service') ?></a></li>
                    <li <? if($page->seotitle == 'help') echo 'class="uk-active"'; ?>><a href="<?= Route::url('page', array('seotitle' => 'help')) ?>" title="<?= __('Help') ?>"><?= __('Help') ?></a></li>
                    <?= Theme::nav_link('Contact', 'contact', '', 'index', 'contact') ?>
                </ul>
            </div>
        </div>
        <div class="uk-width-large-8-10 uk-width-medium-7-10 uk-width-small-7-10">
            <h3 class="uk-text-bold"><?= $page->title ?></h3>
            <hr>
            <?= Text::bb2html($page->description, TRUE, FALSE) ?>
        </div>
    </div>
</div>
