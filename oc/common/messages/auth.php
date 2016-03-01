<?php

defined('SYSPATH') OR die('No direct script access.');

return array(
    'name' => array(
        'not_empty' => __('You must provide name'),
    ),
    'email' => array(
        'not_empty' => __('You must provide email'),
        'email' => __('Not valid email'),
        'email_domain' => __('Not valid domain'),
    ),
    'password1' => array(
        'not_empty' => __('You must enter password'),
    ),
    'password2' => array(
        'not_empty' => __('You must enter repeat password'),
    ),
);
