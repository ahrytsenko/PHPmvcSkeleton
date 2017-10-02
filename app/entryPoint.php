<?php
/**
 * An entry point of application
 * 
 * In this file being done such vital activities:
 * 1/ Loading configuration file
 * 2/ Loading Classes and Libraries
 * 3/ Loading core classes (Router, Model, View and Controller)
 * 4/ Creating an instance of class Router and calling method Router::run()
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
// 1. Loading configuration file
$config = require_once ROOT . APP_DIR . CONF_FILE;
$config['rootFolder'] = ROOT;

// 2. Include useful libraries and classes
// Here are the libraries
foreach ( $config['utils'] as $className => $classFile )
{
    require_once $config['rootFolder'] . 
                 $config['dirs']['application'] . 
                 $config['dirs']['utils'] . 
                 $classFile;
}

// Here are the classes
foreach ( $config['classes'] as $className => $classFile )
{
    require_once $config['rootFolder'] . 
                 $config['dirs']['application'] . 
                 $config['dirs']['classes'] . 
                 $classFile;
}

// 3. Include core engines
foreach ( $config['core'] as $className => $classFile )
{
    require_once $config['rootFolder'] . 
                 $config['dirs']['application'] . 
                 $config['dirs']['core'] . 
                 $classFile;
}

// 4. Call to Router
$router = new Router ( $config );
$router->run ();