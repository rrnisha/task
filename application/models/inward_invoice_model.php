<?php
class Inward_invoice_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}

	function get_by_reg_id($reg_id) {
		$query = $this->db->query('SELECT * FROM inward_invoices where reg_id='.$reg_id.' GROUP BY inv_id order by id desc');
		return $query;
	}
	
	function get_by_id($inv_id) {
		$query = $this->db->query('SELECT * FROM inward_invoices where inv_id=\''.$inv_id.'\'');
		return $query;
	}
	
	function insert($inv_id, $reg_id, $client_id, $client_name, $emp_id,  $emp_name, $particulars, $date, $mode_of_receipt, $fin_year) {
		// Setting variables
		$this->inv_id = $inv_id;
		$this->reg_id = $reg_id;
		$this->client_id = $client_id;
		$this->client_name = $client_name;
		$this->emp_id = $emp_id;
		$this->emp_name = $emp_name;
		$this->particulars = $particulars;
		$this->date = $date;
		$this->fin_year = $fin_year;
		$this->mode_of_receipt = $mode_of_receipt;
		
		$this->db->set('create_date', 'NOW()', FALSE);
		
		// Inserting..
		$this->db->insert('inward_invoices', $this) or die($this->db->_error_message());
		$id = $this->db->insert_id();
		
// 		$inv_id = "I"."_".$reg_id."_".$id;
// 		$this->db->query('UPDATE inward_invoices SET inv_id=\''.$inv_id.'\' WHERE id='.$id);
		return $id;
	}
}