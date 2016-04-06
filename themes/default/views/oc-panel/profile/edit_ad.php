<?php defined('SYSPATH') or die('No direct script access.'); ?>

<?= Breadcrumbs::render('breadcrumbs') ?>
<?= Alert::show() ?>
<?= Form::errors() ?>

<div class="uk-container uk-container-center new-ad-form">
    <div class="uk-grid">
        <div class="uk-width-medium-7-10 uk-width-small-1-1 uk-container-center">
            <h3 class="uk-text-bold uk-text-center"><?= __('Update advertisement') ?></h3>
            <hr>
            <?= FORM::open(Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)), array('class' => 'uk-form uk-form-stacked post_new', 'enctype' => 'multipart/form-data')) ?>
            <fieldset>
                <div class="uk-grid">
                    <div class="uk-width1-1-1">
                        <?= FORM::label('title', __('Title'), array('class' => 'uk-form-label', 'for' => 'title')) ?>
                        <?= FORM::input('title', $ad->title, array('placeholder' => __('Title'), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'title', 'required')) ?>
                    </div>
                </div>

                <!-- category select -->
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <?= FORM::label('category', __('Category'), array('class' => 'uk-form-label', 'for' => 'category')) ?>
                        <div id="category-chained" class="uk-grid uk-hidden ?>"
                             data-apiurl="<?= Route::url('api', array('version' => 'v1', 'format' => 'json', 'controller' => 'categories')) ?>"
                             data-price0="<?= i18n::money_format(0) ?>"
                             <?= (core::config('advertisement.parent_category')) ? 'data-isparent' : NULL ?>
                             >
                            <div id="select-category-template" class="uk-width-1-1 uk-hidden">
                                <select class="disable-chosen select-category" placeholder="<?= __('Pick a category...') ?>"></select>
                            </div>
                            <div id="paid-category" class="uk-width1-1-1 uk-hidden">
                                <span class="uk-form-help-block" data-title="<?= __('Category %s is a paid category: %d') ?>"><span class="text-warning"></span></span>
                            </div>
                        </div>
                        <div id="category-edit" class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="<?= $ad->category->name ?>" disabled>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" style="padding-top:4px; padding-bottom:4px;"><?= __('Edit category') ?></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <input id="category-selected" name="category" value="<?= $ad->id_category ?>" class="uk-width-1-1 uk-form-large uk-invisible" style="height: 0; padding:0; width:1px; border:0;" required></input>
                    </div>


                    <div class="uk-width-1-2">
                        <?= FORM::label('locations', __('Location'), array('class' => 'uk-form-label', 'for' => 'location')) ?>
                        <div id="location-chained" class="uk-grid uk-hidden" data-apiurl="<?= Route::url('api', array('version' => 'v1', 'format' => 'json', 'controller' => 'locations')) ?>">
                            <div id="select-location-template" class="uk-width-1-1 uk-hidden">
                                <select class="disable-chosen select-location" placeholder="<?= __('Pick a location...') ?>"></select>
                            </div>
                        </div>
                        <div id="location-edit" class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="input-group">
                                    <input class="form-control" type="text" placeholder="<?= $ad->location->name ?>" disabled>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" style="padding-top:4px; padding-bottom:4px;"><?= __('Edit location') ?></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <input id="location-selected" name="location" value="<?= $ad->id_location ?>" class="uk-width-1-1 uk-form-large uk-invisible" style="height: 0; padding:0; width:1px; border:0;" required></input>
                    </div>
                </div>
                <!-- location select -->

                <?if(core::config('advertisement.description') != FALSE):?>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <?= FORM::label('description', __('Description'), array('class' => 'uk-form-label', 'for' => 'description', 'spellcheck' => TRUE)) ?>
                        <?= FORM::textarea('description', $ad->description, array('class' => 'summernote uk-width-1-1 uk-form-large' . ((Core::config("advertisement.description_bbcode")) ? NULL : ' disable-bbcode'), 'name' => 'description', 'id' => 'description', 'rows' => 10, 'required')) ?>
                    </div>
                </div>
                <?endif?>

                <div class="uk-grid">
                    <div class="uk-width1-1-1 images"
                         data-max-image-size="<?= core::config('image.max_image_size') ?>"
                         data-image-width="<?= core::config('image.width') ?>"
                         data-image-height="<?= core::config('image.height') ? core::config('image.height') : 0 ?>"
                         data-image-quality="<?= core::config('image.quality') ?>"
                         data-swaltext="<?= sprintf(__('Is not of valid size. Size is limited to %s MB per image'), core::config('image.max_image_size')) ?>">
                        <label class="uk-form-label"><?= __('Images') ?></label>
                        <div class="uk-grid">
                            <?$images = $ad->get_images()?>
                            <?if($images):?>
                            <?foreach ($images as $key => $value):?>
                            <?if(isset($value['thumb'])): // only formated images (not originals)?>
                            <div id="img<?= $key ?>" class="uk-width-1-4 edit-image">
                                <a><img src="<?= $value['thumb'] ?>" class="img-rounded thumbnail"></a>
                                <button class="uk-button uk-button-mini uk-button-danger index-delete img-delete"
                                        data-title="<?= __('Are you sure you want to delete?') ?>"
                                        data-btnOkLabel="<?= __('Yes, definitely!') ?>"
                                        data-btnCancelLabel="<?= __('No way!') ?>"
                                        type="submit"
                                        name="img_delete"
                                        value="<?= $key ?>"
                                        href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"
                                        title="<?= __('Delete image') ?>">
                                            <?= __('Delete') ?>
                                </button>
                                <?if ($key > 1) :?>
                                <button class="uk-button uk-button-mini uk-button-info img-primary"
                                        type="submit"
                                        name="primary_image"
                                        value="<?= $key ?>"
                                        title="<?= __('Set image as primary') ?>"
                                        href="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"
                                        action="<?= Route::url('oc-panel', array('controller' => 'myads', 'action' => 'update', 'id' => $ad->id_ad)) ?>"
                                        >
                                            <?= __('Primary') ?>
                                </button>
                                <?endif?>
                            </div>
                            <?endif?>
                            <?endforeach?>
                            <?endif?>
                        </div>
                    </div>
                </div>

                <div class="uk-grid">
                    <?if (core::config('advertisement.num_images') > count($images)):?> <!-- permition to add more images-->
                    <div class="uk-width-2-3">
                        <input type="file" name="image0" id="fileInput0" accept="<?= 'image/' . str_replace(',', ', image/', rtrim(core::config('image.allowed_formats'), ',')) ?>">
                    </div>
                    <?endif?>
                </div>

                <div class="uk-grid">
                    <div class="uk-width1-1-1">
                        <?= FORM::label('videos', __('Video'), array('class' => 'uk-form-label', 'for' => 'videos')) ?>
                        <?
                        $videos = $ad->get_videos();
                        for ($i=0; $i < core::config("advertisement.num_videos") ; $i++):?>
                        <?= FORM::input("video_{$i}", $videos[$i], array('class' => 'uk-width-1-1 uk-form-large uk-margin-small-bottom', 'placeholder' => __('Enter video url here'))) ?>
                        <?endfor?>
                    </div>
                </div>

                <div class="uk-grid">
                    <?if(core::config('advertisement.phone') != FALSE):?>
                    <div class="uk-width-1-2">
                        <?= FORM::label('phone', __('Phone'), array('class' => 'uk-form-label', 'for' => 'phone')) ?>
                        <?= FORM::input('phone', $ad->phone, array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'phone', 'placeholder' => __('Phone'))) ?>
                    </div>
                    <?endif?>
                    <?if(core::config('advertisement.price') != FALSE):?>
                    <div class="uk-width-1-2">
                        <?= FORM::label('price', __('Price'), array('class' => 'uk-form-label', 'for' => 'price')) ?>
                        <div class="input-prepend">
                            <?= FORM::input('price', $ad->price, array('placeholder' => html_entity_decode(i18n::money_format(1)), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'price', 'type' => 'text', 'data-error' => __('Please enter only numbers.'))) ?>
                        </div>
                    </div>
                    <?endif?>
                </div>

                <?if(core::config('advertisement.address') != FALSE):?>
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <?= FORM::label('address', __('Address'), array('class' => 'uk-form-label', 'for' => 'address')) ?>
                        <?if(core::config('advertisement.map_pub_new')):?>
                        <?= FORM::input('address', $ad->address, array('class' => 'uk-width-5-6', 'id' => 'address', 'placeholder' => __('Address'))) ?>
                        <button class="uk-button uk-button-default locateme" type="button"><i class="uk-icon-wifi"></i></button>
                        <?else:?>
                        <?= FORM::input('address', $ad->address, array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'address', 'placeholder' => __('Address'))) ?>
                        <?endif?>
                    </div>
                    <?if(core::config('advertisement.map_pub_new')):?>
                    <div class="uk-width-1-2 popin-map-container">
                        <div class="map-inner" id="map"
                             data-lat="<?= core::config('advertisement.center_lat') ?>"
                             data-lon="<?= core::config('advertisement.center_lon') ?>"
                             data-zoom="<?= core::config('advertisement.map_zoom') ?>"
                             style="height:200px;max-width:400px;">
                        </div>
                    </div>
                    <input type="hidden" name="latitude" id="publish-latitude" value="<?= $ad->latitude ?>" <?= is_null($ad->latitude) ? 'disabled' : NULL ?>>
                    <input type="hidden" name="longitude" id="publish-longitude" value="<?= $ad->longitude ?>" <?= is_null($ad->longitude) ? 'disabled' : NULL ?>>
                    <?endif?>
                </div>
                <?endif?>
                <?if(core::config('payment.stock')):?>
                <div class="uk-grid">
                    <div class="uk-width1-1-1">
                        <?= FORM::label('stock', __('In Stock'), array('class' => 'uk-form-label', 'for' => 'stock')) ?>
                        <div class="input-prepend">
                            <?= FORM::input('stock', $ad->stock, array('placeholder' => '10', 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'stock', 'type' => 'text')) ?>
                        </div>
                    </div>
                </div>
                <?endif?>
                <?if(core::config('advertisement.website') != FALSE):?>
                <div class="uk-grid uk-hidden">
                    <div class="uk-width1-1-1">
                        <?= FORM::label('website', __('Website'), array('class' => 'uk-form-label', 'for' => 'website')) ?>
                        <?= FORM::input('website', $ad->website, array('placeholder' => core::config("general.base_url"), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'website')) ?>
                    </div>
                </div>
                <?endif?>

                <?if(core::config('advertisement.tos') != ''):?>
                <div class="uk-grid">
                    <div class="uk-width-1-1">
                        <label class="checkbox">
                            <input type="checkbox" required name="tos" id="tos"/>
                            <a target="_blank" href="<?= Route::url('page', array('seotitle' => core::config('advertisement.tos'))) ?>"> <?= __('Terms of service') ?></a>
                        </label>
                    </div>
                </div>
                <?endif?>
                <div class="uk-grid uk-float-right">
                    <div class="uk-width1-1-1">
                        <?= FORM::button('submit_btn', __('Update'), array('type' => 'submit', 'id' => 'publish-new-btn', 'class' => 'uk-button uk-button-primary uk-button-large', 'action' => Route::url('post_new', array('controller' => 'new', 'action' => 'index')))) ?>
                        <?if ( ! Core::config('advertisement.leave_alert')):?>
                        <input type="hidden" name="leave_alert" value="0" disabled>
                        <?endif?>
                    </div>
                </div>
            </fieldset>
            <?= FORM::close() ?>
        </div>
    </div>
</div>
<div class="uk-modal modal-statc uk-fade" id="processing-modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-body">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= __('Processing...') ?></h4>
                </div>
                <div class="modal-body">
                    <div class="progress progress-striped active">
                        <div class="progress-bar" style="width: 100%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>