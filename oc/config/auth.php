<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	'driver'       => 'oc',
	'hash_method'  => 'sha256',
	'hash_key'     => '4w2zwn3kkm+$%pg8',
	'lifetime'     => 90*24*60*60,
	'session_type' => Session::$default,
	'session_key'  => 'auth_user',
	'cookie_salt'  => 'cookie_4w2zwn3kkm+$%pg8',
	'ql_key'       => 'ql_4w2zwn3kkm+$%pg8',
    'ql_lifetime'  => 7*24*60*60,
    'ql_separator' => '|',
    'ql_mode'      => MCRYPT_MODE_NOFB,
    'ql_cipher'    => MCRYPT_RIJNDAEL_128,

);