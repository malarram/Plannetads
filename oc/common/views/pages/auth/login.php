<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?= Breadcrumbs::render('breadcrumbs') ?>

<div class="uk-container uk-container-center">
    <div class="uk-width-large-3-10 uk-container-center">
        <h3 class="text-bolder uk-text-center"><?= __('Login') ?></h3>
        <div class="uk-panel uk-panel-box uk-panel-box-secondary ">
            <?= View::factory('pages/auth/login-form') ?>
        </div>
    </div>
</div>

