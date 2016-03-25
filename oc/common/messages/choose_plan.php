<?php

defined('SYSPATH') OR die('No direct script access.');

return array(
    'plan_enable_disable' => array(
        'not_empty' => __('Should be choose atleast one plan'),
    ),
    'website' => array(
        'not_empty' => __('Web Link cannot be empty'),
        'url' => __('Web Link should be URL format'),
    )
);
