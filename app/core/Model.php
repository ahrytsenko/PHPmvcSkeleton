<?php
/**
 * This is a general View class
 * Here is implemented the connection to database
 * 
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class Model 
{
    private $config;
    protected $db;
	
    function __construct( $config )
    {
        $this->config = $config;
        $this->db = new DB ( $config['dbconfig'] );
    }

    function __destruct()
    {
        if (isset($this->db) && !$this->db)
        {
            unset($this->db);
        }
    }

    public function getData()
    {
    }    
}