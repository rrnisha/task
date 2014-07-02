<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller for users.
 */

class Client extends CI_Controller {
    /*
     * Constructor to load the necessary database, models, helpers and etc.
     */

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->helper(array('url', 'form'));
        $this->load->model('Client_model');
        $this->load->model('Role_model');
        $this->load->model('Task_model');
        $this->load->model('Itr_model');
        $this->load->model('Register_model');
        $this->load->model('Document_model');
        $this->load->model('Employee_model');
        $this->load->library('session');
        $this->session->requireLogin();
    }

    public function create() {
        $data = array();

        $data['values'] = array();
        $data['values']['title'] = 'Mfrs';
        $data['values']['fullname'] = '';
        $data['values']['phone_mobile'] = '';
        $data['values']['phone_office'] = '';
        $data['values']['phone_mobile2'] = '';
        $data['values']['phone_office2'] = '';
        $data['values']['client_type'] = 'company';
        $data['values']['email'] = '';
        $data['values']['dob'] = '';
        $data['values']['address'] = '';
        $data['values']['pan'] = '';
        $data['values']['genius_id'] = '';
        $data['values']['file_id'] = '';

        if (isset($_POST['create']) && $_POST['create'] == 'Create') {
            $data['values'] = $_POST;
            // Loading form validation library
            $this->load->library('form_validation');
            // Setting validation rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('fullname', 'Name', 'required');
            $this->form_validation->set_rules('phone_mobile', 'Mobile Phone No', 'trim|required|xss_clean'); //|callback_mobile_regex_match
//             $this->form_validation->set_rules('phone_office', 'Office Phone No', 'required');
            $this->form_validation->set_rules('pan', 'PAN/TAN', 'trim|required|xss_clean|max_length[10]|callback_pan_regex_match');
            $this->form_validation->set_rules('email', 'Email', 'callback_email_regex_match');
//             $this->form_validation->set_rules('address', 'Address', 'required');
//             $this->form_validation->set_rules('client_type', 'Type', 'required');
            $this->form_validation->set_rules('dob', 'Date of Birth/Incorporation', 'required');
            $this->form_validation->set_rules('genius_id', 'Genius Id', 'required');
            $this->form_validation->set_rules('file_id', 'File Id', 'required');

            // Validating..
            if ($this->form_validation->run() == TRUE) {
                $this->Client_model->insert();
                redirect('/client/lists?msg=clientCreateSuccess');
            }
        }

        $this->load->view('layout/header');
        $this->load->view('client/create', $data);
        $this->load->view('layout/footer');
    }

    public function email_regex_match($email) {
    	if ($email=='') {
    		return TRUE;
    	} else {
    		if (preg_match('/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email)) {
    			return TRUE;
    		} else {
    			$this->form_validation->set_message('email_regex_match', 'Please enter a valid email');
    			return FALSE;
    		}
    		
    	}
    }
    
    public function mobile_regex_match($str)
    {
    	if (preg_match('/^\d{*}$/', $str)) {
    		return TRUE;
    	} else {
    		$this->form_validation->set_message('pan_regex_match', 'Please enter a valid pan number');
    		return FALSE;
    	}
    }
    
    public function pan_regex_match($str)
    {
      if (preg_match('/^[A-Z]{5}\d{4}[A-Z]{1}$/', $str)) {
    	return TRUE;
	  } else {
	  	$this->form_validation->set_message('pan_regex_match', 'Please enter a valid pan number');
	    return FALSE;
	  }
    }
    
    public function edit() {

        $data = array();

        if (isset($_POST['edit']) && $_POST['edit'] == 'Ok') {
            $data['values']['id'] = $_POST['id'];
            $data['values']['title'] = $_POST['title'];
            $data['values']['full_name'] = $_POST['full_name'] ;
            $data['values']['phone_mobile'] = $_POST['phone_mobile'];
            $data['values']['phone_office'] = $_POST['phone_office'];
            $data['values']['phone_mobile2'] = $_POST['phone_mobile2'];
            $data['values']['phone_office2'] = $_POST['phone_office2'];
            $data['values']['client_type'] = $_POST['client_type'];
            $data['values']['dob'] = $_POST['dob'];
            $data['values']['email'] = $_POST['email'];
            $data['values']['address'] = $_POST['address'];
            $data['values']['pan'] = $_POST['pan'];
            $data['values']['genius_id'] = $_POST['genius_id'];
            $data['values']['file_id'] = $_POST['file_id'];

            // Loading form validation library
           $this->load->library('form_validation');
           // Setting validation rules
           $this->form_validation->set_rules('title', 'Title', 'required');    
           $this->form_validation->set_rules('full_name', 'Name', 'required');    
           $this->form_validation->set_rules('phone_mobile', 'Mobile Phone No', 'required');    
           $this->form_validation->set_rules('pan', 'PAN/TAN', 'trim|required|xss_clean|max_length[10]|callback_pan_regex_match');    
           $this->form_validation->set_rules('client_type', 'Client Type', 'required');
           $this->form_validation->set_rules('dob', 'Date of Birth/Incorporation', 'required');
           $this->form_validation->set_rules('email', 'Email', 'callback_email_regex_match');
           $this->form_validation->set_rules('genius_id', 'Genius Id', 'required');    
           $this->form_validation->set_rules('file_id', 'File Id', 'required');    
            // Validating..
           if ($this->form_validation->run() == TRUE ) {
           		$data['values']['dob'] = $this->changeDateFormat($_POST['dob']);
	       		$this->Client_model->edit($data['values']);
	            redirect('/client/lists?msg=clientEditSuccess');
           } 
        }
        $client_query = $this->Client_model->get($_POST['id']);
        $res = $client_query->result();
        if ($res[0]->dob!="0000-00-00") 
        	$res[0]->dob = mdate('%d-%m-%Y', strtotime($res[0]->dob));
        $data['client'] = $res[0];
                
        $this->load->view('layout/header');
        $this->load->view('client/edit', $data);
        $this->load->view('layout/footer');
    }

    public function get($clientId, $option) {
        $client_query = $this->Client_model->get($clientId);
        $res = $client_query->result();
        if ($res[0]->dob!="0000-00-00") 
        	$res[0]->dob = mdate('%d-%m-%Y', strtotime($res[0]->dob));
        $data['client'] = $res[0];
        $this->load->view('layout/header');
        if ($option=="edit") {
        	$this->load->view('client/edit', $data);
        } else if ($option=="view") {
        	$this->load->view('client/view', $data);
        }
        $this->load->view('layout/footer');
    }

    public function lists($page='client') {
        $data = array();
        $data['page'] = $page;
        
        $client_id = isset($_POST['filter_client_id']) ? $_POST['filter_client_id'] : '';;
        if ($page == 'filter'){
        	if (isset($_POST['filter_client_id']) && $_POST['filter_client_id']=='') {
        		$client_id = -1;
        	}
        	$data['filter_client_id']=$client_id;
        	$data['filter_client_search']=isset($_POST['filter_client_search']) ? $_POST['filter_client_search'] : '';
        	$data['msg'] = isset($_POST['msg']) ? $_POST['msg'] : '';
        }else {
        	$data['filter_client_id']='';
        	$data['filter_client_search']='';
        	$data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';
        }
        $this->load->library('pagination');
        
        if ($client_id == ''){

        	$cnt_query = $this->Client_model->get_all_count();
	        $config['base_url'] = base_url() . 'index.php/client/lists/';
	        $cnt_query = $this->Client_model->get_all_count();
	        $cnt_res = $cnt_query->result();
	        $config['total_rows'] = $cnt_res[0]->cnt;
	        $config['per_page'] = 10;        
	        $config['uri_segment'] = 3;
	
	        $this->pagination->initialize($config);
        	$client_query = $this->Client_model->get_all($config['per_page'], $this->uri->segment(3));
        }
        else
        	$client_query = $this->Client_model->get($client_id);
        
        $data['clients'] = array();
        if (count($client_query->result())==0) {
	        $this->load->view('layout/header');
	        $data['msg'] = 'clientNotFound';
	        $this->load->view('client/list', $data);
	        $this->load->view('layout/footer');
        	
        } else {
	        foreach ($client_query->result() as $row) {
	        	if ($row->dob!="0000-00-00")
	        		$row->dob = mdate('%d-%m-%Y', strtotime($row->dob));
	            $data['clients'][] = $row;
	        }
	
	        $this->load->view('layout/header');
	        $this->load->view('client/list', $data);
	        $this->load->view('layout/footer');
        }
    }

    public function search_index() {
        if (isset($_POST['client_id']) && $_POST['client_id'] )
        {
            echo '|||success|||' . $_POST['client_id'] . '|||';
        } else {
            echo '|||failure|||' . $_POST['client_id'] . '|||';
        }
    }

    public function index($client_id, $status='all') {
        $data = array();
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';

        $client_query = $this->Client_model->get($client_id);
        $data['status'] = $status;
        $data['client_id'] = $client_id;
        $data['clients'] = array();
        foreach ($client_query->result() as $row) {
            $data['clients'][] = $row;
        }

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/client/index/'.$client_id;
        $cnt_query = $this->Task_model->get_count_client($client_id, $status);
        $cnt_res = $cnt_query->result();
        $config['total_rows'] = $cnt_res[0]->cnt;
        $config['per_page'] = 9;        
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        $client_task_query = $this->Task_model->get_tasks($client_id, $status, $config['per_page'], $this->uri->segment(4));
        $data['tasks'] = array();
        foreach ($client_task_query->result() as $row) {
            $client_query = $this->Client_model->get($row->client_id);
            $client_result = $client_query->result();
            $row->client_name = $client_result[0]->full_name;

            $emp_name_query = $this->Employee_model->get_name($row->emp_id);
            $emp_name_result = $emp_name_query->result();
            $row->emp_name = $emp_name_result[0]->login;

            if ($row->type == 'itr') {
                $itr_query = $this->Itr_model->get($row->id);
                $itr_result = $itr_query->result();
                if (count($itr_result) == 1)
                    $row->itr_id = $itr_result[0]->itr_id;
                else 
                    $row->itr_id = '';
            }
            
            $row->start_date = mdate('%d-%m-%Y', strtotime($row->start_date));
            $row->due_date = mdate('%d-%m-%Y', strtotime($row->due_date));
            if ($row->end_date != '0000-00-00')
                $row->end_date = mdate('%d-%m-%Y', strtotime($row->end_date));
            else
                $row->end_date = '00-00-0000';

            $data['tasks'][] = $row;
        }

        $document_query = $this->Register_model->get_documents($client_id, 'inward');

        $data['documents_inward'] = array();
        foreach ($document_query->result() as $row) {
//            $client_query = $this->Client_model->get($row->client_id);
//            $client_result = $client_query->result();
//            $row->client_name = $client_result[0]->full_name;

            $received_emp_name_query = $this->Employee_model->get_name($row->by_employee);
            $received_emp_name_result = $received_emp_name_query->result();
            if (count($received_emp_name_result) < 1)
                $row->received_by_name = '';
            else
                $row->received_by_name = $received_emp_name_result[0]->login;

            $data['documents_inward'][] = $row;
        }

        $document_query = $this->Register_model->get_documents($client_id, 'outward');

        $data['documents_outward'] = array();
        foreach ($document_query->result() as $row) {
//            $client_query = $this->Client_model->get($row->client_id);
//            $client_result = $client_query->result();
//            $row->client_name = $client_result[0]->full_name;

            $surrender_emp_name_query = $this->Employee_model->get_name($row->by_employee);
            $surrender_emp_name_result = $surrender_emp_name_query->result();
            if (count($surrender_emp_name_result) < 1)
                $row->surrender_by_name = '';
            else
                $row->surrender_by_name = $surrender_emp_name_result[0]->login;

            $data['documents_outward'][] = $row;
        }
        
        // Get all employees
        $employee_query = $this->Employee_model->get_active();

        $data['employees'] = array();
        $data['employees'][''] = '-- Select --';
        foreach ($employee_query->result() as $res) {
            $data['employees'][$res->id] = $res->full_name;
        }
        
        $this->load->view('layout/header');
        $this->load->view('client/index', $data);
        $this->load->view('layout/footer');
    }

    public function delete() {
        if (isset($_POST['emp_id']) && $_POST['emp_id']) {
            $user_query = $this->Client_model->delete($_POST['emp_id']);
            echo '|||success|||';
        }
        exit;
    }

    public function activate() {
        if (isset($_POST['emp_id']) && $_POST['emp_id']) {
            $user_query = $this->Client_model->activate($_POST['emp_id']);
            echo '|||success|||';
        }
        exit;
    }

    public function read() {
    	$data = array();
    	// Load the spreadsheet reader library
    	$this->load->library('excel_reader');
    	 
    	// Read the spreadsheet via a relative path to the document
    	// for example $this->excel_reader->read('./uploads/file.xls');
    	$this->excel_reader->read('C:\xampp\htdocs\tasks\application\controllers\client.xls');
    	 
    	// Get the contents of the first worksheet
    	$worksheet = $this->excel_reader->sheets[0];
    	 
    	$numRows = $worksheet['numRows']; // ex: 14
    	$numCols = $worksheet['numCols']; // ex: 4
    	$cells = $worksheet['cells']; // the 1st row are usually the field's name
    	 
    	$data['numrows'] = $numRows;
    	$data['numcols'] = $numCols;
    	$data['cells'] = $cells;
    	 
    	$this->load->view('layout/header');
    	$this->load->view('client/read', $data);
    	$this->load->view('layout/footer');
    }
    
    public function upload() {
    	$data = array();
        if (isset($_POST['Upload']) && $_POST['Upload'] == 'Ok') {
            for($i=0;$i<count($_POST["sno"]);$i++) {
            	$_POST['type'][$i] = '-';
            	if (isset($_POST['dob'][$i]) && $_POST['dob'][$i]!='-') {
            		$_POST['dob'][$i] = $this->changeDateFormatSlash($_POST['dob'][$i]);
            		$_POST['type'][$i] = 'individual';
            	}
            	else if (isset($_POST['doi'][$i]) && $_POST['doi'][$i]!='-') {
            		$_POST['dob'][$i] = $this->changeDateFormatSlash($_POST['doi'][$i]);
            		$_POST['type'][$i] = 'company';
            	}
            	
            	$this->Client_model->upload($i);
            }
        }
                
        $this->load->view('layout/header');
        $this->load->view('client/read', $data);
        $this->load->view('layout/footer');
    }
        
    // UTILITY FUNCTION
    public function changeDateFormat($date)
    {
    	if ($date == '') return '';
    	$dateArr = explode('-',$date);
    	$ret_date = $dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0];
    	return $ret_date;
    }    

    public function changeDateFormatSlash($date)
    {
    	if ($date == '') return '';
    	$dateArr = explode('/',$date);
    	$ret_date = $dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0];
    	return $ret_date;
    }    
}
