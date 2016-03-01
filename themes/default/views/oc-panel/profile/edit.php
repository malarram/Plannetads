<?php defined('SYSPATH') or die('No direct script access.'); ?>

<div class="uk-container uk-container-center ">
    <div class="uk-grid uk-block">
        <div class="uk-width-large-3-10 uk-visible-large">
            <?= View::factory('sidebar_user_prof') ?>
        </div>
        <div class="uk-width-large-7-10 uk-width-medium-1-1">
            <?= Alert::show() ?>
            <h3 class="uk-text-bold"><?= __('Settings') ?></h3>
            <hr>
            <?= FORM::open(Route::url('oc-panel', array('controller' => 'profile', 'action' => 'edit')), array('class' => 'uk-form uk-form-horizontal', 'enctype' => 'multipart/form-data')) ?>
            <fieldset class="uk-margin-large-bottom">
                <legend>Basic Information</legend>
                <div class="uk-form-row">
                    <?= FORM::label('name', __('Name'), array('class' => 'uk-form-label', 'for' => 'name')) ?>
                    <div class="uk-form-controls">
                        <?= FORM::input('name', $user->name, array('class' => 'uk-width-medium-5-10 uk-form-large', 'id' => 'name', 'required', 'placeholder' => __('Name'))) ?>
                    </div>
                </div>
                <div class="uk-form-row">
                    <?= FORM::label('email', __('Email'), array('class' => 'uk-form-label', 'for' => 'email')) ?>
                    <div class="uk-form-controls">
                        <?= FORM::input('email', $user->email, array('class' => 'uk-width-medium-5-10 uk-form-large', 'id' => 'email', 'type' => 'email', 'required', 'placeholder' => __('Email'))) ?>
                    </div>
                </div>
<!--                <div class="uk-form-row">
                    <?= FORM::label('description', __('Description'), array('class' => 'uk-form-label', 'for' => 'description')) ?>
                    <div class="uk-form-controls">
                        <?= FORM::input('description', $user->description, array('class' => 'uk-width-medium-5-10 uk-form-large', 'id' => 'description', 'type' => 'description', 'placeholder' => __('Description'))) ?>
                    </div>
                </div>-->

                <?foreach($custom_fields as $name=>$field):?>
                <div class="uk-form-row" id="cf_new">
                    <?$cf_name = 'cf_'.$name?>
                    <?if($field['type'] == 'select' OR $field['type'] == 'radio') {
                    $select = array(''=>'');
                    foreach ($field['values'] as $select_name) {
                    $select[$select_name] = $select_name;
                    }
                    } else $select = $field['values']?>
                    <?= FORM::label('cf_' . $name, $field['label'], array('class' => 'uk-form-label', 'for' => 'cf_' . $name)) ?>
                    <div class="uk-form-controls">
                        <?=
                        Form::cf_form_field('cf_' . $name, array(
                            'display' => $field['type'],
                            'label' => $field['label'],
                            'tooltip' => (isset($field['tooltip'])) ? $field['tooltip'] : "",
                            'default' => $user->$cf_name,
                            'options' => (!is_array($field['values'])) ? $field['values'] : $select,
                            'required' => $field['required'],
                        ))
                        ?>
                    </div>
                </div>
                <?endforeach?>

                <div class="uk-form-row">
                    <div class="col-md-offset-4 col-md-8">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="subscriber" value="1" <?= ($user->subscriber) ? 'checked' : NULL ?> > <?= __('Subscribed to emails') ?>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label for="save" class="uk-form-label"></label>
                    <div class="uk-form-controls">
                        <button type="submit" class="uk-button uk-button-primary uk-button-large"><?= __('Save') ?></button>
                    </div>
                </div>
            </fieldset>
            <?= FORM::close() ?>
            <form class="uk-form uk-form-horizontal"  method="post" action="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'changepass')) ?>">
                <fieldset class="uk-margin-large-bottom">
                    <legend><?= __('Change password') ?></legend>
                    <?= Form::errors() ?>

                    <div class="uk-form-row">
                        <label class="uk-form-label"><?= __('New password') ?></label>
                        <div class="uk-form-controls">
                            <input class="uk-width-medium-5-10 uk-form-large" type="password" name="password1" placeholder="<?= __('Password') ?>">
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label"><?= __('Repeat password') ?></label>
                        <div class="uk-form-controls">
                            <input class="uk-width-medium-5-10 uk-form-large" type="password" name="password2" placeholder="<?= __('Password') ?>">
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label for="save" class="uk-form-label"></label>
                        <div class="uk-form-controls">
                            <button type="submit" class="uk-button uk-button-primary uk-button-large"><?= __('Save') ?></button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <form class="uk-form uk-form-horizontal" enctype="multipart/form-data" method="post" action="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'image')) ?>">
                <fieldset class="uk-margin-large-bottom">
                    <legend><?= __('Profile picture') ?></legend>
                    <?= Form::errors() ?>
                    <div class="uk-form-row">
                        <label for="name" class="uk-form-label">Profile Picture</label>
                        <div class="uk-form-controls">
                            <div class="uk-thumbnail uk-thumbnail-mini uk-margin-right ">
                            <img src="<?= $user->get_profile_image() ?>" class="img-rounded" alt="<?= __('Profile Picture') ?>" height='200' width="200">
                            </div>
                            <input type="file" name="profile_image" id="profile_img">
                             <!--<a class="uk-form-file uk-button">Change<input type="file" name="profile_image" id="profile_img"></a>-->
                        </div>
                    </div>

                    <div class="uk-form-row">
                        <label for="save" class="uk-form-label"></label>
                        <div class="uk-form-controls">
                            <button type="submit" class="uk-button uk-button-primary uk-button-large"><?= __('Update') ?></button>

                            <?if ($user->has_image):?>
                            <button type="submit"
                                    class="uk-button uk-button-danger uk-button-large"
                                    onclick="return confirm('<?= __('Delete photo?') ?>');"
                                    type="submit"
                                    name="photo_delete"
                                    value="1"
                                    title="<?= __('Delete photo') ?>">
                                        <?= __('Delete photo') ?>
                            </button>
                            <?endif?>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>