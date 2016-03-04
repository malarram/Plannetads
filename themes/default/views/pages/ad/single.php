<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?if ($ad->status != Model_Ad::STATUS_PUBLISHED && $permission === FALSE && ($ad->id_user != $user)):?>

<div class="uk-container uk-container-center">
    <article class="uk-article">
        <h1 class="uk-article-title ad-title"><?= __('This advertisement doesn´t exist, or is not yet published!') ?></h1>
    </article>
</div>

<?else:?>

<?= Breadcrumbs::render('breadcrumbs') ?>
<div class="uk-container uk-container-center">
    <article class="uk-article">
        <h1 class="uk-article-title ad-title"><?= $ad->title; ?></h1>
        <p class="uk-article-meta"><span><?=Date::fuzzy_span(Date::mysql2unix($ad->published))?></span> | <span><?= $ad->location->name ?></span> | <span>Item id: <?= $ad->id_ad ?></span></p>
        <div class="uk-grid">
            <div class="uk-width-medium-6-10 uk-width-medium-1-1">
                <ul class="uk-tab uk-margin-bottom" data-uk-tab="{connect:'#media'}">
                    <li class="uk-active"><a href="">Images</a></li>
                    <li><a href="">Videos</a></li>
                </ul>
                <div id="media"  class="uk-switcher">
                    <div class="slide-wrapper">
                        <div class="uk-slidenav-position" data-uk-slideshow>
                        <?$images = $ad->get_images()?>
                        <?if($images): $i=0; $dots_html = ""; ?>
                            <ul class="uk-slideshow">
                                <?foreach ($images as $path => $value):?>
                                <?php if(isset($value['image']) ):?>
                                    <li><img src="<?= $value['image'] ?>" alt="<?= HTML::chars($ad->title) ?>"></li>
                                <?php
                                $dots_html .= "<li data-uk-slideshow-item='{$i}'><a href='#'></a></li>";
                                $i++;
                                endif;
                                ?>
                                <?endforeach?>
                            </ul>

                            <a href="javascript:void(0);" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
                            <a href="javascript:void(0);" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
                            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
                                <?php echo $dots_html; ?>
                            </ul>
                        <?endif?>
                        </div>
                    </div>
                    <div class="video-wrapper">
                        Videos goes here....
                    </div>
                </div>
                <?if(core::config('advertisement.description')!=FALSE):?>
                    <p><?= Text::bb2html($ad->description, TRUE) ?></p>
                <?endif?>
                <hr class="uk-article-divider">
                <h4>Location map</h4>
                <p>
                    <?if (core::config('advertisement.map')==1 AND $ad->latitude AND $ad->longitude):?>
<p><img class="img-responsive" src="//maps.googleapis.com/maps/api/staticmap?zoom=<?= Core::config('advertisement.map_zoom') ?>&scale=false&size=733x271&maptype=roadmap&format=png&visual_refresh=true&markers=size:large%7Ccolor:red%7Clabel:·%7C<?= $ad->latitude ?>,<?= $ad->longitude ?>" alt="<?= HTML::chars($ad->title) ?> <?= __('Map') ?>" style="width:100%;"></p>
<p><a class="btn btn-default btn-sm" href="<?= Route::url('map') ?>?category=<?= $ad->category->seoname ?>&location=<?= $ad->location->seoname ?>"><span class="glyphicon glyphicon-globe"></span> <?= __('Map View') ?></a></p>
<?endif?>
                </p>
            </div>
            <div class="uk-width-medium-4-10 uk-width-medium-1-1">
                <div class="uk-panel uk-panel-box ">
                    <article class="uk-comment">
                        <header class="uk-comment-header">
                            <div class="user-photo uk-float-left">
                                <img class="uk-comment-avatar uk-border-circle" src="images/a2.jpg" alt="">
                            </div>
                            <div class="uk-float-left">
                                <h4 class="uk-comment-title"><a href="<?= Route::url('profile', array('seoname' => $ad->user->seoname)) ?>"><?= ucwords($ad->user->name) ?></a></h4>
                                <div class="uk-comment-meta">
                                   <?php $count_ads = (new Model_Ad)->where('id_user', '=', $ad->user->id_user)->where('status', '=', Model_Ad::STATUS_PUBLISHED)->count_all(); ?>
                                    <?= $count_ads ?> ads | Member since <?= Date::format($ad->user->created, 'M Y'); ?></div>
                                <div class="uk-comment-meta"><a href="<?= Route::url('profile', array('seoname' => $ad->user->seoname)) ?>">More ads from <?= ucwords($ad->user->name) ?></a></div>
                            </div>
                        </header>
                    </article>
                </div>

                <? //if ($ad->price>0):?>
                <div class="uk-panel uk-panel-box uk-panel-box-primary uk-h2 uk-text-center uk-margin-bottom"><?= i18n::money_format($ad->price) ?></div>
                <? //endif?>

                <div class="uk-text-center favorite" id="fav-<?= $ad->id_ad ?>">
                    <?if (Auth::instance()->logged_in()):?>
                    <?$fav = Model_Favorite::is_favorite(Auth::instance()->get_user(),$ad);?>
                    <a class="uk-button wishlist-btn add-favorite <?= ($fav) ? 'remove-favorite' : '' ?>" type="button" data-id="fav-<?= $ad->id_ad ?>" title="<?= __('Add to Favorites') ?>" href="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'favorites', 'id' => $ad->id_ad)) ?>">
                        <i class="uk-icon-heart<?= ($fav) ? '' : '-o' ?>"></i> Add to wishlist
                    </a>
                    <?else:?>
                    <a data-toggle="modal" data-dismiss="modal" href="<?= Route::url('oc-panel', array('directory' => 'user', 'controller' => 'auth', 'action' => 'login')) ?>#login-modal">
                        <i class="uk-icon-heart-o"></i> Add to wishlist
                    </a>
                    <?endif?>
                    <?= $ad->flagad() ?>
                </div>
