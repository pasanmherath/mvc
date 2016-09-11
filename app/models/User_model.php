<?php
require_once 'app/core/Base_Model.php';

class User_model extends Base_Model{
    
    function getUserByEmail($email)
    {
        $query = $this->db->prepare("SELECT u.* FROM users u where u.user_name=:user_name");
        $query->execute(array(':user_name' => $email));
        $result = $query->fetchAll(PDO::FETCH_OBJ);
       
        if($query->rowCount() > 0)
        {
            return $result;
        } else 
        {
            return false;
        }
    }
}
