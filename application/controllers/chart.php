<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chart extends CI_Controller {

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

    public function index() {
        $data = array();
        
        $fy = '';
        $curr_date = date('d-m-Y');
        $curr_year = substr($curr_date, 6);
        $next_year = $curr_year+1;
        $fy = $curr_year.'-'.$next_year;

        $year_query = $this->Year_model->get_by_year($fy);
        $sdate = '';
        $edate = '';
        
		foreach ($year_query->result() as $curr_year_row)
		{
			$sdate = $curr_year_row->from_date;
			$edate = $curr_year_row->to_date;
		}

        $cnt_query = $this->Task_model->get_status_cnt('open', $sdate, $edate);
        $cnt_res = $cnt_query->result();
        $data['status']['open'] = $cnt_res[0]->cnt;

        $cnt_query = $this->Task_model->get_status_cnt('completed', $sdate, $edate);
        $cnt_res = $cnt_query->result();
        $data['status']['completed'] = $cnt_res[0]->cnt;

        $cnt_query = $this->Task_model->get_status_cnt('finalized', $sdate, $edate);
        $cnt_res = $cnt_query->result();
        $data['status']['finalized'] = $cnt_res[0]->cnt;

        //OPEN TASK BY STATUS--------------------------------------------------------
        
        $query = $this->Task_model->get_all_open_status_cnt($sdate, $edate);
        $res = $query->result();
        foreach ($res as $row)
        $data['status'][$row->status] = $row->cnt;
        
        //ALL TASK BY TYPE---------------------------------------------------------
                
        $query = $this->Task_model->get_all_type_cnt($sdate, $edate);
        $res = $query->result();
        foreach ($res as $row)
        $data['type'][$row->type] = $row->cnt;

        //TASK BY STATUS PER MONTH---------------------------------------------------
        $open_cnt = array();
        $completed_cnt = array();
        $finalized_cnt = array();
        for ($idx=0; $idx<12; $idx++)
        {
        	$open_cnt[$idx] = 0;
        	$completed_cnt[$idx] = 0;
        	$finalized_cnt[$idx] = 0;
        }
                
        $query = $this->Task_model->get_all_status_per_month($sdate, $edate);
        $res = $query->result();
        $rescnt = count($res);

        foreach ($res as $row)
        {
			$open_cnt[($row->month)-1]=$row->open;
			$completed_cnt[($row->month)-1]=$row->completed;         	
			$finalized_cnt[($row->month)-1]=$row->finalized;         	
        }   
        
        $data['month']['open'] = '[';
        $data['month']['completed'] = '[';
        $data['month']['finalized'] = '[';
        for ($idx=3; $idx<12; $idx++)
        {
        	if ($idx != 11)
        	{
				$data['month']['open'] .= $open_cnt[$idx].',';
	        	$data['month']['completed'] .= $completed_cnt[$idx].',';
	        	$data['month']['finalized'] .= $finalized_cnt[$idx].',';
        	} else 
        	{
				$data['month']['open'] .= $open_cnt[$idx];
	        	$data['month']['completed'] .= $completed_cnt[$idx];
	        	$data['month']['finalized'] .= $finalized_cnt[$idx];
        	}
        } 
        for ($idx=0; $idx<3; $idx++)
        {
        	$data['month']['open'] .= ','.$open_cnt[$idx];
        	$data['month']['completed'] .= ','.$completed_cnt[$idx];
        	$data['month']['finalized'] .= ','.$finalized_cnt[$idx];
        }                 
        $data['month']['open'] .= ']';
        $data['month']['completed'] .= ']';
        $data['month']['finalized'] .= ']';
        
        $this->load->view('layout/header');
        $this->load->view('chart/index', $data);
        $this->load->view('layout/footer');        
    }
}

