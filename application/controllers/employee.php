<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* Controller for users.
*/
class Employee extends CI_Controller {
    /*
     * Constructor to load the necessary database, models, helpers and etc.
    */
    public function __construct(){
        parent::__construct();   
        $this->load->database();
        $this->load->helper(array('url','form'));
        $this->load->model('Employee_model'); 
        $this->load->model('Role_model');
        $this->load->library('session');
    }
    /*
     * Function to validate user
    */
    public function validateEmployee(){
        $query = $this->Employee_model->validEmployee($_POST['username'],$_POST['password']);
        $row = $query->result();
        
        if( isset($row[0]->id)){
            session_start();
            $_SESSION['emp_id'] = $row[0]->id;
            $_SESSION['emp_name'] = $row[0]->full_name;
            $_SESSION['emp_login'] = $row[0]->login;
            $_SESSION['emp_role_id'] = $row[0]->role_id;
            
            return true;
        }else{
            $this->form_validation->set_message('validateUser', 'Username or password is invalid.');
            return false;
        }
    }
    /*
     * Function to do logout
    */
    public function logout(){
        $_SESSION = array();
        session_unset();
        session_destroy();
        
        redirect('/employee/index?msg=loggedOut');
    }
    /*
     * Function to do login
    */
    public function login(){
        if( isset($_POST['login']) && $_POST['login'] == 'Login' ){
            // Loading form validation library
            $this->load->library('form_validation');
            // Setting validation rules
            $this->form_validation->set_rules('username', 'Username', 'required');                        
            $this->form_validation->set_rules('password', 'Password', 'required');                        
            $this->form_validation->set_rules('username', 'username', 'callback_validateEmployee');
            
            // Validating..
            if ($this->form_validation->run() == TRUE ){               
                redirect('/task/index');
            }
        }
        
        $this->index();
    }
    /*
     * Function to display login form
    */
    public function index(){
        if( $this->session->isLoggedIn() ){
            redirect('/task/index');
        }
        $data = array();
        
        $data['msg'] = isset($_GET['msg'])?$_GET['msg']:'';
        
        // Displaying header..
        $this->load->view('layout/header');
        // Displaying discussion template..
        $this->load->view('employee/login',$data);
        // Displaying footer..
        $this->load->view('layout/footer');
    }

    public function create(){
    	$data = array();            
    	$data['msg'] = isset($_POST['msg'])?$_POST['msg']:'';

        $data['values'] = array();
        $data['values']['title'] = '';
        $data['values']['firstname'] = '';
        $data['values']['lastname'] = '';
        $data['values']['login'] = '';
        $data['values']['password'] = '';
        $data['values']['phone'] = '';
        $data['values']['email'] = '';
        $data['values']['address'] = '';
        $data['values']['role_id'] = '';

        if( isset($_POST['create']) && $_POST['create'] == 'Create'){
        	if (isset($_POST['login'])) 
        	{
        		$query = $this->Employee_model->isLoginExist($_POST['login']);
		        $cnt_res = $query->result();
        		if ($cnt_res[0]->cnt == 1)
        		{
			        // Get all roles
			        $role_query = $this->Role_model->get_all();
			
			        $data['roles'] = array();
			        $data['roles'][''] = '-- Select --';
			        foreach($role_query->result() as $res){
			            $data['roles'][$res->id] = $res->role;
			        }    
					$data['msg'] = 'createEmpSameLoginError';
					$data['values'] = $_POST;
			        $this->load->view('layout/header');
        			$this->load->view('employee/create',$data);
        			$this->load->view('layout/footer');
        		}
        		else {
		            $data['values'] = $_POST;
		            // Loading form validation library
		            $this->load->library('form_validation');
		            // Setting validation rules
		            $this->form_validation->set_rules('title', 'Title', 'required');    
		            $this->form_validation->set_rules('firstname', 'First Name', 'required');    
		            $this->form_validation->set_rules('lastname', 'Last Name', 'required');    
		            $this->form_validation->set_rules('login', 'Login Name', 'required');    
		            $this->form_validation->set_rules('password', 'Login Password', 'required');    
		            $this->form_validation->set_rules('phone', 'Phone', 'required');    
		            $this->form_validation->set_rules('email', 'Email', 'required');    
		            $this->form_validation->set_rules('address', 'Address', 'required');    
		            $this->form_validation->set_rules('role_id', 'Role', 'required');    
		            
		            // Validating..
		            if ($this->form_validation->run() == TRUE ){     
		            	$this->db->set('create_date', 'NOW()', FALSE);
		            	$this->db->set('update_date', 'NOW()', FALSE);          
						$this->Employee_model->insert();
		               	redirect('/employee/lists?msg=createEmpSuccess');
		            }        			
        		}
        	}
        }    

        // Get all roles
        $role_query = $this->Role_model->get_all();

        $data['roles'] = array();
        $data['roles'][''] = '-- Select --';
        foreach($role_query->result() as $res){
            $data['roles'][$res->id] = $res->role;
        }    
		
        $this->load->view('layout/header');
        $this->load->view('employee/create',$data);
        $this->load->view('layout/footer');
    }
    
