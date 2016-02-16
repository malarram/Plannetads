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

Theme::$styles = array( 'css/uikit.css' => 'screen',
                        'js/plugins/selectric/selectric.css' => 'screen',
                        'js/plugins/vegas/vegas.min.css' => 'screen',
                        'js/plugins/easy-autocomplete/easy-autocomplete.css' => 'screen',
                        'js/plugins/easy-autocomplete/easy-autocomplete.themes.css' => 'screen',
                        'css/styles.css?v='.Core::VERSION => 'screen',
                    );

if (Theme::$skin!='default')
    Theme::$styles = array_merge(Theme::$styles, array('css/color-'.Theme::$skin.'.css' => 'screen'));

Theme::$scripts['footer']	= array('js/jquery-1.11.3.min.js',
                                    'js/uikit.min.js',
                                    'js/plugins/selectric/jquery.selectric.min.js',
                                    Route::url('jslocalization', array('controller'=>'jslocalization', 'action'=>'chosen')),
                                    'js/jquery.validate.min.js',
                                    Route::url('jslocalization', array('controller'=>'jslocalization', 'action'=>'validate')),
                                    'js/components/grid.js',
                                    'js/components/form-select.js',
                                    'js/components/slideset.js',
                                    'js/components/accordion.js',
                                    'js/plugins/vegas/vegas.min.js',
                                    'js/plugins/easy-autocomplete/easy-autocomplete.min.js',
                                    'js/main.js'
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