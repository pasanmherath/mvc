<?php
/**
 * Base_controller implements common functions for controllers
 * @author Pasan Madhuranga
 */
abstract class Base_Controller {
    
    protected $session;
    
    public $message = "";
    
    public function __construct() 
    {
        $this->session = new Session;
                
        $this->message = $this->getMessage();
    }


    protected function loadView($view, $data = [])
    {
        require_once 'app/views/' . $view . '.php';
    }
    
    protected function loadModel($name)
    {
        if(file_exists('app/models/' . $name . '.php'))
        {
            require_once 'app/models/' . $name . '.php';
            return new $name;      
        }        
    }
    
    protected function loadLibrary($name)
    {
        if(file_exists('app/libraries/' . $name . '.php'))
        {//echo 'app/libraries/' . $name . '.php';exit;
            require_once 'app/libraries/' . $name . '.php';
        }        
    }
    
    private function getMessage()
    {
        if(isset($_SESSION['message']))
        {
            $message = $_SESSION['message'];
            $this->session->delete('message');
            return $message;
        } else 
        {
            return false;
        }
    }
    
}
