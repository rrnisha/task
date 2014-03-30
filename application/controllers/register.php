<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller for users.
 */

class Register extends CI_Controller {
    /*
     * Constructor to load the necessary database, models, helpers and etc.
     */

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->model('Register_model');
        $this->load->model('Document_model');
        $this->load->model('Document_Transaction_model');
        $this->load->model('Client_model');
        $this->load->model('Employee_model');
        $this->load->library('session');
        $this->session->requireLogin();
        $this->load->helper('date');
    }

    public function create() {
        $data = array();
        $data['values'] = array();
        $data['values']['particulars'] = '';
        $data['values']['client_id'] = '';
        $data['values']['by_employee'] = '';
        $data['values']['mode_of_receipt'] = 'in_person';
        $data['values']['tag'] = '';
        $data['values']['status'] = 'inward';
        $data['values']['type'] = 'others';

        print_r($_POST);
        if (isset($_POST['create']) && $_POST['create'] == 'Create') {
            $data['values'] = $_POST;
            // Loading form validation library
            $this->load->library('form_validation');

            $this->form_validation->set_rules('client_id', 'Client', 'callback_dropdown_id_check');
            $this->form_validation->set_rules('status', 'Status', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
//             Setting validation rules
            for($i=0;$i<count($_POST["particulars"]);$i++) {
            	$this->form_validation->set_rules('particulars[]', 'Particulars', 'required');
                $this->form_validation->set_rules('by_employee[]', 'Received/Surrender By Employee', 'callback_dropdown_id_check');
                $this->form_validation->set_rules('mode_of_receipt[]', 'Mode of Receipt', 'callback_dropdown_id_check');
                $this->form_validation->set_rules('tag[]', 'Tag', 'required');
            }
            
            // Validating..
            if ($this->form_validation->run() == TRUE) {
                $this->Register_model->insert();
                $_POST['register_id'] = $this->db->insert_id();
                for($i=0;$i<count($_POST["particulars"]);$i++) {
	                $_POST['trans_type'] = 'create';
	                $this->Document_model->insert($i);
	                $_POST['doc_id'] = $this->db->insert_id();
	                $this->Document_Transaction_model->insert();
                }
                redirect('/register/tomedia/'.$_POST['register_id'].'/create');
            } else {
            	$data['values']['particulars'] = '';
            	$data['values']['by_employee'] = '';
            	$data['values']['mode_of_receipt'] = 'in_person';
            	$data['values']['tag'] = '';
            }
        }
        print_r('validation not done');
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
        $cnt = count($employee_query->result());
        $data['employees']['-1'] = '-- Select --';
        foreach ($employee_query->result() as $res) {
        	$data['employees'][$res->id] = $res->login;
        }
        
        $data['mode_receipt'] = array();
        $data['mode_receipt']['-1'] = '-- Select --';
        $data['mode_receipt'][1] = 'in_person';
        $data['mode_receipt'][2] = 'email';
        $data['mode_receipt'][3] = 'courier';
        $data['mode_receipt'][4] = 'other';
        $data['mode_receipt'][5] = 'post';
        
        
    	 
    	$this->load->view('layout/header');
    	$this->load->view('register/create', $data);
    	$this->load->view('layout/footer');
    }

    public function dropdown_id_check($str)
    {
    	if ($str == '-1')
    	{
    		$this->form_validation->set_message('dropdown_id_check', 'Please select a valid value');
    		return FALSE;
    	}
    	else
    	{
    		return TRUE;
    	}
    }
        
    public function edit() {
        $data = array();
        if (isset($_POST['edit']) && $_POST['edit'] == 'Ok') {
        	$_POST['status'] = $_POST['status_value'];
        	print_r($_POST);
        	print("Count : "+count($_POST["particulars"]));
        	
            $data['values'] = array();
            $data['values']['id'] = $_POST['id'];
            $data['values']['client_id'] = $_POST['client_id'];
            $data['values']['status'] = $_POST['status'];
            $data['values']['type'] = $_POST['type'];
            
            // Loading form validation library
//             $this->load->library('form_validation');

//             for($i=0;$i<count($_POST["particulars"]);$i++) {
//             	print_r("Test");
//             	$this->form_validation->set_rules('particulars', 'Particulars', 'required');
//             	$this->form_validation->set_rules('by_employee', 'Received/Surrender By Employee', 'required');
//             	$this->form_validation->set_rules('mode_of_receipt', 'Mode Of Receipt', 'required');
//             	$this->form_validation->set_rules('tag', 'Tag', 'required');
//             }            
            
//             if ($this->form_validation->run() == TRUE) {
	            $this->Register_model->edit($data['values']);
	            $_POST['register_id'] = $_POST['id'];
	            $this->Document_model->edit();
	//            redirect('/register/lists?msg=documentEditSuccess');
	            redirect('/register/tomedia/'.$_POST['register_id'].'/edit/'.$_POST['edit_start_date']);
//             }
        }
    }

    public function tomedia($registerId, $flag, $edit_start_date='') {
        $register_query = $this->Register_model->get($registerId);
        $doc_res = $register_query->result();
        $doc_res[0]->create_date = mdate('%d-%m-%Y', strtotime($doc_res[0]->create_date));
        $data['register'] = $doc_res[0];
		$data['current_date'] = now();
		$data['flag'] = $flag;

		$data['particulars']=array();
		if ($edit_start_date=='') {
			$documents_query = $this->Document_model->get($registerId);
		} else {
			if ($flag == 'outwardDoc') {
				$documents_query = $this->Document_model->get_update_by_status($registerId, "outward", $edit_start_date);
			} else if ($flag == 'inwardDoc') {
				$documents_query = $this->Document_model->get_update_by_status($registerId, "inward", $edit_start_date);
			} else {
        		$documents_query = $this->Document_model->get_update($registerId, $edit_start_date);
			}
		}
        foreach ($documents_query->result() as $row) {
        	$row->create_date = mdate('%d-%m-%Y', strtotime($row->create_date));
            $data['particulars'][] = $row;
        }
        
        foreach ($register_query->result() as $row) {
            $client_query = $this->Client_model->get($row->client_id);
            $client_result = $client_query->result();
            $row->client_name = '';
            $row->address = '';
            if (count($client_result) >=1 ) {
            	$row->client_name = $client_result[0]->full_name;
            	$row->address = $client_result[0]->address;
            }
            
            $data['registers'][] = $row;
        }
        
        // Get all clients
        $client_query = $this->Client_model->get_all_clients();

        $data['clients'] = array();
        $data['clients'][''] = '-- Select --';
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

        $data['mode_receipt'] = array();
        $data['mode_receipt'][''] = '-- Select --';
        $data['mode_receipt']['in_person'] = 'in_person';
        $data['mode_receipt']['email'] = 'email';
        $data['mode_receipt']['courier'] = 'courier';
        $data['mode_receipt']['post'] = 'post';
        $data['mode_receipt']['other'] = 'other';
        
        $this->load->view('layout/header');
        $this->load->view('register/print', $data);
        $this->load->view('layout/footer');
    }
    
    public function get($registerId) {
        $register_query = $this->Register_model->get($registerId);
        $result = $register_query->result();
        $data['register'] = $result[0];

        $documents_query = $this->Document_model->get($registerId);
        $data['particulars'] = $documents_query->result();
        
        // Get all clients
        $client_query = $this->Client_model->get_all_clients();

        $data['clients'] = array();
        $data['clients'][''] = '-- Select --';
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

        $data['mode_receipt'] = array();
        $data['mode_receipt'][''] = '-- Select --';
        $data['mode_receipt']['in_person'] = 'in_person';
        $data['mode_receipt']['email'] = 'email';
        $data['mode_receipt']['courier'] = 'courier';
        $data['mode_receipt']['post'] = 'post';
        $data['mode_receipt']['other'] = 'other';

        $data['edit_start_date'] =  mdate('%Y-%m-%d %H:%i:%s', gmt_to_local(now(),"UP35",FALSE)); 
        $this->load->view('layout/header');
        $this->load->view('register/edit', $data);
        $this->load->view('layout/footer');
    }

    public function lists() {
        $data = array();
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';
        $data['filter_client_id']='';
        $data['filter_client_search']='';
        $data['filter_type_id']='all';
        
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/register/lists/';
		$cnt_query = $this->Register_model->get_all_count();
        $cnt_res = $cnt_query->result();
        $config['total_rows'] = $cnt_res[0]->cnt;
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

		$document_query = $this->Register_model->get_all($config['per_page'], $this->uri->segment(3));

        $data['registers'] = array();
        foreach ($document_query->result() as $row) {
            $client_query = $this->Client_model->get($row->client_id);
            $client_result = $client_query->result();
            $row->client_name = '';
            if (count($client_result) >= 1) {
            	$row->client_name = $client_result[0]->full_name;
            }
            $documents_query = $this->Document_model->get($row->id);

            if (count($documents_query) < 1){
                $row->particulars[] = '';
            }
            else{
	            foreach ($documents_query->result() as $particulars_row) {
	                $emp_name_query = $this->Employee_model->get_name($particulars_row->by_employee);
	                $emp_name_result = $emp_name_query->result();
	                $particulars_row->by_employee_name = '';
	                if (count($emp_name_result) >= 1) {
	                	$particulars_row->by_employee_name = $emp_name_result[0]->login;
	                }
	            	$row->particulars[] = $particulars_row;
	            }
            }            

            $doc_trans_query = $this->Document_Transaction_model->get($row->id);
            $res = $doc_trans_query->result();
            
            foreach ($doc_trans_query->result() as $trans_row) {
            	$trans_row->trans_date = mdate('%d-%m-%Y %H:%i:%s', strtotime($trans_row->trans_date));
            	
                $emp_name_query = $this->Employee_model->get_name($trans_row->emp_id);
                $emp_name_result = $emp_name_query->result();
                $trans_row->emp = $emp_name_result[0]->login;
            	
                $row->trans[] = $trans_row;
            }            
            $row->create_date = mdate('%d-%m-%Y %H:%i:%s', strtotime($row->create_date));
            $data['registers'][] = $row;
        }

        // Get all employees
        $employee_query = $this->Employee_model->get_active();

        $data['employees'] = array();
        $data['employees'][''] = '-- Select --';
        foreach ($employee_query->result() as $res) {
            $data['employees'][$res->id] = $res->login;
        }

        $data['mode_receipt'] = array();
        $data['mode_receipt'][''] = '-- Select --';
        $data['mode_receipt'][1] = 'in_person';
        $data['mode_receipt'][2] = 'email';
        $data['mode_receipt'][3] = 'courier';
        $data['mode_receipt'][4] = 'other';
        $data['mode_receipt'][5] = 'post';

        
        $this->load->view('layout/header');
        $this->load->view('register/list', $data);
        $this->load->view('layout/footer');
    }

    public function filter() {
        $data = array();
        $data['msg'] = isset($_POST['msg']) ? $_POST['msg'] : '';

        $client_id = isset($_POST['filter_client_id']) ? $_POST['filter_client_id'] : '';
        $type = isset($_POST['filter_type_id']) ? $_POST['filter_type_id'] : 'all';
        
        $data['filter_type_id']=$type;
        	
        $data['filter_client_id']=$client_id;
        $data['filter_client_search']=isset($_POST['filter_client_search']) ? $_POST['filter_client_search'] : '';
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/register/filter/';
        if ($client_id == '')
        {
        	if ($type == 'all')
        		$cnt_query = $this->Register_model->get_all_count();
        	else
        		$cnt_query = $this->Register_model->get_type_count($type);
        }
        else 
        	$cnt_query = $this->Register_model->get_client_count($client_id);
        $cnt_res = $cnt_query->result();
        $config['total_rows'] = $cnt_res[0]->cnt;
        $config['per_page'] = 20;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        if ($client_id == '')
        {
        	if ($type == 'all')
        		$document_query = $this->Register_model->get_all($config['per_page'], $this->uri->segment(3));
        	else 
        		$document_query = $this->Register_model->get_all_per_type($type, $config['per_page'], $this->uri->segment(3));
        }
        else
        	$document_query = $this->Register_model->get_all_per_client_type($client_id, $type, $config['per_page'], $this->uri->segment(3));	

        $data['registers'] = array();
        foreach ($document_query->result() as $row) {
            $client_query = $this->Client_model->get($row->client_id);
            $client_result = $client_query->result();
            $row->client_name = $client_result[0]->full_name;

//            $received_emp_name_query = $this->Employee_model->get_name($row->received_by);
//            $received_emp_name_result = $received_emp_name_query->result();
//            if (count($received_emp_name_result) < 1)
//                $row->received_by_name = '';
//            else
//                $row->received_by_name = $received_emp_name_result[0]->login;
//
//            $surrender_emp_name_query = $this->Employee_model->get_name($row->surrender_by);
//            $surrender_emp_name_result = $surrender_emp_name_query->result();
//            if (count($surrender_emp_name_result) < 1)
//                $row->surrender_by_name = '';
//            else
//                $row->surrender_by_name = $surrender_emp_name_result[0]->login;

            $documents_query = $this->Document_model->get($row->id);

            if (count($documents_query) < 1){
                $row->particulars[] = '';
            }
            else{
	            foreach ($documents_query->result() as $particulars_row) {
	                $emp_name_query = $this->Employee_model->get_name($particulars_row->by_employee);
	                $emp_name_result = $emp_name_query->result();
	                $particulars_row->by_employee_name = '';
	                if (count($emp_name_result) >= 1) {
	                	$particulars_row->by_employee_name = $emp_name_result[0]->login;
	                }
	            	$row->particulars[] = $particulars_row;
	            }
            }            

            $doc_trans_query = $this->Document_Transaction_model->get($row->id);
            $res = $doc_trans_query->result();
            
            foreach ($doc_trans_query->result() as $trans_row) {
            	$trans_row->trans_date = mdate('%d-%m-%Y', strtotime($trans_row->trans_date));
                $emp_name_query = $this->Employee_model->get_name($trans_row->emp_id);
                $emp_name_result = $emp_name_query->result();
                $trans_row->emp = $emp_name_result[0]->login;
                $row->trans[] = $trans_row;
            }            
            
            $data['registers'][] = $row;
        }

        // Get all employees
        $employee_query = $this->Employee_model->get_active();

        $data['employees'] = array();
        $data['employees'][''] = '-- Select --';
        foreach ($employee_query->result() as $res) {
            $data['employees'][$res->id] = $res->login;
        }

        $data['mode_receipt'] = array();
        $data['mode_receipt'][''] = '-- Select --';
        $data['mode_receipt'][1] = 'in_person';
        $data['mode_receipt'][2] = 'email';
        $data['mode_receipt'][3] = 'courier';
        $data['mode_receipt'][4] = 'other';
        $data['mode_receipt'][5] = 'post';

        
        $this->load->view('layout/header');
        $this->load->view('register/list', $data);
        $this->load->view('layout/footer');
    }
    
    public function outwardDoc() {
        if (isset($_POST['doc_id']) && $_POST['doc_id']) {
            $_POST['status'] = 'outward';
            $doc_cnt_query = $this->Register_model->get_documents_count($_POST['register_id']);
            $cnt_res = $doc_cnt_query->result();
            $doc_cnt = $cnt_res[0]->cnt;
            
            $out_status_doc_cnt_query = $this->Register_model->get_status_based_documents_count($_POST['register_id'], $_POST['status']);
            $s_out_cnt_res = $out_status_doc_cnt_query->result();
            
            $in_status_doc_cnt_query = $this->Register_model->get_status_based_documents_count($_POST['register_id'], 'inward');
            $s_in_cnt_res = $in_status_doc_cnt_query->result();

            if ($doc_cnt == 1){
            	$this->Register_model->mark_status($_POST['register_id'], $_POST['status']);
            }
            else if ($doc_cnt == 2) {
            	if ($s_out_cnt_res[0]->cnt == 1){
            		$this->Register_model->mark_status($_POST['register_id'], $_POST['status']);
            	}else {
            		$this->Register_model->mark_status($_POST['register_id'], 'in_out');
            	}
            }
        	else if ($doc_cnt > 2) {
            	if ($s_in_cnt_res[0]->cnt == 1)
            		$this->Register_model->mark_status($_POST['register_id'], $_POST['status']);
            	else
            		$this->Register_model->mark_status($_POST['register_id'], 'in_out');
        	}
            
            $this->Document_model->outward($_POST['by_employee'], $_POST['doc_id'], $_POST['status'], $_POST['mode_of_receipt']);
            $_POST['trans_type'] = 'outward';
            $this->Document_Transaction_model->insert();
            echo '|||success|||'.$_POST['register_id'].'|||'.$_POST['edit_start_date'];
        }
        exit;
    }

    public function inwardDoc() {
    	print_r($_POST);
        if (isset($_POST['doc_id']) && $_POST['doc_id']) {
            $_POST['status'] = 'inward';
            $doc_cnt_query = $this->Register_model->get_documents_count($_POST['register_id']);
            $cnt_res = $doc_cnt_query->result();
            $doc_cnt = $cnt_res[0]->cnt;

            $in_status_doc_cnt_query = $this->Register_model->get_status_based_documents_count($_POST['register_id'], $_POST['status']);
            $s_in_cnt_res = $in_status_doc_cnt_query->result();

            $out_status_doc_cnt_query = $this->Register_model->get_status_based_documents_count($_POST['register_id'], 'outward');
            $s_out_cnt_res = $out_status_doc_cnt_query->result();
            
//            print_r('total doc count - '.$doc_cnt);
//            print_r('in doc count - '.$s_in_cnt_res[0]->cnt);
//            print_r('out doc count - '.$s_out_cnt_res[0]->cnt);
            
            if ($doc_cnt == 1){
            	$this->Register_model->mark_status($_POST['register_id'], $_POST['status']);
            }
            else if ($doc_cnt == 2) {
            	if ($s_in_cnt_res[0]->cnt == 1){
            		$this->Register_model->mark_status($_POST['register_id'], $_POST['status']);
            	}else {
            		$this->Register_model->mark_status($_POST['register_id'], 'in_out');
            	}
            }
            else if ($doc_cnt > 2) {
            	if ($s_out_cnt_res[0]->cnt == 1)
            		$this->Register_model->mark_status($_POST['register_id'], $_POST['status']);
            	else
            		$this->Register_model->mark_status($_POST['register_id'], 'in_out');
            }
            
            $this->Document_model->inward($_POST['by_employee'], $_POST['doc_id'], $_POST['status'], $_POST['mode_of_receipt']);
            $_POST['trans_type'] = 'inward';
            $this->Document_Transaction_model->insert();
            echo '|||success|||'.$_POST['register_id'].'|||'.$_POST['edit_start_date'];
        }
        exit;
    }

    public function outwardRegister() {
        if (isset($_POST['register_id']) && $_POST['register_id']) {
            $_POST['status'] = 'outward';

            $this->Register_model->mark_status($_POST['register_id'], $_POST['status']);
            
            $documents_query = $this->Document_model->get($_POST['register_id']);
            foreach ($documents_query->result() as $document_row) {
            	if ($document_row->type='inward'){
					$_POST['doc_id'] = $document_row->doc_id;
            		$this->Document_model->outward($_POST['by_employee'], $_POST['doc_id'], 'outward', $_POST['mode_of_receipt']);
					$_POST['trans_type'] = 'outward';
		            $this->Document_Transaction_model->insert();
		            echo '|||success|||'.$_POST['register_id'];
            	}
            }
        }
        exit;
    }

    public function inwardRegister() {
        if (isset($_POST['register_id']) && $_POST['register_id']) {
            $_POST['status'] = 'inward';

            $user_query = $this->Register_model->mark_status($_POST['register_id'], $_POST['status']);
            
            $documents_query = $this->Document_model->get($_POST['register_id']);
            foreach ($documents_query->result() as $document_row) {
            	if ($document_row->type='outward'){
            		$_POST['doc_id'] = $document_row->doc_id;
            		$this->Document_model->inward($_POST['by_employee'], $_POST['doc_id'], 'inward', $_POST['mode_of_receipt']);
		            $_POST['trans_type'] = 'inward';
		            $this->Document_Transaction_model->insert();
		            echo '|||success|||'.$_POST['register_id'];
            	}
            }
        }
        exit;
    }
    
    public function list_doc_trans($registerId) {
        $doc_trans_query = $this->Document_Transaction_model->get($registerId);
        $res = $doc_trans_query->result();
        $data['trans'] = array();
        foreach ($doc_trans_query->result() as $row) {
        	$row->trans_date = mdate('%d-%m-%Y', strtotime($row->trans_date));
            $emp_name_query = $this->Employee_model->get_name($row->emp_id);
            $emp_name_result = $emp_name_query->result();
            $row->emp = $emp_name_result[0]->login;
            $data['trans'][] = $row;
        }
        
        $this->load->view('register/trans', $data);
    }

    public function list_docs($registerId) {
        $doc_trans_query = $this->Document_model->get($registerId);
        $res = $doc_trans_query->result();
        
        $data['documents'] = array();
        foreach ($doc_trans_query->result() as $row) {
            $emp_name_query = $this->Employee_model->get_name($row->by_employee);
            $emp_name_result = $emp_name_query->result();
            $row->by_employee_name = '';
            if (count($emp_name_result) >= 1) {
            	$row->by_employee_name = $emp_name_result[0]->login;
            }
            $row->register_id = $registerId;
            $data['documents'][] = $row;
        }
        
        $this->load->view('register/documents', $data);
    }
    
}

