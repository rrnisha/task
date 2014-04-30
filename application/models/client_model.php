<?php
class Client_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function search($search){
    	$search = mysql_real_escape_string($search);
    	$search = str_replace(" ", '%', $search);
        $query = $this->db->query('SELECT * FROM clients WHERE full_name LIKE '.'(\''.'%'.$search.'%'.'\')'.' LIMIT 10');
        
        return $query;
    }
    function get($id){
        $query = $this->db->query('SELECT * FROM clients WHERE id='.$id);
        
        return $query;
    }    
    function get_all_count(){
        $query = $this->db->select('count(*) as cnt FROM clients');
        $query = $this->db->get();
        return $query;
    }
    function get_all_clients(){
        $query = $this->db->query('SELECT * FROM clients ORDER BY status, id desc');
        return $query;        
    }
    
    function get_all($num, $offset){
        $query = $this->db->select(' * FROM clients ORDER BY status, update_date desc, id desc')->limit($num, $offset);
        $query = $this->db->get();
        return $query;
    }
    
    function insert(){      
        // Setting variables
        $this->title = mysql_real_escape_string($_POST['title']);
//        $this->first_name = mysql_real_escape_string($_POST['firstname']);
//        $this->last_name = mysql_real_escape_string($_POST['lastname']);
        $this->full_name = mysql_real_escape_string($_POST['fullname']);
        $this->client_type = mysql_real_escape_string($_POST['client_type']);
        $this->phone_mobile = mysql_real_escape_string($_POST['phone_mobile']);
        $this->phone_office = mysql_real_escape_string($_POST['phone_office']);
        $this->phone_mobile2 = mysql_real_escape_string($_POST['phone_mobile2']);
        $this->phone_office2 = mysql_real_escape_string($_POST['phone_office2']);
        
        $this->dob = mysql_real_escape_string($_POST['dob']);
        $this->email = mysql_real_escape_string($_POST['email']);
        $this->address = mysql_real_escape_string($_POST['address']);
        $this->pan = mysql_real_escape_string($_POST['pan']);
        $this->genius_id = mysql_real_escape_string($_POST['genius_id']);
        $this->file_id = mysql_real_escape_string($_POST['file_id']);
        
        $this->db->set('create_date', 'NOW()', FALSE);
        $this->db->set('update_date', 'NOW()', FALSE);
        
        // Inserting..
        $this->db->insert('clients', $this)  or die($this->db->_error_message());
        
        return $this->db->insert_id();
    } 
       
    function edit($client){
        $this->db->where('id', $client['id']);
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->update('clients', $client); 
    }    

    function upload($i){
    	// Setting variables
    	$this->full_name = mysql_real_escape_string($_POST['name'][$i]);
    	
    	if ($_POST['type'][$i]!='-')
    		$this->client_type = mysql_real_escape_string($_POST['type'][$i]);
    	
    	if (isset($_POST['dob'][$i]) && $_POST['dob'][$i]!='-') {
    		$this->dob = mysql_real_escape_string($_POST['dob'][$i]);
    	}
    	else if (isset($_POST['doi'][$i]) && $_POST['doi'][$i]!='-') {
    		$this->dob = mysql_real_escape_string($_POST['doi'][$i]);
    	}
    	
    	if ($_POST['address'][$i]!='-') {
//     		$_POST['address'][$i] = str_replace("\r\n",' ', $_POST['address'][$i]);
    		$this->address = $_POST['address'][$i];
    	}
    	
    	if ($_POST['pan'][$i]!='-')
    		$this->pan = mysql_real_escape_string($_POST['pan'][$i]);
    	
    	if ($_POST['tan'][$i]!='-')
    		$this->tan = mysql_real_escape_string($_POST['tan'][$i]);
    	
    	if ($_POST['genid'][$i]!='-')
    		$this->genius_id = mysql_real_escape_string($_POST['genid'][$i]);
    
    	$this->db->set('create_date', 'NOW()', FALSE);
    	$this->db->set('update_date', 'NOW()', FALSE);
    
    	// Inserting..
    	$this->db->insert('clients', $this)  or die($this->db->_error_message());
    
    	return $this->db->insert_id();
    }
    
    function delete($client_id){
        $this->db->query("UPDATE clients SET status='inactive', update_date=NOW() WHERE id=".$client_id) or die('error');
    }   
     
    function activate($client_id){
        $this->db->query("UPDATE clients SET status='active', update_date=NOW() WHERE id=".$client_id) or die('error');
    }       
}