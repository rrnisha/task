<?php
/*
* Model file for user
*/
class User_model extends CI_Model {
    /*
    * Constructor to initialize.
    */
    function __construct(){
        parent::__construct();
    }
    function get( $id ){
        $query = $this->db->query('SELECT * FROM users WHERE id = '.$id);
        
        return $query;
    }
    /*
    * Function to check username and password are valid
    */
    function validEmployee( $username, $password ){
        $query = $this->db->query('SELECT * FROM users WHERE username = \''.$username.'\' AND password=\''.md5($password).'\'');
        
        return $query;
        
    }
    /*
    * Function to insert discussions.
    */
    function insert(){               
        // Setting variables
        $this->username = $_POST['username'];
        $this->password = md5($_POST['password']);
        $this->name = $_POST['name'];
        $this->db->set('insertion_date', 'NOW()', FALSE);
        $this->db->set('updation_date', 'NOW()', FALSE);
        
        // Inserting..
        $this->db->insert('users', $this)  or die($this->db->_error_message());
        
        return $this->db->insert_id();
    } 
}
?>