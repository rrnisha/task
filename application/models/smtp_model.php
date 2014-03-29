<?php

class Smtp_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get() {
        $query = $this->db->query('SELECT * FROM smtp');
        return $query;
    }

    function getSmtp($id) {
        $query = $this->db->query('SELECT * FROM smtp where id='.$id);
        return $query;
    }
    
    function insert() {
        // Setting variables
        $this->server = mysql_real_escape_string($_POST['server']);
        $this->port = mysql_real_escape_string($_POST['port']);
        $this->username = mysql_real_escape_string($_POST['username']);
        $this->password  = md5(mysql_real_escape_string($_POST['password']));
        
        $this->db->set('create_date', 'NOW()', FALSE);
        // Inserting..
        $this->db->insert('smtp', $this) or die($this->db->_error_message());
        return $this->db->insert_id();
    }

}