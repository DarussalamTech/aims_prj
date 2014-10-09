<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
define('FILE_READ_MODE',	0644);
define('FILE_WRITE_MODE',	0666);
define('DIR_READ_MODE',		0755);
define('DIR_WRITE_MODE',	0777);
define('MEMBERSHIP_ID',		20);
define('MAP_SEARCH_LIMIT',	40);
define('STANDARD_SEARCH_LIMIT',	15);
define('WEBSITE_URL', 'http://localhost/jjandz/');//'http://dev.727.me/');
define('WEBSITE_SHORT', 'localhost/jjandz/');//'dev.727.me');
define('CI_PATH_URL', 'http://dev.727.me/real-estate/'); //codeigniter folder path
define('WEBSITE_EMAIL', 'yasir.evade@gmail.com'); //homes@jjandthez.com
define('WEBSITE_NAME', 'JJandtheZ');
define('WEBSITE_NAME2', 'JJ And The Z');
define('COMPANY_NAME', 'JJ And The Z');
define('CONTACT_INFO', '201 2nd Avenue N, St Petersburg, FL 33701<br>727-344-9191 - Phone<br><a href="mailto:homes@jjandthez.com">homes@jjandthez.com</a><br>');
                      
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