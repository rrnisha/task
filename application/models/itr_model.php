<?php

class Itr_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_count() {
        $query = $this->db->select('count(*) as cnt FROM itrs');
        $query = $this->db->get();
        return $query;
    }

    function get_all($num, $offset) {
        $query = $this->db->select('* FROM itrs order by itr_id desc')->limit($num, $offset);
        $query = $this->db->get();
        return $query;
    }

    function get_by_client($client_id, $num, $offset) {
    	$query = $this->db->select('* FROM itrs WHERE client_id ='.$client_id.' order by itr_id desc')->limit($num, $offset);
    	$query = $this->db->get();
    	return $query;
    }
    
    function get($task_id) {
        $query = $this->db->query('SELECT * FROM itrs WHERE task_id =' . $task_id);
        return $query;
    }

    function insert() {
        
        // Setting variables
        $this->task_id = mysql_real_escape_string($_POST['task_id']);
        $this->client_id = mysql_real_escape_string($_POST['client_id']);
        $this->date_of_uploading = mysql_real_escape_string($_POST['date_of_uploading']);
        $this->filed_by = mysql_real_escape_string($_POST['filed_by']);
        $this->assessment_year = mysql_real_escape_string($_POST['assessment_year']);
        $this->remarks = mysql_real_escape_string($_POST['uploadITRComment']);


//        $this->date_of_uploading = mysql_real_escape_string($_POST['date_of_uploading']);
//        $this->date_of_acknowledgement = mysql_real_escape_string($_POST['date_of_uploading']);
//        
//        $this->date_of_billing = mysql_real_escape_string($_POST['date_of_uploading']);
//        $this->date_of_bill_amount = mysql_real_escape_string($_POST['date_of_uploading']);

        $this->db->set('create_date', 'NOW()', FALSE);
        // Inserting..
        $this->db->insert('itrs', $this) or die($this->db->_error_message());

        return $this->db->insert_id();
    }

    function update_billing() {
        print_r($_POST);
        $this->db->query("UPDATE itrs SET remarks=CONCAT(remarks,'" . mysql_real_escape_string($_POST['finalizeITRTaskComment']) . "'), 
            date_of_billing='" . mysql_real_escape_string($_POST['date_of_billing']) . "', bill_amount='" . mysql_real_escape_string($_POST['bill_amount']) . "', 
                update_date=NOW() WHERE itr_id=" . $_POST['itr_id']) or die('error');
    }

    function update_mailing() {
        print_r($_POST);
        $this->db->query("UPDATE itrs SET remarks=CONCAT(remarks,'" . mysql_real_escape_string($_POST['mailITRComment']) . "'), 
            date_of_mailing='" . mysql_real_escape_string($_POST['date_of_mailing']) . "', update_date=NOW() WHERE itr_id=" . $_POST['itr_id']) or die('error');
    }

    function addRemark($remark, $itrId) {
        $this->db->query("UPDATE itrs SET remarks=CONCAT(remarks,'" . mysql_real_escape_string($remark) . "'), update_date=NOW() WHERE itr_id=" . $itrId) or die('error');
    }

    function get_remarks($itrId) {
        $query = $this->db->query('SELECT remarks FROM itrs WHERE itr_id =' . $itrId);

        return $query;
    }

}