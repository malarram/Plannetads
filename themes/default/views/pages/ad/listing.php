<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?php __('dsdsd') ?>
<?= View::factory('top_search') ?>
<?= Breadcrumbs::render('breadcrumbs') ?>
<div class="uk-container uk-container-center">
    <div class="uk-grid">
        <?= View::factory('sidebar_category') ?>

        <div class="uk-width-large-8-10 uk-width-medium-7-10">
            <?
            if ($category!==NULL):
                $listing_title = __('Listings for '.$category->name);
            elseif ($location!==NULL):
                $listing_title = __('Listings for '.$location->name);
            else:
                $listing_title = __('Search results for "{TITLE}"',array('{TITLE}' => core::get('title')));
            endif
            ?>
            <h3 class="text-bolder"> <?=$listing_title?></h3>
            <!-- Sponsors ads -->
            <?=View::factory('top_sponsors')?>

            <!-- Cateogry listing -->
            <div class="uk-block">

                <?if(count($ads)):?>
                <div class="btn-group pull-right uk-hidden">
                    <?if(core::config('general.auto_locate')):?>
                    <button
                        class="btn btn-sm btn-default <?= core::request('userpos') == 1 ? 'active' : NULL ?>"
                        id="myLocationBtn"
                        type="button"
                        data-toggle="modal"
                        data-target="#myLocation"
                        data-marker-title="<?= __('My Location') ?>"
                        data-marker-error="<?= __('Cannot determine address at this location.') ?>"
                        data-href="?<?= http_build_query(['userpos' => 1] + Request::current()->query()) ?>">
                        <i class="glyphicon glyphicon-map-marker"></i> <?= sprintf(__('%s from you'), i18n::format_measurement(Core::config('advertisement.auto_locate_distance', 1))) ?>
                    </button>
                    <?endif?>
                    <?if (core::config('advertisement.map')==1):?>
                    <a href="<?= Route::url('map') ?>?category=<?= Model_Category::current()->loaded() ? Model_Category::current()->seoname : NULL ?>&location=<?= Model_Location::current()->loaded() ? Model_Location::current()->seoname : NULL ?>"
                       class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-globe"></span> <?= __('Map') ?>
                    </a>
                    <?endif?>
                    <button type="button" id="sort" data-sort="<?= core::request('sort') ?>" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-list-alt"></span> <?= __('Sort') ?> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" id="sort-list">
                        <li><a href="?<?= http_build_query(['sort' => 'title-asc'] + Request::current()->query()) ?>"><?= __('Name (A-Z)') ?></a></li>
                        <li><a href="?<?= http_build_query(['sort' => 'title-desc'] + Request::current()->query()) ?>"><?= __('Name (Z-A)') ?></a></li>
                        <?if(core::config('advertisement.price')!=FALSE):?>
                        <li><a href="?<?= http_build_query(['sort' => 'price-asc'] + Request::current()->query()) ?>"><?= __('Price (Low)') ?></a></li>
                        <li><a href="?<?= http_build_query(['sort' => 'price-desc'] + Request::current()->query()) ?>"><?= __('Price (High)') ?></a></li>
                        <?endif?>
                        <li><a href="?<?= http_build_query(['sort' => 'featured'] + Request::current()->query()) ?>"><?= __('Featured') ?></a></li>
                        <li><a href="?<?= http_build_query(['sort' => 'favorited'] + Request::current()->query()) ?>"><?= __('Favorited') ?></a></li>
                        <?if(core::config('general.auto_locate')):?>
                        <li><a href="?<?= http_build_query(['sort' => 'distance'] + Request::current()->query()) ?>" id="sort-distance"><?= __('Distance') ?></a></li>
                        <?endif?>
                        <li><a href="?<?= http_build_query(['sort' => 'published-desc'] + Request::current()->query()) ?>"><?= __('Newest') ?></a></li>
                        <li><a href="?<?= http_build_query(['sort' => 'published-asc'] + Request::current()->query()) ?>"><?= __('Oldest') ?></a></li>
                    </ul>
                </div>

                <?foreach($ads as $ad ):?>
                <?
                $addt_class = '';
                /* if($ad->featured >= Date::unix2mysql(time())):
                    $addt_class = 'featured';
                endif;
                */
                ?>
                <div class="listings uk-grid favorite <?= $addt_class ?>" id="fav-<?= $ad->id_ad ?>">
                    <div class="uk-width-medium-2-10 uk-width-small-3-10">
                        <a class="uk-thumbnail" title="<?= HTML::chars($ad->title) ?>" href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                            <?if($ad->get_first_image() !== NULL):?>
                            <img src="<?= $ad->get_first_image() ?>" alt="<?= HTML::chars($ad->title) ?>" />
                            <?elseif(( $icon_src = $ad->category->get_icon() )!==FALSE ):?>
                            <img src="<?= $icon_src ?>" class="img-responsive" alt="<?= HTML::chars($ad->title) ?>" />
                            <?elseif(( $icon_src = $ad->location->get_icon() )!==FALSE ):?>
                            <img src="<?= $icon_src ?>" class="img-responsive" alt="<?= HTML::chars($ad->title) ?>" />
                            <?else:?>
                            <img src="<?= URL::base() . 'themes/default/images/default-ad-thumb.jpg' ?>" class="img-responsive" alt="<?= HTML::chars($ad->title) ?>">
                            <?endif?>
                        </a>
                    </div>
                    <div class="uk-width-medium-7-10 uk-width-small-5-10">
                        <h5 class="text-bold">
                            <a title="<?= HTML::chars($ad->title) ?>" href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>">
                                <?= $ad->title ?>
                            </a>
                        </h5>
                        <?if(core::config('advertisement.description')!=FALSE):?>
                        <p><?= Text::limit_chars(Text::removebbcode($ad->description), 255, NULL, TRUE); ?></p>
                        <?endif?>
                    </div>
                    <div class="uk-width-medium-1-10 uk-width-small-2-10 uk-text-middle"><?= i18n::money_format($ad->price) ?></div>
                </div>


                <div class="pull-right uk-hidden">
                    <?if (Auth::instance()->logged_in()):?>
                    <?$fav = Model_Favorite::is_favorite($user,$ad);?>
                    <a data-id="fav-<?= $ad->id_ad ?>" class="add-favorite <?= ($fav) ? 'remove-favorite' : '' ?>" title="<?= __('Add to Favorites') ?>" href="<?= Route::url('oc-panel', array('controller' => 'profile', 'action' => 'favorites', 'id' => $ad->id_ad)) ?>">
                        <i class="glyphicon glyphicon-heart<?= ($fav) ? '' : '-empty' ?>"></i>
                    </a>
                    <?else:?>
                    <a data-toggle="modal" data-dismiss="modal" href="<?= Route::url('oc-panel', array('directory' => 'user', 'controller' => 'auth', 'action' => 'login')) ?>#login-modal">
                        <i class="glyphicon glyphicon-heart-empty"></i>
                    </a>
                    <?endif?>

                    <?if($ad->id_location != 1):?>
                    <a href="<?= Route::url('list', array('location' => $ad->location->seoname)) ?>" title="<?= HTML::chars($ad->location->name) ?>">
                        <span class="label label-default"><?= $ad->location->name ?></span>
                    </a>
                    <?endif?>


                    <ul>
                        <?if (core::request('sort') == 'distance' AND Model_User::get_userlatlng()) :?>
                        <li><b><?= __('Distance'); ?>:</b> <?= i18n::format_measurement($ad->distance) ?></li>
                        <?endif?>
                        <?if ($ad->published!=0){?>
                        <li><b><?= __('Publish Date'); ?>:</b> <?= Date::format($ad->published, core::config('general.date_format')) ?></li>
                        <? }?>
                        <?if ($ad->price!=0){?>
                        <li class="price"><?= __('Price'); ?>: <b><?= i18n::money_format($ad->price) ?></b></li>
                        <?}?>
                    </ul>

                    <a title="<?= HTML::chars($ad->seotitle); ?>" href="<?= Route::url('ad', array('controller' => 'ad', 'category' => $ad->category->seoname, 'seotitle' => $ad->seotitle)) ?>"><i class="glyphicon glyphicon-share"></i><?= __('Read more') ?></a>
                    <?if ($user !== NULL AND ($user->id_role == Model_Role::ROLE_ADMIN OR $user->id_role == Model_Role::ROLE_MODERATOR )):?>
                    <br />
                    <div class="toolbar btn btn-primary btn-xs"><i class="glyphicon glyphicon-cog"></i>
                        <div id="user-toolbar-options<?= $ad->id_ad ?>" class="hide user-toolbar-options">
                            <a class="btn btn-primary btn-xs" href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"><i class="glyphicon glyphicon-edit"></i> <?= __("Edit"); ?></a> |
                            <a class="btn btn-primary btn-xs" href="<?= Route::url('oc-panel', array('controller' => 'ad', 'action' => 'deactivate', 'id' => $ad->id_ad)) ?>"
                               onclick="return confirm('<?= __('Deactivate?') ?>');"><i class="glyphicon glyphicon-off"></i><?= __("Deactivate"); ?>
                            </a> |
                            <a class="btn btn-primary btn-xs" href="<?= Route::url('oc-panel', array('controller' => 'ad', 'action' => 'spam', 'id' => $ad->id_ad)) ?>"
                               onclick="return confirm('<?= __('Spam?') ?>');"><i class="glyphicon glyphicon-fire"></i><?= __("Spam"); ?>
                            </a> |
                            <a class="btn btn-primary btn-xs" href="<?= Route::url('oc-panel', array('controller' => 'ad', 'action' => 'delete', 'id' => $ad->id_ad)) ?>"
                               onclick="return confirm('<?= __('Delete?') ?>');"><i class="glyphicon glyphicon-remove"></i><?= __("Delete"); ?>
                            </a>

                        </div>
                    </div>
                    <?elseif($user !== NULL && $user->id_user == $ad->id_user):?>

                    <br/>
                    <div class="toolbar btn btn-primary btn-xs"><i class="glyphicon glyphicon-cog"></i>
                        <div id="user-toolbar-options<?= $ad->id_ad ?>" class="hide user-toolbar-options">
                            <a class="btn btn-primary btn-xs" href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"><i class="glyphicon glyphicon-edit"></i><?= __("Edit"); ?></a> |
                            <a class="btn btn-primary btn-xs" href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'deactivate', 'id' => $ad->id_ad)) ?>"
                               onclick="return confirm('<?= __('Deactivate?') ?>');"><i class="glyphicon glyphicon-off"></i><?= __("Deactivate"); ?>
                            </a>
                        </div>
                    </div>
                    <?endif?>
                </div>

                <?endforeach?>


                <?else:?>
                <div class="no-listings uk-grid">
                    <div class="uk-width-medium-1-1">
                        <h3><?= __('We do not have any advertisements in this category') ?></h3>
                    </div>
                </div>
                <?endif?>
            </div>
            <?= $pagination ?>
        </div>
    </div>
</div>
