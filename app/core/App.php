<?php
/**
 * manage the routing
 * @author Pasan Madhuranga
 */
class App {
    
    // can assing default controller and method
    protected $controller = 'Auth';
    protected $method     = 'index';
    protected $params     = [];


    public function __construct() 
    {            
        $url = $this->parseUrl();
      
        if(file_exists('app/controllers/'.$url[0].'.php'))
        {
            $this->controller = $url[0];
            unset($url[0]);
        }
        
        require_once 'app/controllers/'.$this->controller.'.php';
      
        $this->controller = new $this->controller;
      
        if(isset($url[1]))
        {
            if(method_exists($this->controller, $url[1]))
            {
                $this->method = $url[1];
                unset($url[1]);
            } else 
            {
                // can handle this error
                trigger_error("This Url Is Invalid", E_USER_ERROR);
            }
        } else 
        {
            if(isset($_SESSION['user_id']))
            {
                header('location: dashboard/index');
            } else 
            {
                header('location: auth/index');
            }
            
        }
        
        $this->params = $url ? array_values($url) : [];
        
        call_user_func_array([$this->controller, $this->method], $this->params);        
        
    }
    
    protected function parseUrl()
    {
        if(isset($_GET['url']))
        {
            // Removes all illegal character from s URL
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}