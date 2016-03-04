<?php defined('SYSPATH') or die('No direct script access.');?>

<a class="btn btn-primary pull-right ajax-load"
    href="<?=Route::url('oc-panel', array('controller'=>'content','action'=>'create')).'?type=' ?>"
    rel="tooltip" title="<?=__('New')?>">
    <?=__('New')?>
</a>

<div class="page-header">
    <h1><?=$title?></h1>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <?if (count($contacts)>0):?>
            <table class="table table-bordered">
                <tr>
                    <th><?=__('Name')?></th>
                    <th><?=__('contact_subject')?></th>
                    <th><?=__('contact_message')?></th>
                    <th><?=__('Actions')?></th>
                </tr>
                <?foreach ($contacts as $contact):?>
                        <tr id="tr<?=$contact->id_contact?>">
                            <td>
                                        <?
                                        if ($contact->contact_name):
                                            echo $contact->contact_name;
                                        else:
                                            echo $contact->contact_email;
                                        endif
                                        ?>
                            </td>
                            <td><?=$contact->contact_subject?></td>
                            <td><?=  substr($contact->contact_message,0,100)?>...</td>
                            <td width="10%">
                                <a class="btn btn-xs btn-primary ajax-load"
                                    href="<?=Route::url('oc-panel', array('controller'=>'content','action'=>'viewcontact','id'=>$contact->id_contact))?>"
                                    rel="tooltip" title="<?=__('View')?>">
                                    <i class="glyphicon glyphicon-eye-open"></i>
                                </a>
                                <a
                                    href="<?=Route::url('oc-panel', array('controller'=>'content','action'=>'delete','id'=>$contact->id_contact))?>"
                                    class="btn btn-xs btn-danger index-delete hidden"
                                    style="margin-top: 0;"
                                    title="<?=__('Are you sure you want to delete?')?>"
                                    data-id="tr<?=$contact->id_contact?>"
                                    data-btnOkLabel="<?=__('Yes, definitely!')?>"
                                    data-btnCancelLabel="<?=__('No way!')?>">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </a>
                            </td>
                        </tr>
                <?endforeach?>
            </table>
        <?endif?>
    </div>
</div>