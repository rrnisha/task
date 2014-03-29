<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Task extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->helper('date');
        $this->session->requireLogin();
        $this->load->model('Task_model');
        $this->load->model('Task_Query_model');
        $this->load->model('Year_model');
        $this->load->model('Itr_model');
        $this->load->model('Client_model');
        $this->load->model('Employee_model');
    }

    public function add_remark() {
        if (isset($_POST['remarks']) && $_POST['remarks'] && isset($_POST['sr_task_id']) && $_POST['sr_task_id']) {
            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $remark = $date.' : '. $res[0]->login . ' : ' . $_POST['remarks'] . "<br>";

            $this->Task_model->addRemark($remark, $_POST['sr_task_id']);
            echo '|||success|||';
        }
        exit;
    }
    public function get_client(){
        $search_query = $this->Client_model->search($_GET['term']);

        $clients = array();
        foreach ($search_query->result() as $row) {
            $clients[] = array('id'=>$row->id,
                               'label'=>$row->full_name,
                               'value'=>$row->full_name
                          );

        }
        echo json_encode($clients);
    }
    public function add_query() {
        if (isset($_POST['query']) && $_POST['query'] && isset($_POST['task_id']) && $_POST['task_id'] && isset($_POST['emp_id']) && $_POST['emp_id']) {
            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $query = $date.' : '. $res[0]->login . ' : ' . $_POST['query'] . "<br>";
            
            $user_query = $this->Task_model->getTaskStatus($_POST['task_id']);
            $res = $user_query->result();
            $task_status = $res[0]->status;
            
            $this->Task_model->addQuery($query, $_POST['task_id'], $_POST['emp_id']);

            $user_query = $this->Task_Query_model->getQuery($_POST['task_id'], $_SESSION['emp_id']);
            $res = $user_query->result();
            $created_by = $_SESSION['emp_id'];
            
            if (count($res) >= 1){
            	$created_by = $res[0]->created_by;
	            $task_status = $res[0]->task_status;
            }
            $this->Task_Query_model->insert($created_by, $task_status);
            echo '|||success|||';
        }
        exit;
    }
    public function answer_query() {
        if (isset($_POST['query']) && $_POST['query'] && isset($_POST['task_id']) && $_POST['task_id']) {
            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $query = $date.' : '. $res[0]->login . ' : ' . $_POST['query'] . "<br>";

            $user_query = $this->Task_Query_model->getQuery($_POST['task_id'], $_SESSION['emp_id']);
            $res = $user_query->result();
            $query_id = $res[0]->id;
            $move_task_query_raiser = $res[0]->raised_by;
            $task_status = $res[0]->task_status;

            $user_query = $this->Task_Query_model->getOpenQueryCount($_POST['task_id']);
            $res = $user_query->result();
            $cnt = $res[0]->cnt;
            
            if ($cnt == 1){
            	$this->Task_Query_model->closeQueryByTaskId($_POST['task_id']);
				$this->Task_model->updateQueryTask($_POST['task_id'], $query, $move_task_query_raiser, $task_status);
            }
            else{
            	$this->Task_Query_model->answerQuery($query_id);
            	$this->Task_model->updateQueryTask($_POST['task_id'], $query, $move_task_query_raiser, '');
            }
            echo '|||success|||';
        }
        exit;
    }
    public function close_query() {
        if (isset($_POST['query']) && $_POST['query'] && isset($_POST['task_id']) && $_POST['task_id']) {
            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d/m/Y', now());
            $query = $date.' : '. $res[0]->login . ' : ' . $_POST['query'] . "<br>";

            $user_query = $this->Task_Query_model->getQueryRaisedBy($_POST['task_id'], $_SESSION['emp_id']);
            $res = $user_query->result();
            $query_id = $res[0]->id;
            $raised_by = $res[0]->raised_by;
            $task_status = $res[0]->task_status;
            $created_by = $res[0]->created_by;
            
            if($raised_by == $created_by)
            {
            	$this->Task_Query_model->closeQueryByTaskId($_POST['task_id']);
            	$this->Task_model->updateQueryTask($_POST['task_id'], $query, $raised_by, $task_status);
            }
            else
            {
            	$this->Task_Query_model->closeQueryById($query_id);
            	$this->Task_model->updateQueryTask($_POST['task_id'], $query, $raised_by, '');
            }
			
            echo '|||success|||';
        }
        exit;
    }    
    public function re_assign() {
        if (isset($_POST['reAssignComment']) && $_POST['reAssignComment'] && isset($_POST['task_id']) && $_POST['task_id'] && isset($_POST['emp_id']) && $_POST['emp_id']) {

            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $reassign_comment = $date.' : '. $res[0]->login . ' : ' . $_POST['reAssignComment'] . "<br>";

            $this->Task_model->reAssign($reassign_comment, $_POST['task_id'], $_POST['emp_id']);
            echo '|||success|||';
        }
        exit;
    }

    public function close_task() {
        if (isset($_POST['closeTaskComment']) && $_POST['closeTaskComment'] && isset($_POST['task_id']) && $_POST['task_id']) {

            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $closeTaskComment = $date.' : '. $res[0]->login . ' : ' . $_POST['closeTaskComment'] . "<br>";

            $this->Task_model->closeTask($closeTaskComment, $_POST['task_id']);
            echo '|||success|||' . $_POST['status_page'];
        }
        exit;
    }

    public function upload_itr_task() {
        if (isset($_POST['uploadITRComment']) && $_POST['uploadITRComment'] && isset($_POST['task_id']) && $_POST['task_id']) {

            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $uploadITRComment = $date.' : '. $res[0]->login . ' : ' . $_POST['uploadITRComment'] . "<br>";

            $this->Task_model->createITR($uploadITRComment, $_POST['task_id']);
            $_POST['uploadITRComment'] = $uploadITRComment;
            
            $_POST['date_of_uploading'] = $this->changeDateFormat($_POST['date_of_uploading']);

            $this->Itr_model->insert($_POST);
            echo '|||success|||' . $_POST['status_page'];
        }
        exit;
    }

    public function finalize_task() {
        if (isset($_POST['finalizeTaskComment']) && $_POST['finalizeTaskComment'] && isset($_POST['task_id']) && $_POST['task_id']) {

            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $finalizeTaskComment = $date.' : '. $res[0]->login . ' : ' . $_POST['finalizeTaskComment'] . "<br>";

            $this->Task_model->finalizeTask($finalizeTaskComment, $_POST['task_id']);
            echo '|||success|||';
        }
        exit;
    }

    public function mail_itr_task() {
        if (isset($_POST['mailITRComment']) && $_POST['mailITRComment'] && isset($_POST['task_id']) && $_POST['task_id']) {

            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $mailITRComment = $date.' : '. $res[0]->login . ' : ' . $_POST['mailITRComment'] . "<br>";

            $this->Task_model->mailITR($mailITRComment, $_POST['task_id']);
            $_POST['mailITRComment'] = $mailITRComment;

            $_POST['date_of_mailing'] = $this->changeDateFormat($_POST['date_of_mailing']);
            
            $this->Itr_model->update_mailing($_POST);
            echo '|||success|||'. $_POST['status_page'];
        }
        exit;
    }

    public function finalize_itr_task() {
        if (isset($_POST['finalizeITRTaskComment']) && $_POST['finalizeITRTaskComment'] && isset($_POST['task_id']) && $_POST['task_id']) {

            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $finalizeITRTaskComment = $date.' : '. $res[0]->login . ' : ' . $_POST['finalizeITRTaskComment'] . "<br>";

            $this->Task_model->finalizeTask($finalizeITRTaskComment, $_POST['task_id']);
            $_POST['finalizeITRTaskComment'] = $finalizeITRTaskComment;
            
            $_POST['date_of_billing'] = $this->changeDateFormat($_POST['date_of_billing']);
            
            $this->Itr_model->update_billing($_POST);
            echo '|||success|||';
        }
        exit;
    }

    public function pending() {
        if (isset($_POST['pendingTaskComment']) && $_POST['pendingTaskComment'] && isset($_POST['task_id']) && $_POST['task_id']) {

            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $pendingTaskComment = $date.' : '. $res[0]->login . ' : ' . $_POST['pendingTaskComment'] . "<br>";

            $this->Task_model->pending($pendingTaskComment, $_POST['task_id']);
            echo '|||success|||' . $_POST['status_page'];
        }
        exit;
    }

    public function list_remarks($taskId) {
        $remark_query = $this->Task_model->get_remarks($taskId);
        $res = $remark_query->result();
        $data['remarks'] = $res[0]->comments;

        $this->load->view('task/remarks', $data);
    }

    public function list_details($taskId) {
        $details_query = $this->Task_model->get_details($taskId);
        $res = $details_query->result();
        $data['details'] = $res;

        $this->load->view('task/details', $data);
    }

    public function create() {
        $data = array();

        $data['values'] = array();
        $data['values']['title'] = '';
        $data['values']['type'] = 'other';
        $data['values']['client_id'] = '';
        $data['values']['emp_id'] = '';
        $data['values']['priority'] = 'medium';
        $data['values']['comments'] = '';
        $data['values']['date_start'] = '';
        $data['values']['date_end'] = '';
        $data['values']['remarks'] = '';

        if (isset($_POST['create']) && $_POST['create'] == 'Create') {
        	print_r($_POST);
            $data['values'] = $_POST;
            // Loading form validation library
            $this->load->library('form_validation');
            // Setting validation rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('client_id', 'Client', 'callback_client_id_check');
            $this->form_validation->set_rules('emp_id', 'Employee', 'required');
            $this->form_validation->set_rules('priority', 'Priority', 'required');
            $this->form_validation->set_rules('date_start', 'from date', 'required');
            $this->form_validation->set_rules('date_end', 'end date', 'required');
            
            $_POST['date_start'] = $this->changeDateFormat($_POST['date_start']);
            $_POST['date_end'] = $this->changeDateFormat($_POST['date_end']);
            
            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();

            $date = date('d-m-Y', gmt_to_local(now(),'UP45'));
            $comment =  '';
            if ($_POST['remarks'] != '')
            $comment = $date.' : '. $res[0]->login . ' : ' . $_POST['remarks'] . "<br>";
            
            $_POST['remarks'] = $comment;
            
            // Validating..
            if ($this->form_validation->run() == TRUE) {
                $this->Task_model->insert();
                redirect('/task/index?msg=success');
            }
        }

        // Get all clients
        $client_query = $this->Client_model->get_all_clients();

        $data['clients'] = array();
        $data['clients']['-1'] = '-- Select a Client --';
        foreach ($client_query->result() as $res) {
            $data['clients'][$res->id] = $res->full_name;
        }

        // Get all employees
        $employee_query = $this->Employee_model->get_active();

        $data['employees'] = array();
        $data['employees'][''] = '-- Select --';
        foreach ($employee_query->result() as $res) {
            $data['employees'][$res->id] = $res->login;
        }

        $this->load->view('layout/header');
        $this->load->view('task/create', $data);
        $this->load->view('layout/footer');
    }

    public function client_id_check($str)
    {
    	if ($str == '-1')
    	{
    		$this->form_validation->set_message('client_id_check', 'Please select a valid client');
    		return FALSE;
    	}
    	else
    	{
    		return TRUE;
    	}
    }
    public function index($status = 'all') {
        $data = array();
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';

        $data['status'] = $status;

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/task/index/' . $status;
        $cnt_query = $this->Task_model->get_count($status);
        $cnt_res = $cnt_query->result();
        $config['total_rows'] = $cnt_res[0]->cnt;
        $config['per_page'] = 10;        
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        $task_query = $this->Task_model->get_all($config['per_page'], $this->uri->segment(4), $status);
        $data['tasks'] = array();
        foreach ($task_query->result() as $row) {
            $client_query = $this->Client_model->get($row->client_id);
            $client_result = $client_query->result();
            $row->client_name = '';
            if (count($client_result) >= 1) {
            	$row->client_name = $client_result[0]->full_name;
            }

            $emp_name_query = $this->Employee_model->get_name($row->emp_id);
            $emp_name_result = $emp_name_query->result();
            $row->emp_name = $emp_name_result[0]->login;

            if ($row->type == 'itr') {
                $itr_query = $this->Itr_model->get($row->id);
                $itr_result = $itr_query->result();
                if (count($itr_result) == 1) {
                    $row->itr_id = $itr_result[0]->itr_id;
                    $row->assessment_year = $itr_result[0]->assessment_year;
                }
                else {
                    $row->itr_id = '';
                    $row->assessment_year = '';
                }
            }
            
            $row->start_date = mdate('%d-%m-%Y', strtotime($row->start_date));
            $row->due_date = mdate('%d-%m-%Y', strtotime($row->due_date));
            if ($row->end_date != '0000-00-00')
            	$row->end_date = mdate('%d-%m-%Y', strtotime($row->end_date));
            else
            	$row->end_date = '00-00-0000';
            
            $data['tasks'][] = $row;
        }

        // Get all other employees than the logged employee
        $emp_query = $this->Employee_model->get_others();

        $data['employees'] = array();
        foreach ($emp_query->result() as $res) {
            $data['employees'][$res->id] = $res->login;
        }

        // Get all other employees than the logged employee
        $emp_active_query = $this->Employee_model->get_active();

        $data['all_employees'] = array();
        foreach ($emp_active_query->result() as $res) {
            $data['all_employees'][$res->id] = $res->login;
        }
        
        $data['assessment_year'] = array();
        $fy_query = $this->Year_model->get();
        $data['assessment_year'][''] = '-- Select --';
        foreach ($fy_query->result() as $res) {
            $data['assessment_year'][$res->assessment_year] = $res->assessment_year;
        }        
        $this->load->view('layout/header');
        $this->load->view('task/index', $data);
        $this->load->view('layout/footer');
    }

    public function get($taskId) {
        $task_query = $this->Task_model->get($taskId);
        $res = $task_query->result();
        $data['task'] = $res[0];
            
        $this->load->view('layout/header');
        $this->load->view('task/edit', $data);
        $this->load->view('layout/footer');
    }

    public function edit() {
        echo $_POST['id'];
        if (isset($_POST['Yes']) && $_POST['Yes'] == 'Ok') {
            $this->Task_model->edit();
            redirect('/task/index?msg=taskEditSuccess');
        }
    }

    public function reports() {
        $data = array();
        $this->load->view('task/reports', $data);
    }    
    
	public function email() {
        $data = array();

        $this->load->library('email');

		$config['protocol'] = 'sendmail';
		$config['mailpath'] = 'D:\xampp\sendmail\sendmail.exe -t';
		$config['mailtype'] = 'html'; 
		
		$config['smtp_host'] = 'smtp.gmail.com'; 
		$config['smtp_port'] = 587; 
		$config['smtp_user'] = 'rindirani1956@gmail.com'; 
		$config['smtp_pass'] = 'rindirani1956'; 
		
		$config['charset'] = 'utf8';
		$config['crlf'] = '\r\n';
		$config['newline'] = '\r\n';
		$config['wordwrap'] = FALSE;
		
		$this->email->initialize($config);
		
		$this->email->from('rindirani1956@gmail.com', 'Test Task Mail Impl');
		$this->email->to('r.rishishankar@gmail.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
//		$this->email->message($this->load->view('email/testemail', $data, true));
		
		$this->email->send();
		
		echo $this->email->print_debugger();
//        $this->load->view('email/testemail', $data);
    }   

    
    // UTILITY FUNCTION
    public function changeDateFormat($date)
    {
    	if ($date == '') return '';
		$dateArr = explode('-',$date);
		$ret_date = $dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0];
	    return $ret_date; 
    }    
}
