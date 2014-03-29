<?php
class Role_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get($id){
        $query = $this->db->query('SELECT * FROM roles WHERE id='.$id);
        
        return $query;
    }    
    function get_all(){
        $query = $this->db->query('SELECT * FROM roles');
        
        return $query;
    }
}