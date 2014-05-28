<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Controller for users.
*/
class Company extends CI_Controller {
    /*
     * Constructor to load the necessary database, models, helpers and etc.
    */
    public function __construct(){
        parent::__construct();   
        $this->load->database();
        $this->load->helper(array('url','form'));
        $this->load->model('Company_model');
        $this->load->helper('date');
        $this->load->library('session');
    }

    public function create(){
    	$data = array();            
    	$data['msg'] = isset($_POST['msg'])?$_POST['msg']:'';

        $data['values'] = array();
        $data['values']['name'] = '';
        $data['values']['phone'] = '';
        $data['values']['email'] = '';
        $data['values']['address'] = '';
        $data['values']['doi'] = '';
        $data['values']['tan'] = '';

        if( isset($_POST['create']) && $_POST['create'] == 'Create'){
            $data['values'] = $_POST;
            // Loading form validation library
            $this->load->library('form_validation');
            // Setting validation rules
            $this->form_validation->set_rules('name', 'Company Name', 'required');    
            $this->form_validation->set_rules('phone', 'Phone', 'required');    
            $this->form_validation->set_rules('email', 'Email', 'required');    
            $this->form_validation->set_rules('doi', 'Date of Inception', 'required');
            $this->form_validation->set_rules('tan', 'TAN', 'required');
            
            print_r($data);
            // Validating..
            if ($this->form_validation->run() == TRUE ){     
            	$_POST['doi'] = $this->changeDateFormat($_POST['doi']);
            	print_r($data);
				$company_id = $this->Company_model->insert();
               	redirect('/company/lists?msg=createCompanySuccess');
            }        			
        }    

        $this->load->view('layout/header');
        $this->load->view('company/create',$data);
        $this->load->view('layout/footer');
    }
    
    public function lists(){
        $data = array();            
        $data['msg'] = isset($_GET['msg'])?$_GET['msg']:'';
        
        $this->session->requireLogin();
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/company/lists/';
        $cnt_query = $this->Company_model->get_all_count();
        $cnt_res = $cnt_query->result();
        $config['total_rows'] = $cnt_res[0]->cnt;
        $config['per_page'] = 10;        
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $company_query = $this->Company_model->get_all($config['per_page'], $this->uri->segment(3));
        
        $data['companys'] = array();
        foreach($company_query->result() as $row){
        	if ($row->doi!="0000-00-00")
        		$row->doi = mdate('%d-%m-%Y', strtotime($row->doi));
            $data['companys'][] = $row;
        }

        $this->load->view('layout/header');
        $this->load->view('company/list',$data);
        $this->load->view('layout/footer');
    }    
    
    public function edit(){
        $data = array();            

        if( isset($_POST['edit']) && $_POST['edit'] == 'Ok'){
            $data['values'] = array();
            $data['values']['id'] = $_POST['id'];
            $data['values']['name'] = $_POST['name'];
            $data['values']['doi'] = $_POST['doi'];
            $data['values']['phone'] = $_POST['phone'];
            $data['values']['email'] = $_POST['email'];
            $data['values']['address'] = $_POST['address'];
            $data['values']['tan'] = $_POST['tan'];
            
            print_r($data);

           // Loading form validation library
           $this->load->library('form_validation');
           // Setting validation rules
           $this->form_validation->set_rules('doi', 'Date of Inception', 'required');    
           $this->form_validation->set_rules('name', 'Company Name', 'required');    
           $this->form_validation->set_rules('phone', 'Phone', 'required');    
           $this->form_validation->set_rules('email', 'Email', 'required');    
           $this->form_validation->set_rules('tan', 'TAN', 'required');
           
           // Validating..
           if ($this->form_validation->run() == TRUE ){
           		$data['values']['doi'] = $this->changeDateFormat($_POST['doi']);
	            $this->Company_model->edit($data['values']);
	            redirect('/company/lists?msg=editCompanySuccess');
           }
        }    
        $company_query = $this->Company_model->get($_POST['id']);
        $res = $company_query->result();
        $data['company'] = $res[0];

        $this->load->view('layout/header');
        $this->load->view('company/edit',$data);
        $this->load->view('layout/footer');
    }
    
    public function get($companyId){
        $company_query = $this->Company_model->get($companyId);
        $res = $company_query->result();
        if ($res[0]->doi!="0000-00-00")
        	$res[0]->doi = mdate('%d-%m-%Y', strtotime($res[0]->doi));
        $data['company'] = $res[0];

        $this->load->view('layout/header');
        $this->load->view('company/edit',$data);
        $this->load->view('layout/footer');
    }

    public function delete(){
        if( isset($_POST['company_id']) && $_POST['company_id'] ){
            $user_query = $this->Company_model->delete($_POST['company_id']);
            echo '|||success|||';
        }
        exit;        
    }
    
    public function activate(){
        if( isset($_POST['company_id']) && $_POST['company_id'] ){
            $user_query = $this->Company_model->activate($_POST['company_id']);
            echo '|||success|||';
        }
        exit;        
    }    

    public function changeDateFormat($date)
    {
    	if ($date == '') return '';
    	$dateArr = explode('-',$date);
    	$ret_date = $dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0];
    	return $ret_date;
    }    
}
