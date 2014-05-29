<?php
class Company_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    function get_name( $id ){
    	$query = $this->db->query('SELECT disp_name FROM companies WHERE id='.mysql_real_escape_string($id));
    	return $query;
    }
    
    function get_full_name( $id ){
    	$query = $this->db->query('SELECT name FROM companies WHERE id='.mysql_real_escape_string($id));
    	return $query;
    }    
    
    function get_all_count(){
        $query = $this->db->select('count(*) as cnt FROM companies ORDER BY status, id');
        $query = $this->db->get();
        return $query;
    }
    
    function get_all(){
        $query = $this->db->select(' * FROM companies ORDER BY status, update_date desc,');
        $query = $this->db->get();        
        return $query;
    }
    
    function get_active(){
        $query = $this->db->query('SELECT * FROM companies WHERE status='."'active'");
        return $query;
    }
        
    function get($id){
        $query = $this->db->query('SELECT * FROM companies WHERE id ='.$id);
        return $query;
    }

    function delete($id){
        $this->db->query("UPDATE companies SET status='inactive', update_date=NOW() WHERE id=".$id) or die('error');
    }    

    function activate($id){
        $this->db->query("UPDATE companies SET status='active', update_date=NOW() WHERE id=".$id) or die('error');
    }       

    function insert(){      
        // Setting variables
        $this->name = mysql_real_escape_string($_POST['name']);
        $this->disp_name = mysql_real_escape_string($_POST['disp_name']);
        $this->phone = mysql_real_escape_string($_POST['phone']);
        $this->email = mysql_real_escape_string($_POST['email']);
        $this->address = mysql_real_escape_string($_POST['address']);
        $this->doi = mysql_real_escape_string($_POST['doi']);
        $this->tan = mysql_real_escape_string($_POST['tan']);
        
        $this->db->set('create_date', 'NOW()', FALSE);
                
        // Inserting..
        $this->db->insert('companies', $this)  or die($this->db->_error_message());
        
        return $this->db->insert_id();
    }    
    function edit($company){
        $this->db->set('update_date', 'NOW()', FALSE);
    	$this->db->where('id', $company['id']);
        $this->db->update('companies', $company); 
    }    
    
}