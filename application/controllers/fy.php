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
            $this->form_validation->set_rules('from_year', 'From Year', 'required');
            $this->form_validation->set_rules('to_year', 'To Year', 'required');
            
            // Validating..
            if ($this->form_validation->run() == TRUE) {
                $this->Year_model->insert();
                redirect('/fy/lists?msg=finyearaddedsuccess');
            }
        }
        $this->load->view('layout/header');
        $this->load->view('fy/create', $data);
        $this->load->view('layout/footer');        
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

}

