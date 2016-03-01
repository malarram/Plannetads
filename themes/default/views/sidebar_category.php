<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php
$widget = new Widget_Categories();
$widget->before();
?>
<div class="uk-width-large-2-10 uk-width-medium-3-10 uk-hidden-small sub-categories-menu">
    <ul class="uk-list uk-list-space">
        <h5 class="text-bold">Browse Categories
            <?if($widget->cat_breadcrumb !== NULL):?>
            <p class="uk-hidden">
                <?if($widget->cat_breadcrumb['id_parent'] != 0):?>
                <a href="<?= Route::url('list', array('category' => $widget->cat_breadcrumb['parent_seoname'], 'location' => $widget->loc_seoname)) ?>" title="<?= HTML::chars($widget->cat_breadcrumb['parent_name']) ?>"><?= $widget->cat_breadcrumb['parent_name'] ?></a> -
                <?= $widget->cat_breadcrumb['name'] ?>
                <?else:?>
                <a href="<?= Route::url('list', array('category' => $widget->cat_breadcrumb['parent_seoname'], 'location' => $widget->loc_seoname)) ?>" title="<?= HTML::chars($widget->cat_breadcrumb['parent_name']) ?>"><?= __('Home') ?></a> -
                <?= $widget->cat_breadcrumb['name'] ?>
                <?endif?>
            </p>
            <?endif?>
        </h5>
        <?foreach($widget->cat_items as $cat):?>
        <li class="trim-title">
            <a href="<?= Route::url('list', array('category' => $cat->seoname, 'location' => $widget->loc_seoname)) ?>" title="<?= HTML::chars($cat->name) ?>"><i class="uk-icon-caret-right uk-margin-right"></i><?= $cat->name ?></a>
        </li>
        <?endforeach?>
    </ul>
</div>
