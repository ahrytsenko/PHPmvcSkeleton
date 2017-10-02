<?php
/**
 * Class provides basic MVC engine for application
 * 
 * It can handle and parse requested URI and extract from there:
 * - controller name
 * - method name
 * - parameters
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class MVCEngine
{
    // Links to external variables
    private $routes;
    private $config;
    
    // Private Read-only variables accessible by getters
    private $requestedURI;
    private $internalRoute;
    private $controllerName;
    private $modelName;
    private $methodName;
    private $parameters;
    private $parseError;

    function __construct ( $config, $routes ) 
    {
        $this->config = $config;
        $this->routes = $routes;
        
        // Store requested URI
        $this->extractRequestedURI ();
        
        // Parse requested URI and store controller name, method and parameters list
        $this->parseError = $this->parseRequestedURI ();
    }

    /**
     * Extracts from requested URI only part correspondent to user request
     * Returned value can be empty string if user did not request any in URL
     * Returned value can hold some set of words delimited by slash ('/')
     * Words in returned value are delimited by only single slash ('/')
     * Returned value does not start nor end by slash ('/')
     */
    private function extractRequestedURI ()
    {
        if (!empty ( $_SERVER['REQUEST_URI'] ) )
        {
            $uri = removeDoubledSlashes ( trim ( $_SERVER['REQUEST_URI'], '/' ) );
            $scriptName = removeDoubledSlashes ( trim ( $_SERVER['SCRIPT_NAME'], '/' ) );
            if ( strpos ( $uri, $scriptName ) === false )
            {
                $tmp = explode ( '/', $scriptName );
                array_pop ( $tmp );
                $scriptName = implode ( '/', $tmp );
            }
            $this->requestedURI = trim ( str_replace ( $scriptName, '', $uri), '/' );
        }
        else
        {
            $this->requestedURI = '';
        }
    }
    
    /**
     * Parse URI and extract from there:
     * 1/ Controller
     * 2/ Method (action)
     * 3/ Parameters for method
     * Extracted values
     */
    private function parseRequestedURI ()
    {
        if ( $this->requestedURI == '' )
        {
            $this->controllerName = ucfirst ( $this->config['defaultController'] ) . 'Controller';
            $this->modelName = ucfirst ( $this->config['defaultController'] ) . 'Model';
            $this->methodName = 'action' . ucfirst ( $this->config['defaultMethod'] );
            return false;
        }
        // Try to match routes one-by-one until the first compliance
        foreach ( $this->routes as $key => $value )
        {
            if ( preg_match ( "~$key~", $this->requestedURI ) )
            {
                $this->internalRoute = preg_replace ( "~$key~", $value, $this->requestedURI, 1 );
                $tmp = explode ( '/', $this->internalRoute );
                $cntName = ucfirst ( array_shift ( $tmp ) );
                $this->controllerName = $cntName . 'Controller';
                $this->modelName = $cntName . 'Model';
                $this->methodName = 'action' . ucfirst ( array_shift ( $tmp ) );
                $this->parameters = $tmp;
                return false;
            }
        }
        return true;
    }
    
    /**
     * Returns requested URI
     * @return string
     */
    function getURI ()
    {
        return $this->requestedURI;
    }
    
    /**
     * Returns name of requested Controller
     * @return string
     */
    function getControllerName ()
    {
        return $this->controllerName;
    }
    
    /**
     * Returns name of requested Method of requested Controller
     * @return string
     */
    function getMethodName ()
    {
        return $this->methodName;
    }
    
    /**
     * Returns name of Model correspondent to requested Controller
     * @return string
     */
    function getModelName ()
    {
        return $this->modelName;
    }
    
    /**
     * Returns parameters
     * @return array of strings
     */
    function getParameters ()
    {
        return $this->parameters;
    }
    
    /**
     * Returns true if requested controller was found and false otherwise
     * @return boolean
     */
    function controllerWasFound ()
    {
        return $this->controllerFound;
    }
    
    function is404 ()
    {
        return $this->parseError;
    }
}
