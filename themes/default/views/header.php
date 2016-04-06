<?php defined('SYSPATH') or die('No direct script access.'); ?>
<div id="my-id" class="uk-offcanvas">
    <div class="uk-offcanvas-bar uk-offcanvas-bar-flip ">
        <ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
            <div class="uk-nav-divider"></div>
            <li><a href="#signin_form" data-uk-modal><?= __('Sign In') ?></a></li>
            <li><a href="<?= Route::url('post_new') ?>"><?= __('Post an Ad') ?></a></li>
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
                <?php
                $lang_array = [
                    'ar' => ['image' => 'dk.png', 'label' => 'Arabic'],
                    'zh_CN' => ['image' => 'cn.png', 'label' => 'Chinese'],
                    'nl_NL' => ['image' => 'nl.png', 'label' => 'Dutch'],
                    'da_DK' => ['image' => 'dk.png', 'label' => 'Danish'],
                    'en_UK' => ['image' => 'us.png', 'label' => 'English'],
                    'fr_CA' => ['image' => 'ca.png', 'label' => 'French'],
                    'de_DE' => ['image' => 'de.png', 'label' => 'German'],
                    'it_IT' => ['image' => 'it.png', 'label' => 'Italian'],
                    'ja_JP' => ['image' => 'jp.png', 'label' => 'Japanese'],
                    'pl_PL' => ['image' => 'pl.png', 'label' => 'Polish'],
                    'pt_PT' => ['image' => 'pg.png', 'label' => 'Portuguese'], 
                    'ru_RU' => ['image' => 'ru.png', 'label' => 'Russian'],
                    'es_ES' => ['image' => 'es.png', 'label' => 'Spanish']
                ];

                if (isset($lang_array[I18n::lang()]))
                    $selected_lang = $lang_array[I18n::lang()];
//                else
//                    $selected_lang = ['label' => OC_I18n::$locales[substr(I18n::lang(), 0, 2)]];
//                $available_languages = OC_I18n::get_languages();
                ?>

                <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                    <a class="uk-button uk-button-mini" >
                        <?php if (isset($selected_lang['image'])): ?>
                            <img src="<?= URL::base() ?>/themes/default/images/flags/<?= $selected_lang['image'] ?>" alt="<?= $selected_lang['label'] ?>" />
                        <?php endif ?>
                        <?= $selected_lang['label'] ?> <i class="uk-icon-caret-down"></i></a>
                    <div class="uk-dropdown uk-scrollable-box">
                        <ul class="uk-nav uk-nav-dropdown uk-panel ">
                            <?php
                            foreach ($lang_array as $code => $lang):
//                            foreach ($available_languages as $language):
//                                $code = $language;
//                                if (isset($lang_array[$language]))
//                                    $lang = $lang_array[$language];
//                                else
//                                    $lang = ['label' => OC_I18n::$locales[substr($language, 0, 2)]];

                                $class = ($code == I18n::lang()) ? ' uk-text-bold' : '';
                                echo "<li><a href='" . URL::base() . "?language={$code}' title='{$lang['label']}' class='{$class}'>";
                                if (isset($lang['image']))
                                    echo "<img src='" . URL::base() . "/themes/default/images/flags/{$lang['image']}' alt='{$lang['label']}' class='uk-margin-small-right' />";
                                echo "{$lang['label']}</a></li>";
                            endforeach;
                            ?>
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