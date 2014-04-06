<?php
class Task_type_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get() {
		$query = $this->db->query('SELECT * FROM task_types');
		return $query;
	}
	
	function get_all_active() {
		$query = $this->db->query('SELECT * FROM task_types WHERE status='."'active'");
		return $query;
	}
	
	function get_all_count(){
		$query = $this->db->select('count(*) as cnt FROM task_types');
		$query = $this->db->get();
		return $query;
	}
		
	function get_all($num, $offset){
		$query = $this->db->select(' * FROM task_types ')->limit($num, $offset);
		$query = $this->db->get();
		return $query;
	}
		
    function get_by_id($id){
        $query = $this->db->query('SELECT * FROM task_types WHERE id ='.$id);
        return $query;
    }
	
	function insert() {
		// Setting variables
		$this->type = mysql_real_escape_string($_POST['type']);
		$this->type_ui_desc = mysql_real_escape_string($_POST['type_ui_desc']);
		$this->status = 'active';
		$this->db->set('create_date', 'NOW()', FALSE);
		$this->db->set('update_date', 'NOW()', FALSE);
		
		// Inserting..
		$this->db->insert('task_types', $this) or die($this->db->_error_message());
		return $this->db->insert_id();
	}
	
	function edit($type){
		$this->db->set('update_date', 'NOW()', FALSE);
		$this->db->where('id', $type['id']);
		$this->db->update('task_types', $type);
	}	

	function delete($type_id){
		$this->db->query("UPDATE task_types SET status='inactive', update_date=NOW() WHERE id=".$type_id) or die('error');
	}
	
	function activate($type_id){
		$this->db->query("UPDATE task_types SET status='active', update_date=NOW() WHERE id=".$type_id) or die('error');
	}
	
}