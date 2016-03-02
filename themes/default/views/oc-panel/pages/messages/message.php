<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-3-10 uk-visible-large">
            <?= View::factory('sidebar_user_prof') ?>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <h3 class="uk-text-bold">
                <?if ($msg_thread->id_ad !== NULL):?>
                <?= $msg_thread->ad->title ?>
                <?else:?>
                <?= sprintf(__('Direct message from %s to %s'), $msg_thread->from->name, $msg_thread->to->name); ?>
                <?endif?>
            </h3>
            <hr>
            <div class="uk-button-group uk-align-right">
                <a href="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'status', 'id' => $msg_thread->id_message)) ?>?status=<?= Model_Message::STATUS_ARCHIVED ?>" class="uk-button uk-button-primary">
                    <span class="glyphicon glyphicon-folder-close" aria-hidden="true"></span> <?= __('Archive') ?>
                </a>
                <a
                    href="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'status', 'id' => $msg_thread->id_message)) ?>?status=<?= Model_Message::STATUS_SPAM ?>"
                    class="uk-button uk-button-warning"
                    data-toggle="confirmation"
                    data-text="<?= __('Are you sure you want to mark it as Spam?') ?>"
                    data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                    data-btnCancelLabel="<?= __('No way!') ?>"
                    >
                    <span class="glyphicon glyphicon-fire" aria-hidden="true"></span> <?= __('Spam') ?>
                </a>
                <a
                    href="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'status', 'id' => $msg_thread->id_message)) ?>?status=<?= Model_Message::STATUS_DELETED ?>"
                    class="uk-button uk-button-danger"
                    data-toggle="confirmation"
                    data-text="<?= __('Are you sure you want to delete?') ?>"
                    data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                    data-btnCancelLabel="<?= __('No way!') ?>"
                    >
                    <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> <?= __('Delete') ?>
                </a>
            </div>
            <table class="uk-table uk-table-striped uk-table-condensed responsive">
                <tbody>
                    <?foreach ($messages as $message):?>
                    <tr>
                        <td width='10%' class="uk-text-center">
                                <a href="<?= Route::url('profile', array('seoname' => $message->from->seoname)) ?>">
                                    <img src="<?= $message->from->get_profile_image() ?>" class="uk-border-circle uk-thumbnail " width="50" height="50" title="<?= HTML::chars($message->from->name) ?>">
                                    <span><?= $message->from->name ?></span>
                                </a>
                        </td>
                        <td width='70%'>

                            <p class="<?= HTML::chars($message->from->name) ?>"><?= Text::bb2html($message->message, TRUE) ?></p>
                            <?if ($message->price > 0):?>
                            <p>
                                <strong><?= __('Price') ?></strong>: <?= i18n::money_format($message->price) ?>
                            </p>
                            <?endif?>
                        </td>
                        <td>
                            <?= Date::fuzzy_span(Date::mysql2unix($message->created)) ?>
                            <? // $message->created ?>
                        </td>
                    </tr>
                    <?endforeach?>
                    <tr>
                        <td>
                            <img src="<?= $user->get_profile_image() ?>" class="uk-border-circle uk-thumbnail " width="50" height="50" title="<?= HTML::chars($user->name) ?>">
                        </td>
                        <td colspan="2">
                            <form class="uk-form uk-form-horizontal "  method="post" action="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'message', 'id' => Request::current()->param('id'))) ?>">
                                <?php if (isset($errors)): ?>
                                    <div class="alert alert-danger" role="alert">
                                        <p><?= __('Some errors were encountered, please check the details you entered.') ?></p>
                                        <ul>
                                            <?php foreach ($errors as $message): ?>
                                                <li><?php echo $message ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php endif ?>
                                <div class="uk-form-row">
                                    <div class="uk-width-medium-1-1">
                                        <textarea name="message" rows="10" class="uk-width-1-1 uk-form-medium disable-bbcode" data-editor="html" required><?= core::post('message') ?></textarea>
                                    </div>
                                </div>
                                <?= Form::token('reply_message') ?>
                                <div class="uk-form-row">
                                <a href="<?= Route::url('oc-panel', array('controller' => 'messages', 'action' => 'index')) ?>" class="uk-button"><?= __('Cancel') ?></a>
                                <button type="submit" class="uk-button uk-button-primary"><?= __('Reply') ?></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>