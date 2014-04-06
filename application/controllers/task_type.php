<?php
class Task_type extends CI_Controller {
	/*
	 * Constructor to load the necessary database, models, helpers and etc.
	*/
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper(array('url','form'));
		$this->load->model('Task_type_model');
	}
	public function create(){
		$data = array();
		$data['values'] = array();
		$data['values']['type'] = '';
		$data['values']['type_ui_desc'] = '';

		if( isset($_POST['create']) && $_POST['create'] == 'Create'){
			$data['values'] = $_POST;
			// Loading form validation library
			$this->load->library('form_validation');
			// Setting validation rules
			$this->form_validation->set_rules('type', 'Type', 'required');
			$this->form_validation->set_rules('type_ui_desc', 'Type UI Desc', 'required');

			// Validating..
			if ($this->form_validation->run() == TRUE ){
				$this->Task_type_model->insert();
				redirect('/task_type/lists?msg=createTypeSuccess');
			}
		}
		$this->load->view('layout/header');
		$this->load->view('task_type/create',$data);
		$this->load->view('layout/footer');
	}

	public function lists(){
		$data = array();
		$this->session->requireLogin();
		$this->load->library('pagination');

		$data['msg'] = isset($_GET['msg'])?$_GET['msg']:'';
		$config['base_url'] = base_url() . 'index.php/task_type/lists/';
		$cnt_query = $this->Task_type_model->get_all_count();
		$cnt_res = $cnt_query->result();
		$config['total_rows'] = $cnt_res[0]->cnt;
		$config['per_page'] = 10;
		$config['uri_segment'] = 3;

		$this->pagination->initialize($config);

		$employee_query = $this->Task_type_model->get_all($config['per_page'], $this->uri->segment(3));

		$data['types'] = array();
		foreach($employee_query->result() as $row){
			$data['types'][] = $row;
		}

		$this->load->view('layout/header');
		$this->load->view('task_type/list',$data);
		$this->load->view('layout/footer');
	}

	public function edit(){
		$data = array();

		if( isset($_POST['edit']) && $_POST['edit'] == 'Ok'){
			$data['values'] = array();
			$data['values']['id'] = $_POST['id'];
			$data['values']['type'] = $_POST['type'];
			$data['values']['type_ui_desc'] = $_POST['type_ui_desc'];

			// Loading form validation library
			$this->load->library('form_validation');
			// Setting validation rules
			$this->form_validation->set_rules('type', 'Type', 'required');
			$this->form_validation->set_rules('type_ui_desc', 'Type UI Desc', 'required');
						 
			// Validating..
			if ($this->form_validation->run() == TRUE ){
				$this->Task_type_model->edit($data['values']);
				redirect('/task_type/lists?msg=editTypeSuccess');
			}
		}
		$employee_query = $this->Task_type_model->get_by_id($_POST['id']);
		$res = $employee_query->result();
		$data['task_type'] = $res[0];

		$this->load->view('layout/header');
		$this->load->view('task_type/edit',$data);
		$this->load->view('layout/footer');
	}

	public function get($id){
		$task_type_query = $this->Task_type_model->get_by_id($id);
		$res = $task_type_query->result();
		$data['task_type'] = $res[0];

		$this->load->view('layout/header');
		$this->load->view('task_type/edit',$data);
		$this->load->view('layout/footer');
	}

	public function delete(){
		print_r($_POST);
		if( isset($_POST['type_id']) && $_POST['type_id'] ){
			$user_query = $this->Task_type_model->delete($_POST['type_id']);
			echo '|||success|||';
		}
		exit;
	}

	public function activate(){
		if( isset($_POST['type_id']) && $_POST['type_id'] ){
			$user_query = $this->Task_type_model->activate($_POST['type_id']);
			echo '|||success|||';
		}
		exit;
	}

}
