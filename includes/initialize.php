<?php

// Web site constants
// Web site constants
defined('DS') ? null : define('DS', '\\');
//defined('SITE_ROOT') ? null : define('SITE_ROOT', $_SERVER['DOCUMENT_ROOT']);
defined('SITE_ROOT') ? null : define('SITE_ROOT', "C:" . DS . "wamp64" . DS . "www" . DS . "mannHotel");
defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT . DS . 'includes');
defined('UPLOAD_PATH') ? null : define('UPLOAD_PATH', SITE_ROOT . DS . 'uploads');

// load configuration file
require_once(LIB_PATH . DS . "config.php");

// load basic functions
require_once(LIB_PATH . DS . "functions.php");

// load core objects
require_once(LIB_PATH . DS . "session.php");
require_once(LIB_PATH . DS . "database.php");
require_once(LIB_PATH . DS . "database_object.php");

// load database-related classes
require_once(LIB_PATH . DS . "account.php");
require_once(LIB_PATH . DS . "booking.php");
require_once(LIB_PATH . DS . "facility.php");
require_once(LIB_PATH . DS . "hotel.php");
require_once(LIB_PATH . DS . "invoice.php");
require_once(LIB_PATH . DS . "menu.php");
require_once(LIB_PATH . DS . "order_booking.php");
require_once(LIB_PATH . DS . "order_contents.php");
require_once(LIB_PATH . DS . "person.php");

?>