<?php
/**
 * Application routes.
 * Name of this file is written in settings.php file as value of key 'routes'
 * 
 *  @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
return array (
    '^test/([0-9]+)$' => 'test/default/$1',
    '^test$' => 'test/default',
    '.+' => '_404/default',
);