<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-3-10 uk-visible-large">
            <?= View::factory('sidebar_user_prof') ?>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <h3 class="uk-text-bold"><?= __('Inbox') ?></h3>
            <hr>
            <div class="uk-button-group">
                <a href="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'index')) ?>" class="uk-button <?= (!is_numeric(core::get('status'))) ? 'uk-button-primary' : '' ?>">
                    <?= __('All') ?>
                </a>
                <a href="?status=<?= Model_Message::STATUS_NOTREAD ?>" class="uk-button  <?= (core::get('status', -1) == Model_Message::STATUS_NOTREAD) ? 'uk-button-primary' : '' ?>">
                    <i class="uk-icon uk-icon-eye"></i> <?= __('Unread') ?>
                </a>
                <a href="?status=<?= Model_Message::STATUS_ARCHIVED ?>" class="uk-button  <?= (core::get('status', -1) == Model_Message::STATUS_ARCHIVED) ? 'uk-button-primary' : '' ?>">
                    <i class="uk-icon uk-icon-folder-o"></i> <?= __('Archieved') ?>
                </a>
                <a href="?status=<?= Model_Message::STATUS_SPAM ?>" class="uk-button  <?= (core::get('status', -1) == Model_Message::STATUS_SPAM) ? 'uk-button-primary' : '' ?>">
                    <i class="uk-icon uk-icon-fire"></i> <?= __('Spam') ?>
                </a>
            </div>
            <?if (count($messages) > 0):?>
            <table class="uk-table uk-table-striped uk-table-condensed responsive">
                <thead>
                    <tr>
                        <th width="40%"><?= __('Title') ?> / <?= __('From') ?></th>
                        <th><?= __('Date') ?></th>
                        <th><?= __('Last Answer') ?></th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?foreach ($messages as $message):?>
                    <tr class="message"
                        data-url="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'message', 'id' => ($message->id_message_parent != NULL) ? $message->id_message_parent : $message->id_message)) ?>"
                        style="<?= ($message->status_to == Model_Message::STATUS_NOTREAD AND $message->id_user_from != $user->id_user) ? 'font-weight: bold;' : NULL ?>"
                        >
                        <td>
                            <p>
                                <?if(isset($message->ad->title)):?>
                                <?= $message->ad->title ?>
                                <?else:?>
                                <?= __('Direct Message') ?>
                                <?endif?>
                                <?if ($message->status_to == Model_Message::STATUS_NOTREAD AND $message->id_user_from != $user->id_user) :?>
                                <span class="label label-warning"><?= __('Unread') ?></span>
                                <?endif?>
                                <br>
                                <a href="<?= Route::url('profile', array('seoname' => $message->from->seoname)) ?>"><?= $message->from->name ?></a>
                            </p>
                        </td>
                        <td><?= $message->parent->created ?></td>
                        <td><?= (empty($message->parent->read_date)) ? __('None') : $message->created ?></td>
                        <td class="text-right">
                            <a href="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'message', 'id' => ($message->id_message_parent != NULL) ? $message->id_message_parent : $message->id_message)) ?>"
                               class="uk-button uk-button-mini <?= ($message->status_to == Model_Message::STATUS_NOTREAD AND $message->id_user_from != $user->id_user) ? 'uk-button-warning' : '' ?>"
                               >
                                <i class="uk-icon uk-icon-envelope"></i>
                            </a>
                        </td>
                    </tr>
                    <?endforeach?>
                </tbody>
            </table>
            <?else:?>
            <h3><?= __('You don’t have any messages yet.') ?></h3>
            <?endif?>
        </div>
    </div>
</div>