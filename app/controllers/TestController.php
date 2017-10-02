<?php
/**
 * Description of TestController
 * 
 * This is an example of controller
 * It will respond to /test request in URI
 *
 *  @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class TestController extends Controller
{
    function __construct ( $router, $config )
    {
        parent::__construct ( $router, $config );
        $this->model = new TestModel ( $this->config );
    }
    
    function actiondefault ()
    {
        $data = $this->model->getData ();
        $this->view->generate ( 
                $this->config['rootFolder'] .  
                $this->config['dirs']['application'] .  
                $this->config['dirs']['views'] .  'TestView.php',

                $this->config['rootFolder'] .  
                $this->config['dirs']['application'] .  
                $this->config['dirs']['templates'] .  'template.php',
                
                $data );
    }
}