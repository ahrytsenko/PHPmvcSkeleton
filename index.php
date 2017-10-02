<?php
// 1. Global settings
$developmentMode = true;
if ( $developmentMode )
{
    // In development mode we need to see every errors and messages
    ini_set ( 'display_errors', 1 );
    error_reporting ( E_ALL );
}
else
{
    // In productin mode we do not want to see any errors and messages
    ini_set ( 'display_errors', 0 );
    error_reporting ( 0 );
}

// 2. Define some useful constants
// ROOT - a point to file system directory where Site located
define ( 'ROOT', dirname ( __FILE__ ) );

// APP_DIR - a name of directory where application files located
// Need to be changed in accordance with real application folder
define ( 'APP_DIR', '/app/' );

// ENTRY_POINT - a name of starting script of application
// Need to be changed in accordance with real application entry point file
define ( 'ENTRY_POINT', 'entryPoint.php');

// CONF_FILE - a path and a name of configuration file
// Need to be changed in accordance with real application config file
define ( 'CONF_FILE', 'config/settings.php');

// 3. Call entry point of application
require_once ROOT . APP_DIR . ENTRY_POINT;