<?php
class Register_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get($id){
        $query = $this->db->query('SELECT * FROM registers WHERE id='.$id);
        
        return $query;
    }    
    function get_all_count() {
        $query = $this->db->select('count(*) as cnt FROM registers');
        $query = $this->db->get();
        return $query;
    }
    function get_type_count($type) {
    	$this->db->where('type', $type);
        $query = $this->db->select('count(*) as cnt FROM registers ');
        $query = $this->db->get();
        return $query;
    }
    function get_client_count($client_id) {
    	$this->db->where('client_id', $client_id);
        $query = $this->db->select('count(*) as cnt FROM registers ');
        $query = $this->db->get();
        return $query;
    }
    function get_all($num, $offset){
    	$this->db->order_by("update_date", "desc");
    	$this->db->order_by("id", "desc");    	
    	$query = $this->db->select('* FROM registers')->limit($num, $offset);
        $query = $this->db->get();
        
        return $query;
    }
    function get_all_per_type($type, $num, $offset){
    	$this->db->where('type', $type);
    	$this->db->order_by("update_date", "desc");
    	$this->db->order_by("id", "desc");    	
        $query = $this->db->select('* FROM registers')->limit($num, $offset);
        $query = $this->db->get();
        
        return $query;
    }
    function get_all_per_client_type($client_id, $type, $num, $offset){
    	$this->db->where('client_id', $client_id);
    	if ($type != 'all') $this->db->where('type', $type);
    	$this->db->order_by("update_date", "desc");
    	$this->db->order_by("id", "desc");    	
        $query = $this->db->select('* FROM registers')->limit($num, $offset);
        $query = $this->db->get();
        
        return $query;
    }
    function get_documents_count($register_id){
        $query = $this->db->select('count(*) as cnt FROM documents WHERE row_status=\'active\' AND register_id ='.$register_id);
        $query = $this->db->get();
        return $query;
    }
    function get_status_based_documents_count($register_id, $status){
        $query = $this->db->select('count(*) as cnt FROM documents WHERE row_status=\'active\' AND register_id ='.$register_id.' AND status =\''.$status.'\'');
        $query = $this->db->get();
        return $query;
    }
    
    function get_documents($client_id, $status){
        $query = $this->db->query('SELECT * FROM documents WHERE register_id in (SELECT id FROM registers WHERE client_id='.$client_id.') and status=\''.$status.'\' and row_status="'.'active'.'" ORDER BY doc_id desc');
        return $query;
    }
    function insert(){      
        $this->client_id = mysql_real_escape_string($_POST['client_id']);
        $this->type = mysql_real_escape_string($_POST['type']);            
        $this->status = mysql_real_escape_string($_POST['status']);
                
        $this->db->set('create_date', 'NOW()', FALSE);
        $this->db->set('update_date', 'NOW()', FALSE);
        
        // Inserting..
        $this->db->insert('registers', $this)  or die($this->db->_error_message());
        return $this->db->insert_id();
    }    
    function edit($register){
        $this->db->where('id', $register['id']);
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->update('registers', $register); 
    }    

    function mark_status($register_id, $status){
        $this->db->query("UPDATE registers SET status='".$status."',  update_date=NOW() WHERE id=".$register_id) or die('error');
    }    
//    function inward($register_id, $status){
//        $this->db->query("UPDATE registers SET status='".$status."', update_date=NOW() WHERE id=".$register_id) or die('error');
//    }    
}
