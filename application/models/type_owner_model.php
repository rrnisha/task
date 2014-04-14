<?php
class Type_owner_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get($type, $emp_id) {
		$query = $this->db->query('SELECT * FROM type_owners where emp_id='.$emp_id.' and type="'.$type.'"');
		return $query;
	}
	
	function get_all_count(){
		$query = $this->db->select('count(*) as cnt FROM type_owners');
		$query = $this->db->get();
		return $query;
	}
		
	function get_all($num, $offset){
		$query = $this->db->select(' * FROM type_owners ')->limit($num, $offset);
		$query = $this->db->get();
		return $query;
	}
		
	function insert($type, $emp_id) {
		// Setting variables
		$this->type = $type;
		$this->emp_id = $emp_id;
		$this->db->set('create_date', 'NOW()', FALSE);
		$this->db->set('update_date', 'NOW()', FALSE);
		
		// Inserting..
		$this->db->insert('type_owners', $this) or die($this->db->_error_message());
		return $this->db->insert_id();
	}
	
	function edit($type){
		$this->db->set('update_date', 'NOW()', FALSE);
		$this->db->where('id', $type['id']);
		$this->db->update('type_owners', $type);
	}	
	
	function deleteAll($emp_id) {
		$this->db->query('DELETE FROM type_owners WHERE emp_id='.$emp_id);
	}
}