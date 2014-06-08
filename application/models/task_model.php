<?php
/* TITLE : TASK MODEL */
class Task_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_count($status) {
        $ext_sql = '';
        $statusArr = array('new', 're-assigned', 'query', 'pending', 'completed', 'finalized');
        $ext_sql = ' WHERE 1 = 1 ';
        if (in_array($status, $statusArr)) {

            $ext_sql .= ' AND status = \'' . $status . '\'';
        } elseif ($status == 'all') {
            $ext_sql .= ' AND status <> \'completed\'' . ' AND status <> \'finalized\'';
        }
        $ext_sql .= ' AND emp_id =' . $_SESSION['emp_id'] . ' ORDER by status';
        $query = $this->db->select('count(*) as cnt FROM tasks' . $ext_sql);

        $query = $this->db->get();

        return $query;
    }

    function get_all($num, $offset, $status) {
        $ext_sql = '';
        $statusArr = array('new', 're-assigned', 'query', 'pending', 'completed', 'finalized', 'created', 'tofinalize');
        $ext_sql = ' WHERE 1 = 1 ';
        if (in_array($status, $statusArr)) {
            if ($status == 'query')
            	$ext_sql .= ' AND id in (SELECT task_id FROM `task_query` WHERE (raised_by ='.$_SESSION['emp_id'].' or requested_to='.$_SESSION['emp_id'].') AND status = \'open\')';
        	else if ($status == 'tofinalize')
        		$ext_sql .= ' AND status = \'' . 'completed' . '\' AND type in (SELECT type from `type_owners` WHERE emp_id='.$_SESSION['emp_id'].')';
            else if ($status != 'created')
        		$ext_sql .= ' AND status = \'' . $status . '\'';
            if ($status == 'created')
            	$ext_sql .= ' AND created_by = '.$_SESSION['emp_id'];
        } elseif ($status == 'all' || $status == 'super') {
            $ext_sql .= ' AND status <> \'completed\'' . ' AND status <> \'finalized\'';
        } 
        if (!($status == 'query' || $status == 'created' || $status == 'super' || $status == 'tofinalize')) $ext_sql .= ' AND emp_id =' . $_SESSION['emp_id'];
        $ext_sql .= ' ORDER by priority, update_date desc, status, id desc';
        $query = $this->db->select('* FROM tasks' . $ext_sql)->limit($num, $offset);

        $query = $this->db->get();

        return $query;
    }

    function get_count_client($client_id, $status) {
        $ext_sql = '';
        $statusArr = array('new', 're-assigned', 'query', 'pending', 'completed', 'finalized');
        $ext_sql = ' WHERE 1 = 1 ';
        if (in_array($status, $statusArr)) {

            $ext_sql .= ' AND status = \'' . $status . '\'';
        } elseif ($status == 'all') {
            $ext_sql .= ' AND status <> \'completed\'' . ' AND status <> \'finalized\'';
        }
        $ext_sql .= ' AND client_id ='.$client_id . ' ORDER by status';
        $query = $this->db->select('count(*) as cnt FROM tasks' . $ext_sql);

        $query = $this->db->get();

        return $query;
    }

    function get_tasks($client_id, $status, $num, $offset) {
        $ext_sql = '';
        $statusArr = array('new', 're-assigned', 'query', 'pending', 'completed', 'finalized');
        $ext_sql = ' WHERE 1 = 1 ';
        if (in_array($status, $statusArr)) {

            $ext_sql .= ' AND status = \'' . $status . '\'';
        } elseif ($status == 'all') {
            $ext_sql .= ' AND status <> \'finalized\''; 
            		//. ' AND status <> \'finalized\'';
        }
        $ext_sql .= ' AND client_id ='.$client_id . ' ORDER by update_date desc, status';
        $query = $this->db->select('* FROM tasks' . $ext_sql)->limit($num, $offset);
        ;

        $query = $this->db->get();

        return $query;
    }

    function get($taskId) {
        $query = $this->db->select('* FROM tasks WHERE id=' . $taskId);
        $query = $this->db->get();
        return $query;
    }

    function getTaskStatus($taskId) {
        $query = $this->db->select('status FROM tasks WHERE id=' . $taskId);
        $query = $this->db->get();
        return $query;
    }
    
    function addRemark($remark, $task_id) {
        $this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($remark) . "'), update_date=NOW() WHERE id=" . $task_id) or die('error');
    }

    function addQuery($query, $task_id, $emp_id) {
        $this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($query) . "'), 
            emp_id=$emp_id, status='query', update_date=NOW() WHERE id=" . $task_id) or die('error');
    }
    
    function updateQueryTask($task_id, $query, $move_to_emp_id, $task_status) {
    	if ($task_status == '')
        	$this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($query) . "'), 
            	emp_id=$move_to_emp_id, status='query', update_date=NOW() WHERE id=" . $task_id) or die('error');
		else        	
        	$this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($query) . "'), 
            	emp_id=$move_to_emp_id, status='$task_status', update_date=NOW() WHERE id=" . $task_id) or die('error');
    }
    
    function reAssign($reassign_comment, $task_id, $emp_id) {
        $this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($reassign_comment) . "'), 
            emp_id=$emp_id, status='re-assigned', update_date=NOW() WHERE id=" . $task_id) or die('error');
    }

    function closeTask($closeTaskComment, $task_id) {
        $this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($closeTaskComment) . "'), 
            status='completed', end_date=NOW(), update_date=NOW() WHERE id=" . $task_id) or die('error');
    }

    function createITR($itrTaskComment, $task_id) {
        $this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($itrTaskComment) . "'), 
            status='pending', end_date=NOW(), update_date=NOW() WHERE id=" . $task_id) or die('error');
    }

    function mailITR($itrTaskComment, $task_id) {
        $this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($itrTaskComment) . "'), 
            status='completed', end_date=NOW(), update_date=NOW() WHERE id=" . $task_id) or die('error');
    }

    function finalizeTask($finalizeTaskComment, $task_id) {
        $this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($finalizeTaskComment) . "'), 
            status='finalized', end_date=NOW(), update_date=NOW() WHERE id=" . $task_id) or die('error');
    }

    function pending($pendingTaskComment, $task_id) {
        $this->db->query("UPDATE tasks SET comments=CONCAT(comments,'" . mysql_real_escape_string($pendingTaskComment) . "'), 
            status='pending', update_date=NOW() WHERE id=" . $task_id) or die('error');
    }

    function get_remarks($taskId) {
        $query = $this->db->query('SELECT comments FROM tasks WHERE id =' . $taskId);

        return $query;
    }

    function get_details($taskId) {
        $query = $this->db->query('SELECT date_format(`start_date`, \'%d-%m-%Y\') as start_date, ' 
        .' date_format(`end_date`, \'%d-%m-%Y\') as end_date, date_format(`due_date`, \'%d-%m-%Y\') '
        .' as due_date, title, id FROM tasks WHERE id =' . $taskId);

        return $query;
    }

    function insert() {
        // Setting variables
        $this->title = mysql_real_escape_string($_POST['title']);
        $this->type = mysql_real_escape_string($_POST['type']);
        $this->client_id = mysql_real_escape_string($_POST['client_id']);
        $this->emp_id = mysql_real_escape_string($_POST['emp_id']);
        $this->company_id = mysql_real_escape_string($_POST['company']);
        $this->priority = mysql_real_escape_string($_POST['priority']);
        $this->start_date = mysql_real_escape_string($_POST['date_start']);
        $this->due_date = mysql_real_escape_string($_POST['date_end']);
        $this->created_by = mysql_real_escape_string($_SESSION['emp_id']);
        $this->comments = mysql_real_escape_string($_POST['remarks']);

//        $this->db->set('start_date', $_POST['date_start'] , FALSE);
//        $this->db->set('due_date', $_POST['date_end'], FALSE);
        
        $this->db->set('create_date', 'NOW()', FALSE);
        $this->db->set('update_date', 'NOW()', FALSE);

        // Inserting..
        $this->db->insert('tasks', $this) or die($this->db->_error_message());

        return $this->db->insert_id();
    }

    function edit() {
        // Setting variables
//        $this->title = mysql_real_escape_string($_POST['title']);
//        $this->description = mysql_real_escape_string($_POST['description']);
//        $this->type = mysql_real_escape_string($_POST['type']);
//        $this->client_id = mysql_real_escape_string($_POST['client_id']);
//        $this->emp_id = mysql_real_escape_string($_POST['emp_id']);
//        $this->priority = mysql_real_escape_string($_POST['priority']);
//        $this->start_date = mysql_real_escape_string($_POST['date_start'] . ' ' . $_POST['time_start']);
//        $this->due_date = mysql_real_escape_string($_POST['date_end'] . ' ' . $_POST['time_end']);
//
//        $this->db->set('create_date', 'NOW()', FALSE);
//        $this->db->set('update_date', 'NOW()', FALSE);

        echo $_POST;
        
        $task['id'] = $_POST['id'];
        $task['title'] = $_POST['title'];
        $task['type'] = $_POST['type'];
        $task['priority'] = $_POST['priority'];
        $task['company_id'] = $_POST['company'];
        $task['client_id'] = $_POST['client_id'];

//        $task['emp_id'] = $_POST['emp_id'];
//        $task['client_id'] = $_POST['client_id'];
//        $task['start_date'] = $_POST['date_start'];
//        $task['due_date'] = $_POST['date_end'];
        
        $this->db->where('id', $_POST['id']);
        $this->db->set('update_date', 'NOW()', FALSE);                        
        $this->db->update('tasks', $task); 
    }

    function get_all_open_status_cnt($sdate, $edate)
    {
        $query = $this->db->select('count(*) as cnt, status FROM `tasks` WHERE status <> \'completed\' and status <> \'finalized\' '. 
        'AND start_date between \'' .$sdate. '\''.' AND \''.$edate. '\' group by status');
        $query = $this->db->get();
        return $query;
    }

    function get_status_cnt($status, $sdate, $edate)
    {
    	if ($status == 'open')
    	{
	        $query = $this->db->select('count(*) as cnt FROM `tasks` WHERE status <> \'completed\' and status <> \'finalized\' '.
	        'AND start_date between \'' .$sdate. '\''.' AND \''.$edate. '\'');
	        $query = $this->db->get();
	        return $query;
    	} else 
    	{
	        $query = $this->db->select('count(*) as cnt FROM `tasks` WHERE status = \'' . $status . '\' '.
	        'AND start_date between \'' .$sdate. '\''.' AND \''.$edate. '\'');
	        $query = $this->db->get();
	        return $query;
    	}
    }

    function get_all_type_cnt($sdate, $edate)
    {
        $query = $this->db->select('count(*) as cnt, type FROM `tasks` '.
        	'WHERE start_date between \'' .$sdate. '\''.' AND \''.$edate. '\' group by type');
        $query = $this->db->get();
        return $query;
    }
    
    function get_all_status_per_month($sdate, $edate)
    {
        $query = $this->db->select(' month(CASE WHEN status <> \'completed\' and status <> \'finalized\' THEN start_date ELSE end_date END) as month,'.
    			'SUM(CASE WHEN status <> \'completed\' and status <> \'finalized\' THEN 1 ELSE 0 END) AS open, SUM(CASE status WHEN \'completed\' THEN 1 ELSE 0 END) AS completed,'.
    			'SUM(CASE status WHEN \'finalized\' THEN 1 ELSE 0 END) AS finalized '.
				'FROM tasks  WHERE start_date between \'' .$sdate. '\''.' AND \''.$edate. '\' or end_date between \'' .$sdate. '\''.' AND \''.$edate. '\' '.
				'GROUP BY '. 
				'(CASE WHEN status <> \'completed\' and status <> \'finalized\' THEN month(start_date) ELSE month(end_date) END)');
        $query = $this->db->get();
        return $query;
    }

    function get_task_report() {
        $ext_sql = '';
        $statusArr = array('new', 're-assigned', 'query', 'pending', 'completed', 'finalized');
        $ext_sql = ' WHERE 1 = 1 ';
        if (in_array($_POST['status'], $statusArr)) {
       		$ext_sql .= ' AND status = \'' . $_POST['status'] . '\'';
        } elseif ($_POST['status'] == 'all-open') {
            $ext_sql .= ' AND status <> \'completed\' and status <> \'finalized\' ';
        } elseif ($_POST['status'] == 'all-closed') {
        	$ext_sql .= ' AND status = \'completed\' or status = \'finalized\' ';
        }
        if ($_POST['emp_id'] != -1) $ext_sql .= ' AND emp_id = ' . $_POST['emp_id'];
        if ($_POST['client_id'] != -1) $ext_sql .= ' AND client_id = ' . $_POST['client_id'];
        if ($_POST['company'] != '') $ext_sql .= ' AND company_id = ' . $_POST['company'];
        if ($_POST['type'] != 'all') $ext_sql .= ' AND type = \'' . $_POST['type'] .'\'';
        if ($_POST['priority'] != 'all') $ext_sql .= ' AND priority = \'' . $_POST['priority'] .'\'';
        $date_sql = ' WHERE start_date between \'' .$_POST['date_start']. '\''.' AND \''. $_POST['date_end']. '\''.
        	' OR end_date BETWEEN \'' .$_POST['date_start']. '\''.' AND \''. $_POST['date_end']. '\'';
        
//        if ($_POST['date_start'] != '' && $_POST['date_end'] != '')
//        { 
//        	$date_sql .=  ' WHERE start_date between \'' .$_POST['date_start']. '\''.' AND \''. $_POST['date_end']. '\''.
//        	' OR end_date BETWEEN \'' .$_POST['date_start']. '\''.' AND \''. $_POST['date_end']. '\'';
//        }	
//        elseif ($_POST['date_start'] != '') 
//        {
//        	$date_sql .=  ' WHERE start_date BETWEEN \'' .$_POST['date_start']. '\''.' AND \'2014-03-31\''.
//        	' OR end_date BETWEEN \'' .$_POST['date_start']. '\''.' AND \'2014-03-31\'';
//        }
//        elseif ($_POST['date_end'] != '') 
//        {
//        	$date_sql .=  ' WHERE start_date BETWEEN \'2013-04-01\' AND \'' .$_POST['date_end']. '\''.
//        	' OR end_date BETWEEN \'2013-04-01\' AND \'' .$_POST['date_end']. '\'';
//        } 
//        else 
//        {
//        	$date_sql = ' WHERE start_date BETWEEN \'2013-04-01\' AND \'2014-03-31\' '.
//        		' OR end_date BETWEEN \'2013-04-01\' AND \'2014-03-31\' ';
//        }
        
        $query = $this->db->select('* from (select * FROM tasks' . $ext_sql. ') t'. $date_sql .'  ORDER by status, id desc');

        $query = $this->db->get();

        return $query;
    }    
}