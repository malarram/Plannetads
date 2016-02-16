<?php defined('SYSPATH') or die('No direct script access.');?>
<?=Form::errors()?>
<?if (Request::current()->query()):?>
    <?if (count($ads)>0):?>
        <?=View::factory('pages/ad/listing',array('pagination'=>$pagination,'ads'=>$ads,'category'=>NULL, 'location'=>NULL, 'user'=>$user, 'featured'=>NULL))?>
    <?else:?>
        <h3><?=__('Your search did not match any ads.')?></h3>
    <?endif?>
<?endif?>