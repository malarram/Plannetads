<?php defined('SYSPATH') or die('No direct script access.'); ?>
<? if (count($breadcrumbs) > 0) : ?>
<div class="uk-panel uk-panel-box uk-margin-bottom">
    <div class="uk-container uk-container-center">
        <!-- Breadcrumb -->
        <ul class="uk-breadcrumb uk-margin-remove">
            <? $count = count($breadcrumbs); foreach ($breadcrumbs as $k => $crumb) :; ?>
                <? if ($crumb->get_url() !== NULL && ($k < ($count - 1))) :  ?>
                <li>
                    <a title="<?= HTML::chars($crumb->get_title()) ?>" href="<?= $crumb->get_url() ?>"><?= $crumb->get_title() ?></a>
                </li>
                <? else : ?>
                <li><span><?= $crumb->get_title() ?></span></li>
                <? endif; ?>
            <?endforeach; ?>
        </ul>
    </div>
</div>
<? endif; ?>