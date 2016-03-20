<?php defined('SYSPATH') or die('No direct script access.');?>
<div class="page-header">
    <h1><?=__('Social Authentication Settings')?></h1>
</div>


<div class="row">
    <div class="col-md-8">
        <?= FORM::open(Route::url('oc-panel',array('controller'=>'social', 'action'=>'index')), array('class'=>'form-horizontal', 'enctype'=>'multipart/form-data'))?>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-horizontal">
                        <div class="form-group">
                            <?= FORM::label('debug_mode', __('Debug Mode'), array('class'=>'control-label col-sm-4', 'for'=>'debug_mode'))?>
                            <div class="col-sm-8">
                                <div class="onoffswitch">
                                    <?= FORM::hidden('debug_mode', 0);?>
                                    <?= FORM::checkbox('debug_mode', 1, (bool) $config['debug_mode'], array(
                                    'placeholder' => "",
                                    'class' => 'onoffswitch-checkbox',
                                    'id' => 'debug_mode',
                                    ))?>
                                    <?= FORM::label('debug_mode', "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>'debug_mode'))?>
                                </div>
                            </div>
                        </div>

                        <?foreach ($config['providers'] as $api => $options):?>
                            <div class="form-group">
                            <?= FORM::label($api, $api, array('class'=>'control-label col-sm-4', 'for'=>$api))?>
                                <div class="col-sm-8">
                                    <div class="onoffswitch">
                                        <?= FORM::hidden($api, 0);?>
                                        <?= FORM::checkbox($api, 1, (bool) $options['enabled'], array(
                                        'placeholder' => "",
                                        'class' => 'onoffswitch-checkbox',
                                        'id' => $api,
                                        ))?>
                                        <?= FORM::label($api, "<span class='onoffswitch-inner'></span><span class='onoffswitch-switch'></span>", array('class'=>'onoffswitch-label', 'for'=>$api))?>
                                    </div>
                                </div>
                            </div>
                            <?if(isset($options['keys']['id'])):?>
                                <div class="form-group">
                                <?= FORM::label($api.'_id_label', __('Id'), array('class'=>'control-label col-sm-4', 'for'=>$api))?>
                                    <div class="col-sm-8">
                                        <?=FORM::input($api.'_id', $options['keys']['id']);?>
                                    </div>
                                </div>
                            <?endif?>
                            <?if(isset($options['keys']['key'])):?>
                                <div class="form-group">
                                <?= FORM::label($api.'_key_label', __('Key'), array('class'=>'control-label col-sm-4', 'for'=>$api))?>
                                    <div class="col-sm-8">
                                        <?=FORM::input($api.'_key', $options['keys']['key']);?>
                                    </div>
                                </div>
                            <?endif?>
                            <?if(isset($options['keys']['secret'])):?>
                                <div class="form-group">
                                <?= FORM::label($api.'_secret_label', __('secret'), array('class'=>'control-label col-sm-4', 'for'=>$api))?>
                                    <div class="col-sm-8">
                                        <?=FORM::input($api.'_secret', $options['keys']['secret']);?>
                                    </div>
                                </div>
                            <?endif?>
                            <hr>
                        <?endforeach?>

                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8">
                                <?= FORM::button('submit', 'Update', array('type'=>'submit', 'class'=>'btn btn-primary', 'action'=>Route::url('oc-panel',array('controller'=>'social', 'action'=>'index'))))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?FORM::close()?>
    </div>
</div>