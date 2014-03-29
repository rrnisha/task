<?php
class Task_Query_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get($taskId){
        $query = $this->db->query('SELECT * FROM task_query WHERE task_id='.$taskId.' ORDER BY id desc');
        
        return $query;
    }    
  
    function getOpenQueryCount($taskId){
        $query = $this->db->query('SELECT count(*) as cnt FROM task_query WHERE task_id='.$taskId.' AND status=\'open\'');
        return $query;
    }    
    
    function getQuery($taskId, $emp_id){
        $query = $this->db->query('SELECT * FROM task_query WHERE task_id='.$taskId.' AND requested_to='.$emp_id.' AND status=\'open\'');
        return $query;
    }    
    
    function getQueryRaisedBy($taskId, $emp_id){
        $query = $this->db->query('SELECT * FROM task_query WHERE task_id='.$taskId.' AND raised_by='.$emp_id.' AND status=\'open\'');
        return $query;
    }  

    function answerQuery($id){
        $this->db->query("UPDATE task_query SET status='answered', update_date=NOW() WHERE id=" . $id) or die('error');
    }
       
    function closeQueryByTaskId($taskId){
        $this->db->query("UPDATE task_query SET status='closed', update_date=NOW() WHERE task_id=" . $taskId) or die('error');
    }
    
    function closeQueryById($id){
        $this->db->query("UPDATE task_query SET status='closed', update_date=NOW() WHERE id=" . $id) or die('error');
    }
    
    function get_all(){
        $query = $this->db->query('SELECT * FROM task_query ORDER BY id desc');
        
        return $query;
    }
    
    function insert($created_by, $task_status){      
        // Setting variables
        $this->task_id = mysql_real_escape_string($_POST['task_id']);        
        $this->status = 'open';
        $this->db->set('create_date', 'NOW()', FALSE);
        $this->requested_to = mysql_real_escape_string($_POST['emp_id']);
        $this->raised_by = mysql_real_escape_string($_SESSION['emp_id']);
        $this->db->set('update_date', 'NOW()', FALSE);
		$this->created_by = $created_by; 
		$this->task_status = $task_status;
        // Inserting..
        $this->db->insert('task_query', $this)  or die($this->db->_error_message());
        
        return $this->db->insert_id();
    }    
}