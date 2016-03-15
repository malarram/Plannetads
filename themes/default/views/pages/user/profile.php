<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-2-10 uk-visible-large">
            <div class="uk-panel uk-panel-box-secondary settings-sidebar">
                <div class="uk-thumbnail uk-thumbnail-medium">
                    <img class="uk-thumbnail-medium" src="<?= $user->get_profile_image() ?>" alt="<?= ucwords($user->name) ?>" >
                    <div class="uk-thumbnail-caption"><?= ucwords($user->name) ?></div>
                    <div class="uk-thumbnail-caption"><?= 'Since ' . Date::format($user->created, core::config('general.date_format')) ?></div>
                    <div class="uk-thumbnail-caption"><?= 'Last ' . Date::format($user->last_login, core::config('general.date_format')) ?></div>
                    <div class="uk-thumbnail-caption">
                        <?if (Core::config('advertisement.reviews')==1):?>
                        <?if ($user->rate!==NULL):?>
                        <?for ($i=0; $i < round($user->rate,1); $i++):?>
                        <i class="uk-icon uk-icon-star"></i>
                        <?endfor?>
                        <?endif?>
                        <?endif?>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <?= $user->description ?>
            <h3 class="uk-text-bold"><?= ucwords($user->name) ?><?= __(' advertisements') ?></h3>
            <hr>
            <?if($profile_ads!==NULL):?>
            <?foreach($profile_ads as $ad):?>
            <?
            $addt_class = '';
            /* if($ad->featured >= Date::unix2mysql(time())):
                    $addt_class = 'featured';
                endif; */
            ?>
            <div class="listings uk-grid favorite <?= $addt_class ?>" id="fav-<?= $ad->id_ad ?>">
                <div class="uk-width-medium-2-10 uk-width-small-3-10">
                    <a class="uk-thumbnail" title="<?= HTML::chars($ad->title) ?>" href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                        <?if($ad->get_first_image() !== NULL):?>
                        <img src="<?= $ad->get_first_image() ?>" alt="<?= HTML::chars($ad->title) ?>" />
                        <?elseif(( $icon_src = $ad->category->get_icon() )!==FALSE ):?>
                        <img src="<?= $icon_src ?>" class="img-responsive" alt="<?= HTML::chars($ad->title) ?>" />
                        <?elseif(( $icon_src = $ad->location->get_icon() )!==FALSE ):?>
                        <img src="<?= $icon_src ?>" class="img-responsive" alt="<?= HTML::chars($ad->title) ?>" />
                        <?else:?>
                        <img src="<?= URL::base() . 'themes/default/images/default-ad-thumb.jpg' ?>" class="img-responsive" alt="<?= HTML::chars($ad->title) ?>">
                        <?endif?>
                    </a>
                </div>
                <div class="uk-width-medium-7-10 uk-width-small-5-10">
                    <h5 class="text-bold">
                        <a title="<?= HTML::chars($ad->title) ?>" href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                            <?= $ad->title ?>
                        </a>
                    </h5>
                    <?if(core::config('advertisement.description')!=FALSE):?>
                    <p><?= Text::limit_chars(Text::removebbcode($ad->description), 255, NULL, TRUE); ?></p>
                    <?endif?>
                </div>
                <div class="uk-width-medium-1-10 uk-width-small-2-10 uk-text-middle"><?= i18n::money_format($ad->price) ?></div>
                <div class="uk-width-1-1">
                    <?$visitor = Auth::instance()->get_user()?>
                    <?if ($visitor != FALSE && $visitor->id_role == 10):?>
                    <br>
                    <a class="uk-margin-small-left uk-button-mini uk-button-primary uk-button" href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"><?= __("Edit"); ?></a>
                    <a class="uk-margin-small-left uk-button-mini uk-button-primary uk-button" href="<?= Route::url('oc-panel', array('controller' => 'ad', 'action' => 'deactivate', 'id' => $ad->id_ad)) ?>"
                       onclick="return confirm('<?= __('Deactivate?') ?>');"><?= __("Deactivate"); ?>
                    </a>
                    <a class="uk-margin-small-left uk-button-mini uk-button-primary uk-button" href="<?= Route::url('oc-panel', array('controller' => 'ad', 'action' => 'delete', 'id' => $ad->id_ad)) ?>"
                       onclick="return confirm('<?= __('Delete?') ?>');"><?= __("Delete"); ?>
                    </a>
                    <?elseif($visitor != FALSE && $visitor->id_user == $ad->id_user):?>
                    <a class="uk-margin-small-left uk-button-mini uk-button-primary uk-button" href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"><?= __("Edit"); ?></a>
                    <?endif?>
                </div>
            </div>
            <hr>
            <?endforeach?>
            <?= $pagination ?>
            <?endif?>
        </div>
    </div>
</div>