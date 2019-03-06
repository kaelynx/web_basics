<?php
    include 'include/art-config.inc.php';
    spl_autoload_register(function ($class){
        $file = 'lib/' . $class . '.class.php';
        if (file_exists($file)) include $file;
    });
	
    ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
?>