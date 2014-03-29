<?php

class Year_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get() {
        $query = $this->db->query('SELECT * FROM years order by from_year');
        return $query;
    }

    function get_curr_year() {
        $query = $this->db->query('SELECT * FROM years WHERE is_curr_year =\'Y\' order by from_year');
        return $query;
    }

    function get_by_year($fy) {
        $query = $this->db->query('SELECT * FROM years WHERE fin_year =\''.$fy.'\' order by from_year');
        return $query;
    }
    
    function insert() {
        // Setting variables
        $this->from_year = mysql_real_escape_string($_POST['from_year']);
        $this->to_year = mysql_real_escape_string($_POST['to_year']);
        $fy = (int)mysql_real_escape_string($_POST['from_year']);
        $this->from_date = $fy.'-04-01';
        $ty = mysql_real_escape_string($_POST['to_year']);
        $this->to_date = $ty.'-03-31';
        $fy = $fy+1;
        $ty = $ty+1;
        $this->assessment_year = $fy.'-'.$ty;
        $this->fin_year = mysql_real_escape_string($_POST['from_year']).'-'.mysql_real_escape_string($_POST['to_year']);
        
        if ($_POST['curr_fy'] == 'on')
        	$this->is_curr_year = 'Y';
        else
        	$this->is_curr_year = 'N';

        $this->db->set('create_date', 'NOW()', FALSE);
        // Inserting..
        $this->db->insert('years', $this) or die($this->db->_error_message());

        return $this->db->insert_id();
    }

}