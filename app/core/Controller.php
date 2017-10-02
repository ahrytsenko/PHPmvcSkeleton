<?php
/**
 * Controller is a base class for all application Controllers
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class Controller 
{
    protected $router;
    protected $config;
    protected $view;
    protected $model;
    
    function __construct( $router, $config )
    {
        $this->router = $router;
        $this->config = $config;
        $this->view = new View( $this->config );
    }
    
    function __destruct() 
    {
        if ( isset ( $this->view ) ) 
        {
            unset ( $this->view );
        }
        if ( isset ( $this->model ) ) 
        {
            unset ( $this->model );
        }
    }
    
    function actionDefault ()
    {
        ;
    }
}