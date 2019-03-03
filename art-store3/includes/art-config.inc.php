<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('DBCONNECTION', 'mysql:host=localhost;dbname=art');
define('DBUSER', 'wb2s18user');
define('DBPASS', 'wb2s18pass');



spl_autoload_register(function ($class) {
    $file = 'lib/' . $class . '.class.php';
    if (file_exists($file)) 
      include $file;
});

$dbAdapter = DatabaseAdapterFactory::create('PDO', array(DBCONNECTION, DBUSER, DBPASS));
//$dbAdapter = DatabaseHelper::setConnectionInfo(array(DBCONNECTION, DBUSER, DBPASS));

?>
