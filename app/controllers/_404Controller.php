<?php
/**
 * This is a handler for all bad requests
 * It shows a 404 Page
 *
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class _404Controller extends Controller
{
    function actionDefault ()
    {
        $this->view->generate ( 
                $this->config['rootFolder'] .  
                $this->config['dirs']['application'] .  
                $this->config['dirs']['views'] .  '_404View.php',

                $this->config['rootFolder'] .  
                $this->config['dirs']['application'] .  
                $this->config['dirs']['templates'] .  'template.php',
                
                '<h1>404 Not Found!<h1><br />' );
    }
}
