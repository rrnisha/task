<?php
class Document_Transaction_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get($id){
        $query = $this->db->query('SELECT * FROM doc_trans WHERE register_id='.$id.' ORDER BY id desc');
        
        return $query;
    }    
    function get_all(){
        $query = $this->db->query('SELECT * FROM doc_trans ORDER BY id desc');
        
        return $query;
    }
    function insert(){      
        // Setting variables
        $this->register_id = mysql_real_escape_string($_POST['register_id']);        
        $this->doc_id = mysql_real_escape_string($_POST['doc_id']);
        $this->emp_id = mysql_real_escape_string($_SESSION['emp_id']);
        $this->reg_status = mysql_real_escape_string($_POST['status']);
        $this->db->set('trans_date', 'NOW()', FALSE);
        $this->trans_type = mysql_real_escape_string($_POST['trans_type']);
        $this->db->set('create_date', 'NOW()', FALSE);

        // Inserting..
        $this->db->insert('doc_trans', $this)  or die($this->db->_error_message());
        
        return $this->db->insert_id();
    }    
}