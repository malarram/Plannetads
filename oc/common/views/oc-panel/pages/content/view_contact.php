<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="page-header">
    <h1><?= $title ?></h1>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-bordered">
            <tr>
                <td><?= __('Name') ?></td>
                <td><?php
                    if ($contact->conatct_user_id) {
                        $user = new Model_User($contact->conatct_user_id);
                        $prof_url = Route::url('profile', array('seoname' => $user->seoname));
                        echo "<a href='{$prof_url}' target='_blank'>{$contact->contact_name}</a>";
                    } else {
                        echo $contact->contact_name;
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><?= __('Email') ?></td>
                <td><?= $contact->contact_email ?></td>
            </tr>
            <tr>
                <td><?= __('Subject') ?></td>
                <td><?= $contact->contact_subject ?></td>
            </tr>
            <tr>
                <td><?= __('Message') ?></td>
                <td><?= $contact->contact_message ?></td>
            </tr>
            <?if($contact->contact_attachment): ?>
            <tr>
                <td><?= __('Attachment') ?></td>
                <td><a href="<?= core::config('general.base_url').'images/attachments/'.$contact->contact_attachment ?>" target="_blank"><img src="<?= core::config('general.base_url').'images/attachments/'.$contact->contact_attachment ?>" width="250"/></a></td>
            </tr>
            <?endif?>
            <tr>
                <td><?= __('Submitted on') ?></td>
                <td><?=Date::format($contact->created_at, core::config('general.date_format'))?></td>
            </tr>
        </table>
    </div>
</div>