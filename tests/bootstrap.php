<?php
set_include_path(dirname(__FILE__) . '/../' . PATH_SEPARATOR . get_include_path());

// Set default timezone
date_default_timezone_set('America/New_York');

require_once 'Slim2/Slim2.php';

// Register Slim2's autoloader
\Slim2\Slim2::registerAutoloader();

//Register non-Slim2 autoloader
function customAutoLoader( $class )
{
    $file = rtrim(dirname(__FILE__), '/') . '/' . $class . '.php';
    if ( file_exists($file) ) {
        require $file;
    } else {
        return;
    }
}
spl_autoload_register('customAutoLoader');
