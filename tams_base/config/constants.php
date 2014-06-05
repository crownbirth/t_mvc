<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| TAMS default values
|--------------------------------------------------------------------------
*/
define('DEFAULT_EMAIL', 'change@youremail.com');
define('DEFAULT_ERROR', 0);
define('DEFAULT_SUCCESS', 1);
define('DEFAULT_EXIST', 2);
define('DEFAULT_NOT_EXIST', 3);
define('DEFAULT_EXPIRED', 4);
define('DEFAULT_EMPTY', 5);
define('DEFAULT_NOT_EMPTY', 6);
define('DEFAULT_VALID', 7);
define('DEFAULT_NOT_VALID', 8);


define('QUERY_ARRAY_ROW', 0);
define('QUERY_ARRAY_RESULT', 1);
define('QUERY_OBJECT_ROW', 2);
define('QUERY_OBJECT_RESULT', 3);

/*
|--------------------------------------------------------------------------
| Notification message types
|--------------------------------------------------------------------------
*/
define('MSG_TYPE_ERROR', 'error');
define('MSG_TYPE_WARNING', 'warning');
define('MSG_TYPE_SUCCESS', 'success');

/*
|--------------------------------------------------------------------------
| Form Field Validations
|--------------------------------------------------------------------------
*/
define('PASSWORD_LENGTH_MIN', 5);
define('USERNAME_LENGTH_MIN', 6);
define('FIELD_TYPE_USERNAME', 'username');
define('FIELD_TYPE_PASSWORD', 'password');
define('FIELD_TYPE_EMAIL', 'email');

/*
|--------------------------------------------------------------------------
| Email Templates
|--------------------------------------------------------------------------
*/
define('EMAIL_TEMPLATE_FOLDER', 'email_template');
define('EMAIL_TEMPLATE_RESET', 'email_reset');



/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */