<?php

class Dashboard extends Base_Controller{
    
    public function index()
    {
        $header['header']           = 'Dashboard';
        $header['activeController'] = 'dashboard';
        $header['activemethod']     = 'index';
        
        $data['body']   = 'body';
        $this->loadView('includes/header',$header);
        $this->loadView('dashboard', $data);
        $this->loadView('includes/footer');
    }
}
