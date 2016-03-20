<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="page-header">
    <a class="btn btn-primary pull-right ajax-load" href="<?=Route::url('oc-panel',array('controller'=>'userfields','action'=>'new'))?>" title="<?=__('New field')?>">
        <?=__('New field')?>
    </a>
    <h1><?=__('Custom Fields for Users')?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <ol class='plholder' id="ol_1" data-id="1">
                <?if (is_array($fields)):?>
                    <?foreach($fields as $name=>$field):?>
                        <li data-id="<?=$name?>" id="li_<?=$name?>">
                            <div class="drag-item">
                                <span class="drag-icon"><i class="fa fa-ellipsis-v"></i><i class="fa fa-ellipsis-v"></i></span>
                                <div class="drag-name">
                                    <?=$name?>
                                    <span class="label label-info "><?=$field['type']?></span>
                                    <span class="label label-info "><?=($field['required'])?__('required'):NULL?></span>
                                    <span class="label label-info "><?=(isset($field['searchable']) AND $field['searchable'])?__('Searchable'):NULL?></span>
                                    <span class="label label-info "><?=(isset($field['show_profile']) AND $field['show_profile'])?__('Show profile'):NULL?></span>
                                    <span class="label label-info "><?=(isset($field['show_register']) AND $field['show_register'])?__('Show register'):NULL?></span>
                                    <span class="label label-info "><?=(isset($field['admin_privilege']) AND $field['admin_privilege'])?__('Only Admin'):NULL?></span>
                                </div>
                                <a class="drag-action ajax-load" title="<?=__('Edit')?>"
                                    href="<?=Route::url('oc-panel',array('controller'=>'userfields','action'=>'update','id'=>$name))?>">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>
                                <a
                                    href="<?=Route::url('oc-panel', array('controller'=> 'userfields', 'action'=>'delete','id'=>$name))?>"
                                    class="drag-action index-delete"
                                    title="<?=__('Are you sure you want to delete? All data contained in this field will be deleted.')?>"
                                    data-id="li_<?=$name?>"
                                    data-placement="left"
                                    data-href="<?=Route::url('oc-panel', array('controller'=> 'fields', 'action'=>'delete','id'=>$name))?>"
                                    data-btnOkLabel="<?=__('Yes, definitely!')?>"
                                    data-btnCancelLabel="<?=__('No way!')?>">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </div>
                        </li>
                    <?endforeach?>
                <?endif?>
                </ol><!--ol_1-->
                <span id='ajax_result' data-url='<?=Route::url('oc-panel',array('controller'=>'userfields','action'=>'saveorder'))?>'></span>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


</div>
