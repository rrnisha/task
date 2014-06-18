<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller for users.
 */

class Fy extends CI_Controller {
    /*
     * Constructor to load the necessary database, models, helpers and etc.
     */

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->model('Year_model');
        $this->load->library('session');
        $this->load->helper('date');
        $this->session->requireLogin();
    }

    public function create() {
        $data = array();
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';

        $data['values'] = array();
        $data['values']['from_year'] = '';
        $data['values']['to_year'] = '';
        $data['values']['curr_fy'] = '';

        if (isset($_POST['create']) && $_POST['create'] == 'Create') {
            $data['values'] = $_POST;
            // Loading form validation library
            $this->load->library('form_validation');
            // Setting validation rules
            $this->form_validation->set_rules('from_year', 'From Year', 'callback_from_year_check');
            $this->form_validation->set_rules('to_year', 'To Year', 'callback_to_year_check');
            
            // Validating..
            if ($this->form_validation->run() == TRUE) {
            	if ($_POST['curr_fy'] == 'on') {
            		$query = $this->Year_model->get_curr_year();
            		$row = $query->result();
            		if ($row[0]->id != '')
            			$this->Year_model->reset_prev_curr_year($row[0]->id);
            	}
            	 
                $this->Year_model->insert();
                redirect('/fy/lists?msg=finyearaddedsuccess');
            } else {
            	$data['values']['curr_fy'] = 'off';
            }
        }
        
        $this->load->view('layout/header');
        $this->load->view('fy/create', $data);
        $this->load->view('layout/footer');        
    }
    
    public function from_year_check($year)
    {
    	if (is_numeric($year)) {
    		if ($year >= 2000 and $year <= 2100) {
    			return TRUE;
    		} else {
    			$this->form_validation->set_message('from_year_check', 'From Year should be between 2000 and 2100');
    			return FALSE;    			
    		}
    	} else {
    		$this->form_validation->set_message('from_year_check', 'From Year should be between 2000 and 2100');
    		return FALSE;
    	}
    }
    
    public function to_year_check($year)
    {
    	$from_year = $_POST['from_year'];
    	if (is_numeric($from_year) && is_numeric($year)) {
    		if ($year == $from_year+1) {
    			return TRUE;
    		} else {
    			$this->form_validation->set_message('to_year_check', 'To Year should be one year greated than from year');
    			return FALSE;
    		}
    	} else {
    		$this->form_validation->set_message('to_year_check', 'To Year should be one year greated than from year');
    		return FALSE;
    	}
    }
        
    public function lists() {
        $data = array();
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';

        $finyear_query = $this->Year_model->get();

        $data['years'] = array();
        foreach ($finyear_query->result() as $row) {
            $data['years'][] = $row;
        }

        $this->load->view('layout/header');
        $this->load->view('fy/list', $data);
        $this->load->view('layout/footer');
    }

    public function delete(){
    	print_r($_POST);
    	if( isset($_POST['year_id']) && $_POST['year_id'] ){
    		$user_query = $this->Year_model->delete($_POST['year_id']);
    		echo '|||success|||';
    	}
    	exit;
    }
    
    public function get($id){
    	$fy_query = $this->Year_model->get_by_id($id);
    	$res = $fy_query->result();
    	$data['fy'] = $res[0];
    
    	$this->load->view('layout/header');
    	$this->load->view('fy/edit',$data);
    	$this->load->view('layout/footer');
    }  

    public function edit(){
    	$data = array();
    
    	if( isset($_POST['edit']) && $_POST['edit'] == 'Ok'){
    		$data['values'] = array();
    		$data['values']['id'] = $_POST['id'];
    		$data['values']['from_year'] = $_POST['from_year'];
    		$data['values']['to_year'] = $_POST['to_year'];
    
    		// Loading form validation library
    		$this->load->library('form_validation');
    		// Setting validation rules
    		$this->form_validation->set_rules('from_year', 'from year', 'callback_from_year_check');
    		$this->form_validation->set_rules('to_year', 'to year', 'callback_to_year_check');
    			
    		// Validating..
    		if ($this->form_validation->run() == TRUE ){
    			$this->Year_model->edit($data['values']);
    			redirect('/fy/lists?msg=editTypeSuccess');
    		}
    	}
    	$fy_query = $this->Year_model->get_by_id($_POST['id']);
    	$res = $fy_query->result();
    	$data['fy'] = $res[0];
    	    
    	$this->load->view('layout/header');
    	$this->load->view('fy/edit',$data);
    	$this->load->view('layout/footer');
    }    
}

