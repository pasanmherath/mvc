<?php

class Home extends Base_Controller{
    
    public function index()
    {
        $user = $this->loadModel('user');
        
        $this->loadView('includes/header');
        $this->loadView('home/index');
        $this->loadView('includes/footer');
    }
        
}
