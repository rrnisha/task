<?php
class Outward_invoice_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_by_reg_id($reg_id) {
		$query = $this->db->query('SELECT * FROM outward_invoices where reg_id='.$reg_id);
		return $query;
	}
		
	function get_by_id($inv_id) {
		$query = $this->db->query('SELECT * FROM outward_invoices where inv_id=\''.$inv_id.'\'');
		return $query;
	}
	
	function insert($inv_id, $reg_id, $client_id, $client_name, $emp_id, $particulars, $date, $receipt_mode) {
		// Setting variables
		$this->inv_id = $inv_id;
		$this->reg_id = $reg_id;
		$this->client_id = $client_id;
		$this->client_name = $client_name;
		$this->emp_id = $emp_id;
		$this->particulars = $particulars;
		$this->date = $date;
		$this->receipt_mode = $receipt_mode;
		
		$this->db->set('create_date', 'NOW()', FALSE);
		
		// Inserting..
		$this->db->insert('outward_invoices', $this) or die($this->db->_error_message());
		return $this->db->insert_id();
	}
}