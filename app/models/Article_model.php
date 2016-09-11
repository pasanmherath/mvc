<?php
require_once 'app/core/Base_Model.php';

class Article_model extends Base_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function insertData($table, $article)
    {
        $insertId = $this->insert($table, $article);
        return $insertId;
    }
    
    public function updateData($table, $data, $where)
    {
        $this->update($table, $data, $where);
    }
    
    public function deleteData($table, $where)
    {
        $this->delete($table, $where);
    }
    
    public function getArticleCount($category, $user, $status)
    {
        $whereQuery = array();
        if($category != "")
        {
            array_push($whereQuery, 'a.category='.$category);
        }
        
        if($user != "")
        {
            array_push($whereQuery, 'a.user_id='.$user);
        }
        
        if($status != "")
        {
            array_push($whereQuery, 'a.status='.$status);
        }
        
        $where = implode(" AND ", $whereQuery);
        if(count($whereQuery) > 0)
        {
            $sql = "select count(a.id) as total_count from articles a
                    left join users u on a.user_id=u.id WHERE $where";
        } else 
        {
            $sql = "select count(a.id) as total_count from articles a
                    left join users u on a.user_id=u.id";
        }
        
        $query = $this->db->prepare($sql);
        $query->execute();
       
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result[0]->total_count;
    }
    
    public function getAllArticles($category, $user, $status, $offset, $limit)
    {
        $whereQuery = array();
        if($category != "")
        {
            array_push($whereQuery, 'a.category='.$category);
        }
        
        if($user != "")
        {
            array_push($whereQuery, 'a.user_id='.$user);
        }
        
        if($status != "")
        {
            array_push($whereQuery, 'a.status='.$status);
        }
        
        $where = implode(" AND ", $whereQuery);
      
        if(count($whereQuery) > 0)
        {
            $sql = "select a.*,u.full_name from articles a
                left join users u on a.user_id=u.id WHERE $where order by a.id desc LIMIT $offset, $limit";
        } else 
        {
            $sql = "select a.*,u.full_name from articles a
                left join users u on a.user_id=u.id order by a.id desc LIMIT $offset, $limit";
        }
        
        $query = $this->db->prepare($sql);
        $query->execute();
                
        $result = $query->fetchAll(PDO::FETCH_OBJ);
      
        if($query->rowCount())
        {
            return $result;
        } else 
        {
            return false;
        }
        
        //echo $query->queryString;
    }
    
    public function getUsers($col)
    {
        $sql = "select $col from users";
        $query = $this->db->prepare($sql);
        $query->execute();
        
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        
        if($query->rowCount())
        {
            return $result;
        } else 
        {
            return false;
        }
    }
    
    public function getArticleById($id)
    {
        $sql = "select a.* from articles a where a.id=:id";
        $query = $this->db->prepare($sql);
        $query->bindValue(':id', $id);
        $query->execute();
        
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $result[0];
    }
    
    
}