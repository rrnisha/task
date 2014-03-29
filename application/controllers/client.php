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
        $data['values']['client_type'] = 'company';
        $data['values']['email'] = '';
        $data['values']['address'] = '';
        $data['values']['pan_tan'] = '';
        $data['values']['genius_id'] = '';
        $data['values']['file_id'] = '';

        if (isset($_POST['create']) && $_POST['create'] == 'Create') {
            $data['values'] = $_POST;
            // Loading form validation library
            $this->load->library('form_validation');
            // Setting validation rules
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('fullname', 'Name', 'required');
            $this->form_validation->set_rules('phone_mobile', 'Mobile Phone No', 'required');
//             $this->form_validation->set_rules('phone_office', 'Office Phone No', 'required');
            $this->form_validation->set_rules('pan_tan', 'PAN/TAN', 'required');
//             $this->form_validation->set_rules('email', 'Email', 'required');
//             $this->form_validation->set_rules('address', 'Address', 'required');
//             $this->form_validation->set_rules('client_type', 'Type', 'required');
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

    public function edit() {

        $data = array();

        if (isset($_POST['edit']) && $_POST['edit'] == 'Ok') {
            $data['values']['id'] = $_POST['id'];
            $data['values']['title'] = $_POST['title'];
            $data['values']['full_name'] = $_POST['full_name'] ;
            $data['values']['phone_mobile'] = $_POST['phone_mobile'];
            $data['values']['phone_office'] = $_POST['phone_office'];
            $data['values']['client_type'] = $_POST['client_type'];
            $data['values']['email'] = $_POST['email'];
            $data['values']['address'] = $_POST['address'];
            $data['values']['pan_tan'] = $_POST['pan_tan'];
            $data['values']['genius_id'] = $_POST['genius_id'];
            $data['values']['file_id'] = $_POST['file_id'];

            // Loading form validation library
           $this->load->library('form_validation');
           // Setting validation rules
           $this->form_validation->set_rules('title', 'Title', 'required');    
           $this->form_validation->set_rules('full_name', 'Name', 'required');    
           $this->form_validation->set_rules('phone_mobile', 'Mobile Phone No', 'required');    
           $this->form_validation->set_rules('pan_tan', 'PAN/TAN', 'required');    
           $this->form_validation->set_rules('client_type', 'Client Type', 'required');
           $this->form_validation->set_rules('genius_id', 'Genius Id', 'required');    
           $this->form_validation->set_rules('file_id', 'File Id', 'required');    
            // Validating..
           if ($this->form_validation->run() == TRUE ) {
           		print_r("Validation passed");
	       		$this->Client_model->edit($data['values']);
	            redirect('/client/lists?msg=clientEditSuccess');
           } 
        }
        $client_query = $this->Client_model->get($_POST['id']);
        $res = $client_query->result();
        $data['client'] = $res[0];
                
        $this->load->view('layout/header');
        $this->load->view('client/edit', $data);
        $this->load->view('layout/footer');
    }

    public function get($clientId) {
        $client_query = $this->Client_model->get($clientId);
        $res = $client_query->result();
        $data['client'] = $res[0];
        $this->load->view('layout/header');
        $this->load->view('client/edit', $data);
        $this->load->view('layout/footer');
    }

    public function lists($page='client') {
        $data = array();
        $data['page'] = $page;
        
        $client_id = isset($_POST['filter_client_id']) ? $_POST['filter_client_id'] : '';;
        if ($page == 'filter'){
        	$data['filter_client_id']=$client_id;
        	$data['filter_client_search']=isset($_POST['filter_client_search']) ? $_POST['filter_client_search'] : '';
        }else {
        	$data['filter_client_id']='';
        	$data['filter_client_search']='';
        }
        
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';
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
        foreach ($client_query->result() as $row) {
            $data['clients'][] = $row;
        }

        $this->load->view('layout/header');
        $this->load->view('client/list', $data);
        $this->load->view('layout/footer');
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
        $config['per_page'] = 5;        
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

}
