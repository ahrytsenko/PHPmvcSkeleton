<?php
/**
 * This is an central router of application
 * 
 * Router parses given URI by using MVCEngine class
 * Than Router tries to load requested controller and model (if exists)
 *      and tries to call requested action
 * If no action or controller requested Router calls default 
 *      controller and action specified in settings.php file 
 *      (items 'defaultController' and 'defaultMethod')
 * If requested inexistent controller or method or 
 *      controller class file does not exist Router call 400 controller
 *      specified in settings.php file (item '404')
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class Router
{
    private $routes;
    private $config;
    
    public function __construct ( $config )
    {
        $this->config = $config;
        $this->routes = require_once ROOT . 
                $this->config['dirs']['application'] . 
                $this->config['dirs']['config'] . 
                $this->config['routes'];
    }

    /**
     * Main method of Router controller
     * 
     * @author Andrii Grytsenko <ahrytsenko@gmail.com>
     */
    public function run ()
    {
        $mvcEngine = new MVCEngine ( $this->config, $this->routes );
        if ( $mvcEngine->is404 () )
        {
            $this->redirectTo ('_404');
        }

        // Get Controller name and find controller file
        $modelName = $mvcEngine->getModelName();
        $modelFile = $this->config['rootFolder'] . 
                $this->config['dirs']['application'] . 
                $this->config['dirs']['models'] . 
                $modelName . '.php';
        $controllerName = $mvcEngine->getControllerName();
        $controllerFile = $this->config['rootFolder'] . 
                $this->config['dirs']['application'] . 
                $this->config['dirs']['controllers'] . 
                $controllerName . '.php';
        if ( file_exists( $controllerFile ) )
        {
            // If file exists than include it
            if ( file_exists( $modelFile ) )
            {
                include_once $modelFile;
            }
            require_once $controllerFile;
            $controller = new $controllerName ( $this, $this->config );

            // Get Method name and find it
            $method = $mvcEngine->getMethodName ();
            if ( method_exists( $controller, $method ) )
            {
                // If method exists than call it with parameters
                $controller->$method( $mvcEngine->getParameters () );
            }
            else
            {
                // If no, redirect to page 404
                $this->redirectTo ('_404');
            }
        }
        else
        {
            // If no, redirect to page 404
            $this->redirectTo ('_404');
        }
    }
    
    /**
     * Redirects user to new $location
     * If location is equal to 404 page (according to config file),
     *   than status will be 404 Not Found.
     * Else status will be 200 OK
     * @param string $location
     */
    public function redirectTo ( $location )
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . dirname ( $_SERVER['PHP_SELF'] );
        $response = $_SERVER['SERVER_PROTOCOL'];
        $status = 'Status: ';
        if ( $location == $this->config['404'] )
        {
            $response .= ' 404 Not Found';
            $status .= '404 Not Found';
        }
        else 
        {
            $response .= ' 200 OK';
            $status .= '200 OK';
        }
        header ( $response );
        header ( $status );
        header ( 'Location: ' . $host . '/' . $location );
        exit;
    }
}