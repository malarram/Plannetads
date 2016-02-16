<?php defined('SYSPATH') or die('No direct script access.');?>

<div class="page-header">
  <h1><?=__('Black list')?></h1>
  <p><?=__("This is a list of users marked as spammers. To understand how this feature works, please read this article")?></p>
</div>

<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped">
            	<thead>
                <tr>
                  	<th><?=__('Name')?></th>
                  	<th><?=__('Email')?></th>
                  	<th><?=__('Action')?></th>
                </tr>
             </thead>
        	<tbody>
        		<?foreach ($black_list as $user):?>
                <tr>
                  	<td><?=$user->name?></td>
                  	<td><?=$user->email?></td>
                  	<td><a href="<?=Route::url('oc-panel', array('controller'=>'pool','action'=>'remove','id'=>$user->id_user))?>"
                  		   class="btn btn-info"><?=__('Remove')?></a></td>
                </tr>
                <?endforeach?>
            </tbody>
        </table>
    </div>
</div>