<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->load->helper('date');
        $this->session->requireLogin();
        $this->load->model('Task_model');
        $this->load->model('Year_model');
        $this->load->model('Itr_model');
        $this->load->model('Client_model');
        $this->load->model('Employee_model');
    }

    public function task() {
        $data = array();
        $data['values'] = array();
        $data['values']['emp_id'] = '';
        $data['values']['client_id'] = '';
        $data['values']['type'] = 'all';
        $data['values']['priority'] = 'all';
        $data['values']['status'] = 'all';
        $data['values']['quarter'] = 'all';
        $data['values']['date_start'] = '';
        $data['values']['date_end'] = '';
        $data['values']['fy'] = '';
        $data['values']['sel_fy'] = 'N';
        
        // Get all employees
        $employee_query = $this->Employee_model->get_active();        
        $data['employees'] = array();
        $data['employees']['-1'] = 'All';
        foreach ($employee_query->result() as $res) {
            $data['employees'][$res->id] = $res->login;
        }        
        
        // $data['mul_clients'] = '[{ id: \'-1\', text: \'ALL\'}, { id: \'1000\', text: \'Rishi\'}]';
        // Get all clients
        $client_query = $this->Client_model->get_all_clients();
        $data['mul_clients'] = "";
        $data['clients'] = array();
        $data['clients']['-1'] = 'All';
        $data['mul_clients'] .= '{id: \'-1\', text: \'All\', locked:true},';
        foreach ($client_query->result() as $res) {
            $data['clients'][$res->id] = $res->full_name;
            $data['mul_clients'] .= '{id: \''.$res->id.'\', text: \''.$res->full_name.'\'},';
        }
		$data['mul_clients'] = '['.$data['mul_clients'].']';
		
        $data['fys'] = array();
        $fy_query = $this->Year_model->get();
        foreach ($fy_query->result() as $res) {
        	if ($res->is_curr_year == 'Y') $data['values']['fy'] = $res->fin_year;  
            $data['fys'][$res->fin_year] = $res->fin_year;
        }        
        
        $this->load->view('layout/header');
        $this->load->view('reports/index', $data);
        $this->load->view('layout/footer');
    }
    
    public function task_report_results($status='all') {
    	print_r($_POST);
    	$data = array();
        $data['status'] = $_POST['status'];

//        $this->load->library('pagination');

//        $config['base_url'] = base_url() . 'index.php/task/index/' . $status;
//        $cnt_query = $this->Task_model->get_count($status);
//        $cnt_res = $cnt_query->result();
//        $config['total_rows'] = $cnt_res[0]->cnt;
//        $config['per_page'] = 10;        
//        $config['uri_segment'] = 4;
//
//        $this->pagination->initialize($config);
		
        $data['print_out_of_range'] = 'N';
        
        $fy_from_date = '';
        $fy_to_date = '';
        
		if (isset($_POST['sel_fy']) && $_POST['sel_fy'] == 'on')
		{
	        $fy_query = $this->Year_model->get_by_year($_POST['fy']);
			foreach ($fy_query->result() as $f_curr_year_row)
			{
				$fy_from_date = $f_curr_year_row->from_date;
				$fy_to_date = $f_curr_year_row->to_date;
			}
			$_POST['date_start'] = $fy_from_date;
			$data['print_start_date'] = $this->changeDateFormat($fy_from_date);
			
			$_POST['date_end'] = $fy_to_date;
			$data['print_end_date'] = $this->changeDateFormat($fy_to_date);
		}
		else
		{
	        $year_query = $this->Year_model->get_curr_year();
	        $curr_year_from_date = '';
	        $curr_year_to_date = '';
	        
			foreach ($year_query->result() as $curr_year_row)
			{
				$curr_year_from_date = $curr_year_row->from_date;
				$curr_year_to_date = $curr_year_row->to_date;
			} 
		
			if ($_POST['date_start'] == '' && $_POST['date_end'] == '')
			{
				$_POST['date_start'] = $curr_year_from_date;
				$data['print_start_date'] = $this->changeDateFormat($curr_year_from_date);
				
				$_POST['date_end'] = $curr_year_to_date;
				$data['print_end_date'] = $this->changeDateFormat($curr_year_to_date);
			}
			else
			{
				if ($_POST['date_start'] != '')
				{
		        	$data['print_start_date'] = $_POST['date_start'];
			        $_POST['date_start'] = $this->changeDateFormat($_POST['date_start']);
				}
				else {
					$_POST['date_start'] = $curr_year_from_date;
					$data['print_start_date'] = $this->changeDateFormat($curr_year_from_date);
				}
				if ($_POST['date_end'] != '')
				{
			        $data['print_end_date'] = $_POST['date_end'];
			        $_POST['date_end'] = $this->changeDateFormat($_POST['date_end']);
			        
			        $start_date = date('Y/m/d', strtotime($_POST['date_start']));
			        $end_date = date('Y/m/d', strtotime($_POST['date_end']));
			        if ($end_date < $start_date)
			        	$data['print_out_of_range'] = 'Y';
				}
				else {
					$_POST['date_end'] = $curr_year_to_date;
					$data['print_end_date'] = $this->changeDateFormat($curr_year_to_date);
				}
			}
		} 
				        
        $task_query = $this->Task_model->get_task_report();
        $data['tasks'] = array();
        foreach ($task_query->result() as $row) {
            $client_query = $this->Client_model->get($row->client_id);
            $client_result = $client_query->result();
            $row->client_name = $client_result[0]->full_name;

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
        $this->load->view('reports/task', $data);
        $this->load->view('layout/footer');
    }    
    
    // UTILITY FUNCTION
    public function changeDateFormat($date)
    {
		$dateArr = explode('-',$date);
		$ret_date = $dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0];
	    return $ret_date; 
    }
}
