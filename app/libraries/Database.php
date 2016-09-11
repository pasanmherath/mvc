<?php
require_once 'app/config/database.php';

/**
 * create db connection with PDO
 * @author Pasan Madhuranga
 */
class Database extends PDO{
    
    public function __construct() 
    {
        parent::__construct("mysql:host=" .DB_HOST. ";dbname=" .DB_NAME, DB_USER, DB_PASSWORD);
    }
}