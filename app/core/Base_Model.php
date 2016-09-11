<?php
require_once 'app/libraries/Database.php';
/**
 * Base_Model implements common functions to models
 * @author Pasan Madhuranga
 */
abstract class Base_Model extends Database
{
    protected $db; 
    
    public function __construct() 
    {
        parent::__construct();
        $this->db = new Database();
    }
    
    /**
     * 
     * @param string $table table name
     * @param array $data data to insert
     * @return int last insert id
     */
    protected function insert($table, $data)
    {
        ksort($data);
           
        $filedNames  = implode(",", array_keys($data));
        $fieldValues = ':' . implode(",:", array_keys($data));
        
        $query = $this->db->prepare("INSERT INTO articles ($filedNames) VALUES ($fieldValues)");
        
        foreach($data as $key => $value)
        {
            $query->bindValue(':'.$key, $value);
        }
        $query->execute();
        
        return $this->db->lastInsertId();
    }
    
    protected function update($table, $data, $where)
    {
        ksort($data);
        $feildDetails = "";
        foreach($data as $key => $val)
        {
            $feildDetails = $key . '=' . ':' . $key; 
        }
        
        $query = $this->db->prepare("UPDATE $table SET $feildDetails WHERE $where");
        
        foreach ($data as $key => $val)
        {
            $query->bindValue(':'.$key, $val);
        }
        $query->execute();
    }
    
    protected function delete($table, $where)
    {        
        $sql = "DELETE FROM $table WHERE $where";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}
