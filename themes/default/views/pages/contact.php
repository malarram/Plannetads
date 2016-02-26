<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-2-10 uk-width-medium-3-10 uk-width-small-3-10 ">
            <div class="uk-panel uk-panel-box  uk-panel-box-secondary uk-margin-bottom">
                <h3 class="uk-h5 uk-text-bold">Plannetads Links</h3>
                <ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
                    <li class="uk-nav-divider"></li>
                    <li><a href="<?= Route::url('page', array('seotitle' => 'about-us')) ?>" title="<?= __('About Us') ?>"><?= __('About Us') ?></a></li>
                    <li><a href="<?= Route::url('page', array('seotitle' => 'faq')) ?>" title="<?= __('FAQ') ?>"><?= __('FAQ') ?></a></li>
                    <li><a href="<?= Route::url('page', array('seotitle' => 'privacy-policy')) ?>" title="<?= __('Privacy Policy') ?>"><?= __('Privacy Policy') ?></a></li>
                    <li><a href="<?= Route::url('page', array('seotitle' => 'terms-of-service')) ?>" title="<?= __('Terms of Service') ?>"><?= __('Terms of Service') ?></a></li>
                    <li><a href="<?= Route::url('page', array('seotitle' => 'help')) ?>" title="<?= __('Help') ?>"><?= __('Help') ?></a></li>
                    <?= Theme::nav_link('Contact', 'contact', '', 'index', 'contact') ?>
                </ul>
            </div>
        </div>
        <div class="uk-width-large-8-10 uk-width-medium-7-10 uk-width-small-7-10">
            <?if(core::config('general.contact_page') != ''):?>
            <?$content = Model_Content::get_by_title(core::config('general.contact_page'))?>
            <h3 class="uk-text-bold"><?= $content->title ?></h3>
            <hr>
            <?= $content->description ?>
            <?else:?>
            <h3 class="uk-text-bold"><?= __('Contact Us') ?></h3>
            <hr>
            <div class="uk-grid">
                <div class="uk-width-medium-6-10 uk-width-small-1-1">
                    <?= Form::errors() ?>
                    <?= FORM::open(Route::url('contact'), array('class' => 'uk-form uk-form-stacked', 'enctype' => 'multipart/form-data')) ?>
                    <fieldset>
                        <?if (!Auth::instance()->logged_in()):?>
                        <div class="uk-form-row">
                            <?= FORM::label('name', __('Name'), array('class' => 'uk-form-label', 'for' => 'name')) ?>
                            <div class="uk-form-controls">
                                <?= FORM::input('name', Core::request('name'), array('placeholder' => __('Name'), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'name', 'required')) ?>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <?= FORM::label('email', __('Email'), array('class' => 'uk-form-label', 'for' => 'email')) ?>
                            <div class="uk-form-controls">
                                <?= FORM::input('email', Core::request('email'), array('placeholder' => __('Email'), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'email', 'type' => 'email', 'required')) ?>
                            </div>
                        </div>
                        <?endif?>

                        <div class="uk-form-row">
                            <?= FORM::label('subject', __('Subject'), array('class' => 'uk-form-label', 'for' => 'subject')) ?>
                            <div class="uk-form-controls">
                                <?= FORM::input('subject', Core::request('subject'), array('placeholder' => __('Subject'), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'subject')) ?>
                            </div>
                        </div>
                        <div class="uk-form-row">
                            <?= FORM::label('message', __('Message'), array('class' => 'uk-form-label', 'for' => 'message')) ?>
                            <div class="uk-form-controls">
                                <?= FORM::textarea('message', Core::request('message'), array('class' => 'uk-width-1-1 uk-form-large', 'placeholder' => __('Message'), 'name' => 'message', 'id' => 'message', 'rows' => 7, 'required')) ?>
                            </div>
                        </div>

                        <?if (core::config('advertisement.captcha') != FALSE):?>
                        <div class="uk-form-row">
                            <div class="uk-width-1-1">
                                <?if (Core::config('general.recaptcha_active')):?>
                                <?= Captcha::recaptcha_display() ?>
                                <div id="recaptcha1"></div>
                                <?else:?>
                                <?= FORM::label('captcha', __('Captcha *'), array('class' => 'uk-form-label','for' => 'captcha')) ?>
                                <div class="uk-grid">
                                <div class="uk-width-2-6">
                                    <span id="helpBlock" class="uk-form-help-block"><?= captcha::image_tag('contact') ?></span>
                                </div>
                                <div class="uk-width-2-6">
                                    <?= FORM::input('captcha', "", array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'captcha', 'required', 'data-error' => __('Captcha is not correct'))) ?>
                                </div>
                                </div>
                                <?endif?>
                            </div>
                        </div>
                        <?endif?>

                        <div class="uk-form-row">
                            <?= FORM::button('submit', __('Send'), array('type' => 'submit', 'class' => 'uk-align-right uk-button uk-button-large uk-button-primary', 'action' => Route::url('contact'))) ?>
                        </div>
                    </fieldset>
                    <?= FORM::close() ?>
                </div>
                <div class="uk-width-medium-4-10 uk-width-small-1-1">
                    <h5  class="uk-text-bold">Physical Address:</h5>
                    <p>All Correspondence<br>Plannetads<br>95 Maswell Park Road,<br>London,<br>TW3 2DP,<br>United Kingdom.</p>
                    <h5  class="uk-text-bold">Email Addresses:</h5>
                    <dl class="uk-description-list-line">
                        <dt>Copyrights violation related issues</dt>
                        <dd><a href="mailto:abuse@plannetads.com">abuse@plannetads.com</a></dd>
                    </dl>
                    <dl class="uk-description-list-line">
                        <dt>All help and support related issues</dt>
                        <dd> <a href="mailto:support@plannetads.com">support@plannetads.com</a></dd>
                    </dl>
                    <dl class="uk-description-list-line">
                        <dt>All inquiries</dt>
                        <dd><a href="mailto:info@plannetads.com">info@plannetads.com</a></dd>
                    </dl>
                </div>
            </div>
            <?endif?>
        </div>
    </div>
</div>