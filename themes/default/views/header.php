<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div id="my-id" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip ">
        <ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
            <div class="uk-nav-divider"></div>
            <li><a href="#signin_form" data-uk-modal><?=__('Sign In')?></a></li>
            <li><a href="<?=Route::url('post_new')?>"><?=__('Post an Ad')?></a></li>
            <li class="uk-nav-divider"></li>
            <li><a href="">About us</a></li>
            <li><a href="">Help</a></li>
            <li><a href="">Contact</a></li>
        </ul>
    </div>
</div>
<!-- Header starts -->
<header>
    <div class="top-bar">
        <div class="uk-container uk-container-center">
            <?= View::factory('top_locations') ?>
            <div class="language uk-float-right  uk-margin-right">
                <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                    <a class="uk-button uk-button-mini" ><img src="<?= URL::base() . 'themes/default/' ?>images/flags/gb.png" alt="United Kingdom"> English (UK) <i class="uk-icon-caret-down"></i></a>
                    <div class="uk-dropdown uk-scrollable-box">
                        <ul class="uk-nav uk-nav-dropdown uk-panel">
                            <li><a href="#" title="English (UK)" data-lang-id="en_UK" class="uk-text-bold"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/gb.png" alt="United Kingdom" class="uk-margin-small-right"> English (UK)</a></li>
                            <li><a href="#" title="English (US)"  data-lang-id="en_US" ><img src="<?= URL::base() . 'themes/default/' ?>images/flags/us.png" alt="United States" class="uk-margin-small-right"> English (US)</a></li>
                            <li><a href="#" title="French (Canada)" data-lang-id="fr_CA"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/ca.png" alt="Canada" class="uk-margin-small-right"> Français (Canada)</a></li>
                            <li><a href="#" title="French (France)" data-lang-id="fr_FR"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/fr.png" alt="France" class="uk-margin-small-right"> Français (France)</a></li>
                            <li><a href="#" title="Spanish" data-lang-id="es_ES"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/es.png" alt="Spain" class="uk-margin-small-right"> Español</a></li>
                            <li><a href="#" title="Danish" data-lang-id="dk_DK"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/dk.png" alt="Denmark" class="uk-margin-small-right"> Dansk</a></li>
                            <li><a href="#" title="Russian" data-lang-id="ru_RU"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/ru.png" alt="Russia" class="uk-margin-small-right"> Ру�?�?кий</a></li>
                            <li><a href="#" title="Polish" data-lang-id="pl_PL"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/pl.png" alt="Poland" class="uk-margin-small-right"> Polski</a></li>
                            <li><a href="#" title="Italian" data-lang-id="it_IT"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/it.png" alt="Italy" class="uk-margin-small-right"> Italiano</a></li>
                            <li><a href="#" title="Dutch" data-lang-id="nl_NL"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/nl.png" alt="Netherlands" class="uk-margin-small-right"> Nederlands</a></li>
                            <li><a href="#" title="Portuguese (Brazil)" data-lang-id="pt_BR"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/br.png" alt="Brazil" class="uk-margin-small-right"> Português (Brasil)</a></li>
                            <li><a href="#" title="Portuguese (Portugal)" data-lang-id="pt_PT"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/pg.png" alt="Portugal" class="uk-margin-small-right"> Português (Portugal)</a></li>
                            <li><a href="#" title="Japanese" data-lang-id="jp_JP"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/jp.png" alt="Japan" class="uk-margin-small-right"> 日本語</a></li>
                            <li><a href="#" title="Japanese (Kansai)" data-lang-id="ka_JP"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/jp.png" alt="Japan" class="uk-margin-small-right"> 日本語(関西)</a></li>
                            <li><a href="#" title="Traditional Chinese (Taiwan)" data-lang-id="cn_TW"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/tw.png" alt="Taiwan" class="uk-margin-small-right"> 中文(�?��?�)</a></li>
                            <li><a href="#" title="Simplified Chinese (China)" data-lang-id="cn_CN"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/cn.png" alt="China" class="uk-margin-small-right"> 中文(简体)</a></li>
                            <li><a href="#" title="Traditional Chinese (Hong Kong)" data-lang-id="cn_HK"><img src="<?= URL::base() . 'themes/default/' ?>images/flags/hk.png" alt="Hong Kong" class="uk-margin-small-right"> 中文(香港)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="uk-navbar">
        <div class="uk-container uk-container-center">
            <a href="<?= Route::url('default') ?>" class="uk-navbar-brand uk-width-large-2-10 uk-width-medium-2-2 uk-width-small-4-10">
                <img src="<?= URL::base() . 'themes/default/images/logo-large.png' ?>" width="180" alt="plannetads" class="logo-large">
            </a>
            <div class="uk-navbar-content uk-navbar-flip uk-hidden-small">
                <?= View::factory('widget_login') ?>
            </div>
            <a href="#my-id" data-uk-offcanvas class="uk-visible-small off-canvas-btn uk-float-right uk-button-link uk-button uk-button-large"><i class="uk-icon-bars"></i></a>
        </div>
    </nav>
</header>

<?if (!Auth::instance()->logged_in()):?>
<div id="signin_form" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <div class="uk-modal-header">
            <h3 class="uk-text-muted"><?= __('Sign in to your account') ?></h3>
        </div>
        <?= View::factory('pages/auth/login-form') ?>
    </div>
</div>

<div id="forgot_password_form" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <div class="uk-modal-header">
            <h3 class="uk-text-muted"><?= __('Forgot password') ?></h3>
        </div>
        <?= View::factory('pages/auth/forgot-form') ?>
    </div>
</div>

<div id="signup_form" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <div class="uk-modal-header">
            <h3 class="uk-text-muted"><?= __('Register') ?></h3>
        </div>
        <?= View::factory('pages/auth/register-form') ?>
    </div>
</div>
<?endif?>