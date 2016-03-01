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
                        URL::base().'cdn/chosen.min.css' => 'screen',
                        'css/styles.css?v='.Core::VERSION => 'screen',
                    );

if (Theme::$skin!='default')
    Theme::$styles = array_merge(Theme::$styles, array('css/color-'.Theme::$skin.'.css' => 'screen'));

Theme::$scripts['footer']	= array('js/jquery-1.11.3.min.js',
                                    'js/uikit.min.js',
                                    'js/plugins/selectric/jquery.selectric.min.js',
                                    URL::base().'cdn/chosen.jquery.min.js',
                                    Route::url('jslocalization', array('controller'=>'jslocalization', 'action'=>'chosen')),
                                    'js/jquery.validate.min.js',
                                    Route::url('jslocalization', array('controller'=>'jslocalization', 'action'=>'validate')),
                                    'js/components/grid.js',
                                    'js/components/form-select.js',
                                    'js/components/slideset.js',
                                    'js/components/accordion.js',
                                    'js/plugins/vegas/vegas.min.js',
                                    'js/plugins/easy-autocomplete/easy-autocomplete.min.js',
                                    'js/components/slideshow.js',
                                    'js/main.js',
                                    'js/favico-0.3.8.min.js',
                                    'js/default.init.js?v='.Core::VERSION,
                                    'js/theme.init.js?v='.Core::VERSION,
                                    );

/**
 * custom error alerts
 */
Form::$errors_tpl 	= '<div class="uk-alert uk-alert-danger" data-uk-alert><a class="uk-alert-close uk-close" href="#"></a>
			       		<h4 class="uk-alert-heading uk-hidden">%s</h4>
			        	<ul>%s</ul></div>';

Form::$error_tpl 	= '<div class="uk-alert" data-uk-alert><a class="uk-alert-close uk-close" href="#"></a>%s</div>';


Alert::$tpl 	= 	'<div class="uk-alert uk-alert-%s" data-uk-alert><a class="uk-alert-close uk-close" href="#"></a>
					<h4 class="uk-alert-heading uk-hidden">%s</h4>%s
					</div>';