<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center">
    <div class="uk-grid uk-block">
        <article class="uk-article">
            <h2 class="uk-article-title ad-title"><?= (Request::current()->param('message') != NULL) ? base64::decode_from_url((Request::current()->param('message'))) : __('Page Not Found') ?></h2>
            <p><?= __('The requested page') ?> <?php echo HTML::anchor($requested_page, $requested_page) ?> <?= __('is not found') ?>.</p>

            <p><?= __('It is either not existing, moved or deleted. Make sure the URL is correct.') ?> </p>

            <p><?= __('To go back to the previous page, click the Back button.') ?></p>

            <p><a href="<?php echo URL::site('/', TRUE) ?>"><?= __('If you wanted to go to the main page instead, click here.') ?></a></p>
        </article>
    </div>
</div>
