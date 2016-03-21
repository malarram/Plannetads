<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-8-10 uk-width-medium-7-10 uk-width-small-7-10 uk-container-center">
            <?if ($page->loaded()):?>
            <h3 class="uk-text-bold"><?= $page->title ?></h3>
            <hr />
            <?= $page->description ?>
            <?else:?>
            <h2><?= __('Thanks for submitting your advertisement') ?></h2>
            <?endif?>

            <p class="text-center">
                <?if(core::config('general.moderation') == Model_Ad::POST_DIRECTLY) :?>
                <a class="btn btn-success" href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>"><?= __('Go to Your Ad') ?></a>
                <?endif?>
            </p>
        </div>
    </div>
</div>