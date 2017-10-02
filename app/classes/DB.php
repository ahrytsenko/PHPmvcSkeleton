<?php
/**
 * Class DB provides an access to database
 *
 * @author Andrii Grytsenko <ahrytsenko@gmail.com>
 */
class DB
{
    private $dbLink;
    
    function __construct ( $dbConfig )
    {
        $connectionString =  $dbConfig['driver'] . 
                ":host=" .   $dbConfig['host'] . 
                ";dbname=" . $dbConfig['base'];
        $this->dbLink = new PDO ( $connectionString, $dbConfig['user'], $dbConfig['pass'] );
    }
    
    function __destruct ()
    {
        unset ( $this->dbLink );
    }
    
    function getConnection ()
    {
        return $this->dbLink;
    }
}