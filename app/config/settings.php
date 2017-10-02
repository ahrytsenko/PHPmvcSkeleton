<?php
/**
 * This file contains application settings
 * Section 'dirs' contains names of vital application directories.
 *      Name of directory should be finished by slash '/'
 *      'application' is a top level directory of application and 
 *      contains all other directories. This directory should also be started by slash '/'
 * Section 'classes' contains auxilary classes used in application.
 *      Classes from this section are being loaded in entryPoint.php
 * Section 'core' contains four core classes (Model, View, Controller and Router).
 *      Classes from this section are being loaded in entryPoint.php
 * Section 'utils' contains any third-party libraries.
 *      Classes from this section are being loaded in entryPoint.php
 * Section 'names' defines naming rules for controller classes and methods actions
 * Item 'routes' contains name of file with application routes. File should locate in 'config' directory.
 * Item 'defaultController' contains name of controller called in case no controller was specified in requested URI.
 * Item 'defaultMethod' contains name of action called in case no action was specified in requested URI.
 * Item '404' contains name of controller handles 'Page Not Found' case
 * Section 'dbconfig' contains parameters for connection to database
 * 
 *  @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
return array (
    'dirs'              => array (
        'application'   => '/app/',
        'classes'       => 'classes/',
        'config'        => 'config/',
        'controllers'   => 'controllers/',
        'core'          => 'core/',
        'models'        => 'models/',
        'templates'     => 'templates/',
        'views'         => 'views/',
        'utils'         => 'utils/',
    ),
    'classes'           => array (
        'MVCEngine'     => 'MVCEngine.php',
        'DB'            => 'DB.php',
    ),
    'core'              => array (
        'router'        => 'Router.php',
        'controller'    => 'Controller.php',
        'model'         => 'Model.php',
        'view'          => 'View.php',
    ),
    'utils'             => array (
        'utils'         => 'utils.php',
    ),
    'names'             => array (
        'controller'    => '$1Controller',
        'method'        => 'action$1',
    ),
    'routes'            => 'routes.php',
    'defaultController' => 'test',
    'defaultMethod'     => 'default',
    '404'               => '_404',
    'dbconfig'          => array (
        'driver'        => 'mysql',
        'host'          => 'localhost',
        'user'          => '***********',
        'pass'          => '***********',
        'base'          => '***********',
    ),
);