<?php defined('SYSPATH') or die('No direct access allowed.');
/**
  * Theme Name: Ocean Free
  * Description: Clean free theme that includes full admin. It has publicity. Do not delete this theme, all the views depend in this theme.
  * Tags: HTML5, Admin, Free
  * Version: 2.6.1
  * Author: Chema <chema@open-classifieds.com> , <slobodan@open-classifieds.com>
  * License: GPL v3
  */


/**
 * placeholders for this theme
 */
Widgets::$theme_placeholders	= array('footer', 'sidebar', 'publish_new');

/**
 * custom options for the theme
 * @var array
 */
Theme::$options = Theme::get_options();

//we load earlier the theme since we need some info
Theme::load();

/**
 * styles and themes, loaded in this order
 */
Theme::$skin = Theme::get('theme');

/**
 * styles and themes, loaded in this order
 */

Theme::$styles = array( 'cdn/bootstrap.min.css' => 'screen',
                        'cdn/font-awesome.min.css' => 'screen',
                        'cdn/bootstrap-image-gallery.min.css' => 'screen',
                        'cdn/blueimp-gallery.min.css' => 'screen',
                        'cdn/datepicker.css' => 'screen',
                        'cdn/chosen.min.css' => 'screen',
                        'css/styles.css?v='.Core::VERSION => 'screen',
                        'css/slider.css' => 'screen',
                    );

if (Theme::$skin!='default')
    Theme::$styles = array_merge(Theme::$styles, array('css/color-'.Theme::$skin.'.css' => 'screen'));

Theme::$scripts['footer']	= array('cdn/jquery.min.js',
                                    'cdn/bootstrap.min.js',
                                    'cdn/chosen.jquery.min.js',
                                    Route::url('jslocalization', array('controller'=>'jslocalization', 'action'=>'chosen')),
                                    'js/jquery.validate.min.js',
                                    Route::url('jslocalization', array('controller'=>'jslocalization', 'action'=>'validate')),
                                    'cdn/jquery.blueimp-gallery.min.js',
                                    'cdn/bootstrap-image-gallery.min.js',
                                    'cdn/bootstrap-datepicker.js',
                                    'cdn/holder.min.js',
                                    'js/bootstrap-slider.js',
                                    'js/favico-0.3.8.min.js',
                                    'js/default.init.js?v='.Core::VERSION,
                                    'js/theme.init.js?v='.Core::VERSION,
                                    );

/**
 * custom error alerts
 */
Form::$errors_tpl 	= '<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a>
			       		<h4 class="alert-heading">%s</h4>
			        	<ul>%s</ul></div>';

Form::$error_tpl 	= '<div class="alert "><a class="close" data-dismiss="alert">×</a>%s</div>';


Alert::$tpl 	= 	'<div class="alert alert-%s">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">%s</h4>%s
					</div>';