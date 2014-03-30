<?php
class Employee_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get_name( $uid ){
        $query = $this->db->query('SELECT login FROM employees WHERE id='.mysql_real_escape_string($uid));
        
        return $query;
    }   
    /*
    * Function to check username and password are valid
    */
    function validEmployee( $username, $password ){
        $query = $this->db->query('SELECT * FROM employees WHERE status='."'active'".' AND login = \''.$username.'\' AND password=\''.md5($password).'\'');
        return $query;
    }

    function isLoginExist($login){
        $query = $this->db->query('SELECT count(*) as cnt FROM employees WHERE login = \''.$login.'\'');
        return $query;
    }
    
    function get_all_count(){
        $query = $this->db->select('count(*) as cnt FROM employees ORDER BY status, id');
        $query = $this->db->get();
        return $query;
    }
    function get_all($num, $offset){
        $query = $this->db->select(' * FROM employees ORDER BY status, update_date desc,')->limit($num, $offset);
        $query = $this->db->get();        
        return $query;
    }
    function get_active(){
        $query = $this->db->query('SELECT * FROM employees WHERE status='."'active'");
        return $query;
    }    
    function get($emp_id){
        $query = $this->db->query('SELECT * FROM employees WHERE id ='.$emp_id);
        return $query;
    }
    function get_others(){
        $query = $this->db->query('SELECT * FROM employees WHERE id <>'.$_SESSION['emp_id'].' and status='."'active'");
        return $query;
    }
    function delete($emp_id){
        $this->db->query("UPDATE employees SET status='inactive', update_date=NOW() WHERE id=".$emp_id) or die('error');
    }    
    function activate($emp_id){
        $this->db->query("UPDATE employees SET status='active', update_date=NOW() WHERE id=".$emp_id) or die('error');
    }       
    function change_password($emp_id, $password){
        $this->db->query("UPDATE employees SET password='".md5($password)."', update_date=NOW() WHERE id=".$emp_id) or die('error');
    }       
    function insert(){      
        // Setting variables
        $this->title = mysql_real_escape_string($_POST['title']);
        $this->full_name = mysql_real_escape_string($_POST['fullname']);
        $this->login = mysql_real_escape_string($_POST['login']);
        $this->password = md5(mysql_real_escape_string($_POST['password']));
        $this->phone = mysql_real_escape_string($_POST['phone']);
        $this->email = mysql_real_escape_string($_POST['email']);
        $this->address = mysql_real_escape_string($_POST['address']);
        $this->role_id = mysql_real_escape_string($_POST['role_id']);
        
        $this->db->set('create_date', 'NOW()', FALSE);
        $this->db->set('update_date', 'NOW()', FALSE);
        
        print_r($this);
        // Inserting..
        $this->db->insert('employees', $this)  or die($this->db->_error_message());
        
        return $this->db->insert_id();
    }    
    function edit($emp){
        $this->db->set('update_date', 'NOW()', FALSE);
        $this->db->where('id', $emp['id']);
        $this->db->update('employees', $emp); 
    }    
    
}