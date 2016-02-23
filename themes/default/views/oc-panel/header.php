<?php defined('SYSPATH') or die('No direct script access.');?>
<header class="navbar navbar-default navbar-fixed-top bs-docs-nav">
    <div class="header-container">
        <div class="navbar-header">        </div>

            <button class="navbar-toggle pull-left" type="button" data-toggle="collapse" id="mobile_header_btn">
                <span class="sr-only"><?=__('Toggle navigation')?></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand ajax-load" href="<?=(Auth::instance()->get_user()->id_role!=Model_Role::ROLE_ADMIN) ? Route::url('oc-panel',array('controller'=>'myads','action'=>'index')) : Route::url('oc-panel',array('controller'=>'home'))?>" title="<?=__('Panel')?>">
                <img src="<?=core::config('general.base_url')?>/themes/default/img/admin/logo@2x.png" width="160" alt="" />
            </a>
            <div class="btn-group pull-right ml-20">
                <?=View::factory('oc-panel/widget_login')?>
            </div>

            <div class="navbar-collapse collapse" id="mobile-menu-panel">
                <ul class="nav navbar-nav hidden-sm">
                    <? if(core::config('general.moderation') == 1 OR // moderation on
                          core::config('general.moderation') == 4 OR // email confiramtion with moderation
                          core::config('general.moderation') == 5):  // payment with moderation?>
                    <?=Theme::admin_link(__('Moderation'),'ad','moderate','oc-panel','glyphicon glyphicon-ban-circle')?>
                    <? endif?>
                	<? // Theme::admin_link(__('Stats'),'stats','index','oc-panel','glyphicon glyphicon-align-left')?>
                    <? //Theme::admin_link(__('Widgets'),'widget','index','oc-panel','glyphicon glyphicon-move')?>
                    <? if(Auth::instance()->get_user()->id_role==Model_Role::ROLE_ADMIN):?>
<!--                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="glyphicon glyphicon-cog"></i> <?=__('Cache')?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <?=Theme::admin_link(__('Cache'),'tools','cache','oc-panel','glyphicon glyphicon-cog')?>
                            <li>
                                <a class="ajax-load" title="<?=__('Delete all')?>" href="<?=Route::url('oc-panel',array('controller'=>'tools','action'=>'cache')).'?force=1'?>">
                                    <i class="glyphicon glyphicon-remove-sign"></i> <span class="side-name-link"><?=__('Delete all')?></span>
                                </a>
                            </li>
                            <li>
                                <a class="ajax-load" title="<?=__('Delete expired')?>" href="<?=Route::url('oc-panel',array('controller'=>'tools','action'=>'cache')).'?force=2'?>">
                                    <i class="glyphicon glyphicon-remove-circle"></i> <span class="side-name-link"><?=__('Delete expired')?></span>
                                </a>
                            </li>
                        </ul>
                    </li>-->
            	    <li  class="dropdown ">
                        <a href="#" class="dropdown-toggle"
            		      data-toggle="dropdown"><i class="glyphicon glyphicon-plus"></i> <?=__('New')?> <b class="caret"></b></a>
                    	<ul class="dropdown-menu">
                            <?=Theme::admin_link(__('Category'),'category','create')?>
                            <?=Theme::admin_link(__('Location'),'location','create')?>
                            <? //Theme::admin_link(__('Blog post'),'blog','create')?>
                            <?=Theme::admin_link(__('FAQ'),'content','create?type=help&locale_select='.core::config('i18n.locale'),'oc-panel')?>
                            <? //Theme::admin_link(__('Page'), 'content','create?type=page&locale_select='.core::config('i18n.locale'),'oc-panel')?>
                            <?if (Core::config('advertisement.only_admin_post')!=1 OR Auth::instance()->get_user()->id_role == Model_Role::ROLE_ADMIN):?>
                            <li class="divider"></li>
                    		<li><a href="<?=Route::url('post_new')?>">
                    			<i class="glyphicon  glyphicon-pencil"></i> <?=__('Publish new')?></a>
                                </li>
                            <?endif?>
                    	</ul>
            	   </li>
                   <?else:?>
                   <?if (Core::config('advertisement.only_admin_post')!=1):?>
                    <li><a href="<?=Route::url('post_new')?>">
                                <i class="glyphicon glyphicon-pencil"></i> <?=__('Publish new')?></a>
                    </li>
                    <?endif?>
                   <?endif?>
                </ul>
                <div class=""></div>
                <ul class="nav navbar-nav navbar-right">
                    <li id="visit-website">
                        <a href="<?=Route::url('default')?>">
                            <i class="glyphicon-home glyphicon"></i>
                            <?if (Auth::instance()->get_user()->id_role != Model_Role::ROLE_USER):?>
	                            <?=__('Go to Your Website')?>
                            <?else:?>
	                            <?=__('Go to Website')?>
                            <?endif?>
                        </a>
                    </li>
                </ul>
            </div> <!--/.nav-collapse -->
    </div><!--/. -->
</header><!--/.navbar -->
