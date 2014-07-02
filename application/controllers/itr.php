<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller for users.
 */

class Itr extends CI_Controller {
    /*
     * Constructor to load the necessary database, models, helpers and etc.
     */

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->model('Itr_model');
        $this->load->model('Client_model');
        $this->load->model('Employee_model');
        $this->load->library('session');
        $this->session->requireLogin();
        $this->load->helper('date');
    }

    public function lists($page='itr') {
        $data = array();
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';

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
        	$client_id = '';
        }
                
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/itr/lists/';
        $cnt_query = $this->Itr_model->get_count();
        $cnt_res = $cnt_query->result();
        $config['total_rows'] = $cnt_res[0]->cnt;
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $data['itrs'] = array();
        if ($client_id==-1) {
        	$this->load->view('layout/header');
        	$data['msg'] = 'clientNotFound';
        	$this->load->view('itr/list', $data);
        	$this->load->view('layout/footer');
        } else {
	        
	        if ($client_id=='') {
	        	$itr_query = $this->Itr_model->get_all($config['per_page'], $this->uri->segment(3));
	        } else if ($client_id!=-1) {
	        	$itr_query = $this->Itr_model->get_by_client($client_id, $config['per_page'], $this->uri->segment(3));
	        } 
	        foreach ($itr_query->result() as $row) {
	            $client_query = $this->Client_model->get($row->client_id);
	            $client_result = $client_query->result();
                
                $row->date_of_uploading = $this->changeDateFormat($row->date_of_uploading);
                $row->date_of_mailing = $this->changeDateFormat($row->date_of_mailing);
                $row->date_of_billing = $this->changeDateFormat($row->date_of_billing);                               
	            $row->client_name = $client_result[0]->full_name;
	
	            $filed_emp_name_query = $this->Employee_model->get_name($row->filed_by);
	            $filed_emp_name_result = $filed_emp_name_query->result();
	            $row->filed_by_name = $filed_emp_name_result[0]->login;
	
	            $data['itrs'][] = $row;
	        }
	
	        $this->load->view('layout/header');
	        $this->load->view('itr/list', $data);
	        $this->load->view('layout/footer');
        }
    }
    
    public function add_remark() {
        if (isset($_POST['remarks']) && $_POST['remarks'] && isset($_POST['sr_itr_id']) && $_POST['sr_itr_id']) {
            $user_query = $this->Employee_model->get_name($_SESSION['emp_id']);
            $res = $user_query->result();
            $date = date('d/m/Y', now());
            $remark = $date.' : '. $res[0]->login . ' : ' . $_POST['remarks'] . "<br>";

            $this->Itr_model->addRemark($remark, $_POST['sr_itr_id']);
            echo '|||success|||';
        }
        exit;
    }
    
    public function list_remarks($itrId) {
        $remark_query = $this->Itr_model->get_remarks($itrId);
        $res = $remark_query->result();
        $data['remarks'] = $res[0]->remarks;

        $this->load->view('task/remarks', $data);
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

