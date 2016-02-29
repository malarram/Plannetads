<?php defined('SYSPATH') or die('No direct script access.'); ?>
<?= Breadcrumbs::render('breadcrumbs') ?>

<?= Alert::show() ?>
<div class="uk-container uk-container-center new-ad-form">
    <div class="uk-grid">
        <div class="uk-width-medium-7-10 uk-width-small-1-1 uk-container-center">
            <div class="uk-accordion" data-uk-accordion>
                <div class="uk-position-relative">
                    <a href="#" class="edit-btn-link uk-button-link uk-button uk-position-absolute uk-position-top-right">edit</a>
                    <h3 class="uk-accordion-title"><span class="steps active"><?= __('Publish new advertisement') ?></h3>
                </div>

                <div class="uk-accordion-content">
                    <?= FORM::open(Route::url('post_new', array('controller' => 'new', 'action' => 'index')), array('class' => 'uk-form uk-form-stacked post_new', 'id' => 'publish-new', 'enctype' => 'multipart/form-data')) ?>
                    <fieldset>
                        <div class="uk-grid">
                            <div class="uk-width1-1-1">
                                <?= FORM::label('title', __('Title'), array('class' => 'uk-form-label', 'for' => 'title')) ?>
                                <?= FORM::input('title', Request::current()->post('title'), array('placeholder' => __('Title'), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'title', 'required')) ?>
                            </div>
                        </div>

                        <!-- category select -->
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <?= FORM::label('category', __('Category'), array('class' => 'uk-form-label', 'for' => 'category')) ?>
                                <div id="category-chained" class="uk-grid <?= ($id_category === NULL) ? NULL : 'uk-hidden' ?>"
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
                                <?if($id_category !== NULL):?>
                                <div id="category-edit" class="uk-grid">
                                    <div class="uk-width-2-3">
                                        <div class="input-group">
                                            <input class="uk-width-1-1 uk-form-large" type="text" placeholder="<?= $selected_category->name ?>" disabled>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><?= __('Select another') ?></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?endif?>
                                <input id="category-selected" name="category" value="<?= $id_category ?>" class="uk-width-1-1 uk-form-large uk-invisible" style="height: 0; padding:0; width:1px; border:0;" required></input>
                            </div>


                            <?if($form_show['location'] != FALSE):?>
                            <div class="uk-width-1-2">
                                <?= FORM::label('locations', __('Location'), array('class' => 'uk-form-label', 'for' => 'location')) ?>
                                <div id="location-chained" class="uk-grid <?= ($id_location === NULL) ? NULL : 'uk-hidden' ?>" data-apiurl="<?= Route::url('api', array('version' => 'v1', 'format' => 'json', 'controller' => 'locations')) ?>">
                                    <div id="select-location-template" class="uk-width-1-1 uk-hidden">
                                        <select class="disable-chosen select-location" placeholder="<?= __('Pick a location...') ?>"></select>
                                    </div>
                                </div>
                                <?if($id_location !== NULL):?>
                                <div id="location-edit" class="uk-grid">
                                    <div class="uk-width-2-3">
                                        <div class="input-group">
                                            <input class="uk-width-1-1 uk-form-large" type="text" placeholder="<?= $selected_location->name ?>" disabled>
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button"><?= __('Select another') ?></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <?endif?>
                                <input id="location-selected" name="location" value="<?= $id_location ?>" class="uk-width-1-1 uk-form-large uk-invisible" style="height: 0; padding:0; width:1px; border:0;" required></input>
                            </div>
                            <?endif?>
                        </div>

                        <!-- location select -->


                        <?if($form_show['description'] != FALSE):?>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <?= FORM::label('description', __('Description'), array('class' => 'uk-form-label', 'for' => 'description', 'spellcheck' => TRUE)) ?>
                                <?= FORM::textarea('description', Request::current()->post('description'), array('class' => 'summernote uk-width-1-1 uk-form-large' . ((Core::config("advertisement.description_bbcode")) ? NULL : ' disable-bbcode'), 'name' => 'description', 'id' => 'description', 'rows' => 10, 'required')) ?>
                            </div>
                        </div>
                        <?endif?>

                        <?if(core::config("advertisement.num_images") > 0 ):?>
                        <div class="uk-grid images"
                             data-max-image-size="<?= core::config('image.max_image_size') ?>"
                             data-image-width="<?= core::config('image.width') ?>"
                             data-image-height="<?= core::config('image.height') ? core::config('image.height') : 0 ?>"
                             data-image-quality="<?= core::config('image.quality') ?>"
                             data-swaltext="<?= sprintf(__('Is not of valid size. Size is limited to %s MB per image'), core::config('image.max_image_size')) ?>"
                             >
                            <div class="uk-width1-1-1">
                                <label class="uk-form-label"><?= __('Images') ?></label>
                                <div class="uk-grid">
                                    <div class="uk-width1-1-1">
                                        <?for ($i=0; $i < core::config("advertisement.num_images") ; $i++):?>
                                        <div class="fileinput fileinput-new <?= ($i >= 1) ? 'uk-hidden' : NULL ?>" data-provides="fileinput">
                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                            <div>
                                                <span class="uk-button btn-file">
                                                    <span class="fileinput-new"><?= __('Select') ?></span>
                                                    <span class="fileinput-exists"><?= __('Edit') ?></span>
                                                    <input type="file" name="<?= 'image' . $i ?>" id="<?= 'fileInput' . $i ?>" accept="<?= 'image/' . str_replace(',', ', image/', rtrim(core::config('image.allowed_formats'), ',')) ?>">
                                                </span>
                                                <a href="#" class="uk-button fileinput-exists" data-dismiss="fileinput"><?= __('Delete') ?></a>
                                            </div>
                                        </div>
                                        <?endfor?>
                                    </div>
                                </div>
                                <p class="uk-form-help-block">
                                    <?= __('Up to') ?> <?= core::config('advertisement.num_images') ?> <?= __('images allowed.') ?>
                                    <?= join(' ' . __('or') . ' ', array_filter(array_merge(array(join(', ', array_slice(array_map('strtoupper', explode(',', core::config('image.allowed_formats'))), 0, -2))), array_slice(array_map('strtoupper', explode(',', core::config('image.allowed_formats'))), -2)))) ?> <?= __('formats only') ?>.
                                    <?= __('Maximum file size of') ?> <?= core::config('image.max_image_size') ?>MB.
                                </p>
                            </div>
                        </div>
                        <?endif?>

                        <div class="uk-grid">
                            <?if($form_show['phone'] != FALSE):?>
                            <div class="uk-width-1-2">
                                <?= FORM::label('phone', __('Phone'), array('class' => 'uk-form-label', 'for' => 'phone')) ?>
                                <?= FORM::input('phone', Request::current()->post('phone'), array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'phone', 'placeholder' => __('Phone'))) ?>
                            </div>
                            <?endif?>
                            <?if($form_show['price'] != FALSE):?>
                            <div class="uk-width-1-2">
                                <?= FORM::label('price', __('Price'), array('class' => 'uk-form-label', 'for' => 'price')) ?>
                                <div class="input-prepend">
                                    <?= FORM::input('price', Request::current()->post('price'), array('placeholder' => html_entity_decode(i18n::money_format(1)), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'price', 'type' => 'text', 'data-error' => __('Please enter only numbers.'))) ?>
                                </div>
                            </div>
                            <?endif?>
                        </div>

                        <?if($form_show['address'] != FALSE):?>
                        <div class="uk-grid">
                            <div class="uk-width1-1-1">
                                <?= FORM::label('address', __('Address'), array('class' => 'uk-form-label', 'for' => 'address')) ?>
                                <?if(core::config('advertisement.map_pub_new')):?>
                                <div class="input-group">
                                    <?= FORM::input('address', Request::current()->post('address'), array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'address', 'placeholder' => __('Address'))) ?>
                                    <span class="input-group-btn">
                                        <button class="btn btn-default locateme" type="button"><?= __('Locate me') ?></button>
                                    </span>
                                </div>
                                <?else:?>
                                <?= FORM::input('address', Request::current()->post('address'), array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'address', 'placeholder' => __('Address'))) ?>
                                <?endif?>
                            </div>
                        </div>
                        <?if(core::config('advertisement.map_pub_new')):?>
                        <div class="popin-map-container">
                            <div class="map-inner" id="map"
                                 data-lat="<?= core::config('advertisement.center_lat') ?>"
                                 data-lon="<?= core::config('advertisement.center_lon') ?>"
                                 data-zoom="<?= core::config('advertisement.map_zoom') ?>"
                                 style="height:200px;max-width:400px;">
                            </div>
                        </div>
                        <input type="hidden" name="latitude" id="publish-latitude" value="" disabled>
                        <input type="hidden" name="longitude" id="publish-longitude" value="" disabled>
                        <?endif?>
                        <?endif?>
                        <?if(core::config('payment.stock')):?>
                        <div class="uk-grid">
                            <div class="uk-width1-1-1">
                                <?= FORM::label('stock', __('In Stock'), array('class' => 'uk-form-label', 'for' => 'stock')) ?>
                                <div class="input-prepend">
                                    <?= FORM::input('stock', Request::current()->post('stock'), array('placeholder' => '10', 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'stock', 'type' => 'text')) ?>
                                </div>
                            </div>
                        </div>
                        <?endif?>
                        <?if($form_show['website'] != FALSE):?>
                        <div class="uk-grid">
                            <div class="uk-width1-1-1">
                                <?= FORM::label('website', __('Website'), array('class' => 'uk-form-label', 'for' => 'website')) ?>
                                <?= FORM::input('website', Request::current()->post('website'), array('placeholder' => core::config("general.base_url"), 'class' => 'uk-width-1-1 uk-form-large', 'id' => 'website')) ?>
                            </div>
                        </div>
                        <?endif?>
                        <?if (!Auth::instance()->get_user()):?>
                        <div class="uk-grid">
                            <div class="uk-width-1-2">
                                <?= FORM::label('name', __('Name'), array('class' => 'uk-form-label', 'for' => 'name')) ?>
                                <?= FORM::input('name', Request::current()->post('name'), array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'name', 'required', 'placeholder' => __('Name'))) ?>
                            </div>
                            <div class="uk-width-1-2">
                                <?= FORM::label('email', (core::config('payment.paypal_seller') == 1) ? __('Paypal Email') : __('Email'), array('class' => 'uk-form-label', 'for' => 'email')) ?>
                                <?=
                                FORM::input('email', Request::current()->post('email'), array('class' => 'uk-width-1-1 uk-form-large',
                                    'id' => 'email',
                                    'type' => 'email',
                                    'required',
                                    'placeholder' => (core::config('payment.paypal_seller') == 1) ? __('Paypal Email') : __('Email'),
                                    'data-domain' => (core::config('general.email_domains') != '') ? json_encode(explode(',', core::config('general.email_domains'))) : '',
                                    'data-error' => __('Email must contain a valid email domain')
                                ))
                                ?>
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
                        <?if ($form_show['captcha'] != FALSE):?>
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <?if (Core::config('general.recaptcha_active')):?>
                                <?= Captcha::recaptcha_display() ?>
                                <div id="recaptcha1"></div>
                                <?else:?>
                                <?= FORM::label('captcha', __('Captcha'), array('class' => 'uk-form-label', 'for' => 'captcha')) ?>
                                <div class="uk-grid">
                                    <div class="uk-width-1-6">
                                        <span id="helpBlock" class="uk-form-help-block"><?= captcha::image_tag('publish_new') ?></span>
                                    </div>
                                    <div class="uk-width-2-6">
                                        <?= FORM::input('captcha', "", array('class' => 'uk-width-1-1 uk-form-large', 'id' => 'captcha', 'required', 'data-error' => __('Captcha is not correct'))) ?>
                                    </div>
                                </div>
                                <?endif?>
                            </div>
                        </div>
                        <?endif?>
                        <div class="uk-grid uk-float-right">
                            <div class="uk-width1-1-1">
                                <?= FORM::button('submit_btn', __('Publish new'), array('type' => 'submit', 'id' => 'publish-new-btn', 'class' => 'uk-button uk-button-primary uk-button-large', 'action' => Route::url('post_new', array('controller' => 'new', 'action' => 'index')))) ?>
                                <?if ( ! Core::config('advertisement.leave_alert')):?>
                                <input type="hidden" name="leave_alert" value="0" disabled>
                                <?endif?>
                            </div>
                        </div>
                    </fieldset>
                    <?= FORM::close() ?>
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
        </div>
    </div>
</div>