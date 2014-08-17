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
        $this->load->model('Year_model');        
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
                $client_id='';    
        	}
        	$data['filter_client_id']=$client_id;
        	$data['filter_client_search']=isset($_POST['filter_client_search']) ? $_POST['filter_client_search'] : '';
            $data['filter_fy']=isset($_POST['fy']) ? $_POST['fy'] : '';            
        	$data['msg'] = isset($_POST['msg']) ? $_POST['msg'] : '';
        }else {
        	$data['filter_client_id']='';
        	$data['filter_client_search']='';
            $data['filter_fy']='';
        	$client_id = '';
        }
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/itr/lists/';
        $cnt_query = $this->Itr_model->get_count($data['filter_fy']);
        $cnt_res = $cnt_query->result();
        $config['total_rows'] = $cnt_res[0]->cnt;
        $config['per_page'] = 12;
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        $data['itrs'] = array();
	        
        if ($client_id=='') {
        	$itr_query = $this->Itr_model->get_all($config['per_page'], $this->uri->segment(3), $data['filter_fy']);
        } else if ($client_id!=-1) {
        	$itr_query = $this->Itr_model->get_by_client($client_id, $config['per_page'], $this->uri->segment(3), $data['filter_fy']);
        } 
        foreach ($itr_query->result() as $row) {
            $client_query = $this->Client_model->get($row->client_id);
            $client_result = $client_query->result();
            
            $row->assessment_year = $this->changeAYFormat($row->assessment_year);
            $row->date_of_uploading = $this->changeDateYearFormat($row->date_of_uploading);
            $row->date_of_mailing = $this->changeDateYearFormat($row->date_of_mailing);
            $row->date_of_billing = $this->changeDateYearFormat($row->date_of_billing);                               
            $row->client_name = $client_result[0]->full_name;

            $filed_emp_name_query = $this->Employee_model->get_name($row->filed_by);
            $filed_emp_name_result = $filed_emp_name_query->result();
            $row->filed_by_name = $filed_emp_name_result[0]->login;

            $data['itrs'][] = $row;
        }

        $data['values']['fy'] = '';
        $data['values']['sel_fy'] = 'N';    
        $data['fys'] = array();
        $fy_query = $this->Year_model->get_all_desc();
        foreach ($fy_query->result() as $res) { 
            $data['fys'][$res->fin_year] = $res->fin_year;
        }  

        $this->load->view('layout/header');
        $this->load->view('itr/list', $data);
        $this->load->view('layout/footer');
    }
    
    public function get($itrId) {
        $data = array();
        $itr_query = $this->Itr_model->get_by_id($itrId);
        $res = $itr_query->result();

        $client_query = $this->Client_model->get($res[0]->client_id);
        $client_result = $client_query->result();
        $res[0]->client_name = '';
        if (count($client_result) >= 1) {
            $res[0]->client_name = $client_result[0]->full_name;
        }

        $res[0]->date_of_uploading = $this->changeDateFormat($res[0]->date_of_uploading);
        $res[0]->date_of_mailing = $this->changeDateFormat($res[0]->date_of_mailing);
        $res[0]->date_of_billing = $this->changeDateFormat($res[0]->date_of_billing);

        $data['assessment_year'] = array();
        $fy_query = $this->Year_model->get_assessment_years();
        foreach ($fy_query->result() as $ay_res) {
            $data['assessment_year'][$ay_res->assessment_year] = $ay_res->assessment_year;
        } 

        $data['itr'] = $res[0];
        $this->load->view('layout/header');
        $this->load->view('itr/edit', $data);
        $this->load->view('layout/footer');
    }

    public function edit() {

        $data = array();

        print_r($_POST);
        if (isset($_POST['edit']) && $_POST['edit'] == 'Ok') {
            $data['values']['itr_id'] = $_POST['id'];
            $data['values']['assessment_year'] = $_POST['assessment_year'];
            // $data['values']['data_of_uploading'] = $_POST['data_of_uploading'];
            // $data['values']['data_of_mailing'] = $_POST['data_of_mailing'];
            // $data['values']['data_of_acknowledgement'] = $_POST['data_of_acknowledgement'];                        

            // Loading form validation library
           $this->load->library('form_validation');
           // Setting validation rules
           $this->form_validation->set_rules('assessment_year', 'assessment_year', 'required');    

            // Validating..
           if ($this->form_validation->run() == TRUE ) {
                $this->Itr_model->edit($data['values']);
                redirect('/itr/lists?msg=itrEditSuccess');
           } 
        }
        $itr_query = $this->Itr_model->get_by_id($_POST['id']);
        $res = $itr_query->result();

        $client_query = $this->Client_model->get($res[0]->client_id);
        $client_result = $client_query->result();
        $res[0]->client_name = '';
        if (count($client_result) >= 1) {
            $res[0]->client_name = $client_result[0]->full_name;
        }

        $res[0]->date_of_uploading = $this->changeDateFormat($res[0]->date_of_uploading);
        $res[0]->date_of_mailing = $this->changeDateFormat($res[0]->date_of_mailing);
        $res[0]->date_of_billing = $this->changeDateFormat($res[0]->date_of_billing);

        $this->load->view('layout/header');
        $this->load->view('itr/edit', $data);
        $this->load->view('layout/footer');
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

    public function changeDateYearFormat($date)
    {
        if ($date == '') return '';
        $dateArr = explode('-',$date);
        $ret_date = $dateArr[2].'-'.$dateArr[1].'-'.substr($dateArr[0],2,2);
        return $ret_date; 
    }  

    public function changeAYFormat($ay)
    {
        if ($ay == '') return '';
        return substr($ay,2,2).'-'.substr($ay,7,8); 
    }          
}

