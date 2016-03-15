<?php defined('SYSPATH') or die('No direct script access.');?>

<?=Form::errors()?>
<div class="page-header">
	<h1><?=__('Theme Options')?> <?=(Request::current()->param('id')!==NULL)?Request::current()->param('id'):Theme::$theme?></h1>
    <p><?=__('Here are listed specific theme configuration values. Replace input fields with new desired values for the theme.')?></p>
    <?if(Core::config('appearance.theme_mobile')!=''):?>
            <p>
                <?=__('Using mobile theme')?> <code><?=Core::config('appearance.theme_mobile')?></code>
            </p>
        <?endif?>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="<?=URL::base()?><?=Request::current()->uri()?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-horizontal">
                        <?foreach ($options as $field => $attributes):?>
                            <div class="form-group">
                                <?=FORM::form_tag($field, $attributes, (isset($data[$field]))?$data[$field]:NULL)?>
                            </div>
                        <?endforeach?>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-7">
                                <?= FORM::button('submit', __('Update'), array('type'=>'submit', 'class'=>'btn btn-primary'))?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
