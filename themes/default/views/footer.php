<?php defined('SYSPATH') or die('No direct script access.'); ?>
<!-- Footer -->
<footer>
    <div id="footer" class="uk-container uk-container-center uk-text-center">
        <div class="uk-wid">
            <ul class="uk-list uk-float-left">
                <li><a href="<?=Route::url('page',array('seotitle'=>'about-us'))?>" title="<?=__('About Us')?>"><?=__('About Us')?></a></li> |
                <li><a href="<?= Route::url('page', array('seotitle' => 'faq')) ?>" title="<?= __('FAQ') ?>"><?= __('FAQ') ?></a></li> |
                <li><a href="<?= Route::url('page', array('seotitle' => 'help')) ?>" title="<?= __('Help') ?>"><?= __('Help') ?></a></li> |
                <li><a href="<?=Route::url('page',array('seotitle'=>'privacy-policy'))?>" title="<?=__('Privacy Policy')?>"><?=__('Privacy Policy')?></a></li> |
                <li><a href="<?=Route::url('page',array('seotitle'=>'terms-of-service'))?>" title="<?=__('Terms of Use')?>"><?=__('Terms of Use')?></a></li> |
                <?=Theme::nav_link('Contact Us','contact', '', 'index', 'contact')?>
            </ul>
        </div>
        <ul class="uk-list uk-float-right">
            <li><a href="" class="uk-icon-button uk-icon-facebook"></a></li>
            <li><a href="" class="uk-icon-button uk-icon-twitter"></a></li>
            <li><a href="" class="uk-icon-button uk-icon-linkedin"></a></li>
            <li><a href="" class="uk-icon-button uk-icon-google-plus"></a></li>
            <li><a href="" class="uk-icon-button uk-icon-instagram"></a></li>
            <li><a href="" class="uk-icon-button uk-icon-pinterest"></a></li>
            <li><a href="" class="uk-icon-button uk-icon-youtube-play"></a></li>
        </ul>
        <? foreach ( Widgets::render('footer') as $widget): ?>
        <?= $widget ?>
        <?endforeach?>
    </div>
</footer>