    public function lists(){
        $data = array();            
        $data['msg'] = isset($_GET['msg'])?$_GET['msg']:'';
        
        $this->session->requireLogin();
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/employee/lists/';
        $cnt_query = $this->Employee_model->get_all_count();
        $cnt_res = $cnt_query->result();
        $config['total_rows'] = $cnt_res[0]->cnt;
        $config['per_page'] = 10;        
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $employee_query = $this->Employee_model->get_all($config['per_page'], $this->uri->segment(3));
        
        $data['employees'] = array();
        foreach($employee_query->result() as $row){
            $role_query = $this->Role_model->get($row->role_id);
            $role_result = $role_query->result();
            $row->role = $role_result[0]->role;
            $data['employees'][] = $row;
        }

        $this->load->view('layout/header');
        $this->load->view('employee/list',$data);
        $this->load->view('layout/footer');
    }    
    
    public function edit(){
        $data = array();            

        if( isset($_POST['edit']) && $_POST['edit'] == 'Edit'){
            $data['values'] = array();
            $data['values']['id'] = $_POST['id'];
            $data['values']['title'] = $_POST['title'];
            $data['values']['first_name'] = $_POST['first_name'];
            $data['values']['last_name'] = $_POST['last_name'];
            $data['values']['full_name'] = $_POST['first_name'].' '.$_POST['last_name'];
            $data['values']['login'] = $_POST['login'];
            $data['values']['phone'] = $_POST['phone'];
            $data['values']['email'] = $_POST['email'];
            $data['values']['address'] = $_POST['address'];
            $data['values']['role_id'] = $_POST['role_id'];

//            // Loading form validation library
//            $this->load->library('form_validation');
//            // Setting validation rules
//            $this->form_validation->set_rules('title', 'Title', 'required');    
//            $this->form_validation->set_rules('firstname', 'First Name', 'required');    
//            $this->form_validation->set_rules('lastname', 'Last Name', 'required');    
//            $this->form_validation->set_rules('login', 'Login Name', 'required');    
//            $this->form_validation->set_rules('password', 'Login Password', 'required');    
//            $this->form_validation->set_rules('phone', 'Phone', 'required');    
//            $this->form_validation->set_rules('email', 'Email', 'required');    
//            $this->form_validation->set_rules('address', 'Address', 'required');    
//            $this->form_validation->set_rules('role_id', 'Role', 'required');    
//            
//            // Validating..
//            if ($this->form_validation->run() == TRUE ){

			$this->db->set('update_date', 'NOW()', FALSE);
            
            $this->Employee_model->edit($data['values']);
            redirect('/employee/lists?msg=editEmpSuccess');
//            }
        }    
    }
    
    public function get($empId){
        $employee_query = $this->Employee_model->get($empId);
        $res = $employee_query->result();
        $data['employee'] = $res[0];

        // Get all roles
        $role_query = $this->Role_model->get_all();
        $data['roles'] = array();
        foreach($role_query->result() as $res){
            $data['roles'][$res->id] = $res->role;
        }    
        
        $this->load->view('layout/header');
        $this->load->view('employee/edit',$data);
        $this->load->view('layout/footer');
    }

    public function profile($empId){
    	$this->session->requireLogin();
    	
        $employee_query = $this->Employee_model->get($empId);
        $res = $employee_query->result();
        $data['employee'] = $res[0];

        // Get all roles
        $role_query = $this->Role_model->get_all();
        $data['roles'] = array();
        foreach($role_query->result() as $res){
            $data['roles'][$res->id] = $res->role;
        }    
        $data['msg'] = isset($_POST['msg']) ? $_POST['msg'] : '';
        $this->load->view('layout/header');
        $this->load->view('employee/profile',$data);
        $this->load->view('layout/footer');
    }
    
    public function delete(){
        if( isset($_POST['emp_id']) && $_POST['emp_id'] ){
            $user_query = $this->Employee_model->delete($_POST['emp_id']);
            echo '|||success|||';
        }
        exit;        
    }
    
    public function activate(){
        if( isset($_POST['emp_id']) && $_POST['emp_id'] ){
            $user_query = $this->Employee_model->activate($_POST['emp_id']);
            echo '|||success|||';
        }
        exit;        
    }    

    public function change_password(){
        if( isset($_POST['emp_id']) && $_POST['emp_id'] ){
            $user_query = $this->Employee_model->change_password($_POST['emp_id'], $_POST['password']);
            $employee_query = $this->Employee_model->get($_POST['emp_id']);
            $res = $employee_query->result();
            $data['employee'] = $res[0];

            $_POST['msg'] = 'empPasswordChangedSuccess';
            redirect('/employee/profile/'.$_POST['emp_id'].'?msg=empPasswordChangedSuccess');
        }
        exit;        
    }    
}
