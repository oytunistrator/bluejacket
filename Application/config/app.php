<?php
define('APPNAME','BlueJacket');
define('APPFOLDER','Application');
define('TEMPLATE_FOLDER',APPFOLDER.'/template/');
define('DEFAULT_TEMPLATE_FOLDER',APPFOLDER.'/template/default/');
define('DEFAULT_CONTROLLER','home');
define('ROUTE_MANAGEMENT',true);
define('PUBLIC_DIR',APPFOLDER.'/public/');
define('APP_DEBUGING',false);

define('CACHE_EXTENTION',true);
define('CACHE_FOLDER',APPFOLDER.'/cache/');
define('CACHE_TIMER',120);

define("S3_ACCESS_KEY_ID", "");
define("S3_SECRET_ACCESS_KEY", "");
define("S3_BUCKET", "");

define("SMTP_SERVER","");
define("SMTP_NAME","");
define("SMTP_EMAIL","");
define("SMTP_PASSWORD","");
define("SMTP_PORT","587");
define("SMTP_AUTH","LOGIN");

define("RECAPTCHA_PUBLICKEY","");
define("RECAPTCHA_PRIVATEKEY","");
?>
