<?php
class TestModel extends Model
{
	
    function __construct( $config )
    {
        parent::__construct ( $config );
    }

    public function getData()
    {
        return array ( 'key' => 'value' );
    }    
}