<?php
session_start();
/**
 * creation, setting and deletions of sessions 
 * @author Pasan Madhuranga
 */
class Session{
    
    public function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }
    
    public function get($key)
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        } else 
        {
            return null;
        }
    }
    
    public function delete($key)
    {
        if(isset($_SESSION[$key]))
        {
            unset($_SESSION[$key]);
        }
    }
}

