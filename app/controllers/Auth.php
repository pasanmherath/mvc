<?php

class Auth extends Base_Controller{
            
    public function index()
    {
        $this->loadView('login');
    }
    
    public function login()
    {
        $this->loadLibrary('Gump');
        
        $gump = new GUMP();

        $_POST = $gump->sanitize($_POST);
        $gump->xss_clean($_POST);

        $gump->validation_rules(array(
            'login_email'    => 'required|valid_email|max_len,100|min_len,6',
            'login_password' => 'required|max_len,100|min_len,4'
        ));

        $validated_data = $gump->run($_POST);

        if($validated_data === false) 
        {
            $this->session->set('message', json_encode($gump->get_readable_errors(false)));
            header("location: ../auth");
        } else 
        {
            $user = $this->loadModel('User_model');
            $userDetails = $user->getUserByEmail($_POST['login_email']);
            
            $this->session->set('full_name', $userDetails[0]->full_name);
            $this->session->set('user_name', $userDetails[0]->user_name);
            $this->session->set('user_id', $userDetails[0]->id);
            
            header('location: ../addArticle');
        }
    }
    
    public function logout()
    {
        $this->session->delete('full_name');
        $this->session->delete('user_name');
        $this->session->delete('user_id');
        
        header('location: ../auth/index');
        
    }
}