<!--                <div class="uk-panel uk-panel-box uk-margin-top uk-form uk-hidden" id="report-ad">
                    <h4>Report Ad</h4>
                    <form class="uk-form">
                        <div class="uk-form-row">
                            <label><input type="radio" name="report"> Inappropriate or Illegal Content</label>
                        </div>
                        <div class="uk-form-row">
                            <label><input type="radio" name="report"> Over Posted / Spam</label>
                        </div>
                        <div class="uk-form-row">
                            <label><input type="radio" name="report"> Wrong Category</label>
                        </div>
                        <div class="uk-form-row">
                            <button class="uk-align-right uk-button uk-button-large uk-button-primary " type="button">Submit</button>
                        </div>
                    </form>
                </div>-->
                <div class="uk-panel uk-panel-box  uk-margin-top">

                    <div class="contact-seller">
                        <h4 class="uk-panel-title">Contact Seller</h4>
                        <?= FORM::open(Route::url('default', array('controller' => 'contact', 'action' => 'user_contact', 'id' => $ad->id_ad)), array('class' => 'uk-form uk-form-stacked contact-ad', 'enctype' => 'multipart/form-data')) ?>
                        <?= FORM::errors() ?>

                        <?if (!Auth::instance()->get_user()):?>
                            <div class="uk-form-row">
                                <?= FORM::label('name', __('Name'), array('class' => 'uk-form-label', 'for' => 'name')) ?>
                                <?= FORM::input('name', Core::request('name'), array('placeholder' => __('Name'), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'name', 'required')) ?>
                            </div>
                            <div class="uk-form-row">
                                <?= FORM::label('email', __('Email'), array('class' => 'uk-form-label', 'for' => 'email')) ?>
                                <?= FORM::input('email', Core::request('email'), array('placeholder' => __('Email'), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'email', 'type' => 'email', 'required')) ?>
                            </div>
                            <?endif?>
                            <div class="uk-form-row">
                                <?= FORM::label('comments', __('Comments'), array('class' => 'uk-form-label', 'for' => 'comments')) ?>
                                <?= FORM::textarea('message', Core::request('message'), array('class' => 'uk-form-large uk-width-1-1', 'placeholder' => __('Message'), 'name' => 'message', 'id' => 'message', 'rows' => 5,'cols'=>30, 'required')) ?>
                            </div>
                            <?if (core::config('advertisement.captcha') != FALSE):?>
                                <div class="uk-form-row">
                                    <?= FORM::label('captcha', __('Captcha'), array('class' => 'uk-form-label', 'for' => 'captcha')) ?>
                                    <?if (Core::config('general.recaptcha_active')):?>
                                    <?= Captcha::recaptcha_display() ?>
                                    <div id="recaptcha1"></div>
                                    <?else:?>
                                    <?= captcha::image_tag('contact') ?><br />
                                    <?= FORM::input('captcha', "", array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'captcha', 'required')) ?>
                                    <?endif?>
                                </div>
                            <?endif?>
                            <div class="uk-form-row">
                                <?= FORM::button('submit', __('Send'), array('type' => 'submit', 'class' => 'uk-align-right uk-button uk-button-large uk-button-primary', 'action' => Route::url('default', array('controller' => 'contact', 'action' => 'user_contact', 'id' => $ad->id_ad)))) ?>
                            </div>
                        <?= FORM::close() ?>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
<?endif?>