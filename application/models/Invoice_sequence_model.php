<?php
class Invoice_sequence_model extends CI_Model {
	
	function insert($session_id) {
		$this->session_id = $session_id;
		$this->db->set('create_date', 'NOW()', FALSE);
		$this->db->insert('invoice_sequence', $this) or die($this->db->_error_message());
		return $this->db->insert_id();
	}
	
	function get_inv_date($inv_seq_id) {
		$query = $this->db->query('SELECT create_date FROM invoice_sequence where inv_no='.$inv_seq_id);
		return $query;
	}

	function get_id_by_sessionid($session_id) {
		$query = $this->db->query('SELECT inv_no FROM invoice_sequence where session_id='.'\''.$session_id.'\'');
		return $query;
	}
	
}