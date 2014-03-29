<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * Controller for users.
 */

class Smtp extends CI_Controller {
    /*
     * Constructor to load the necessary database, models, helpers and etc.
     */

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url', 'form'));
        $this->load->model('Smtp_model');
        $this->load->library('session');
        $this->session->requireLogin();
        $this->load->helper('date');
    }

    public function create() {
        $data = array();
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';

        $data['values'] = array();
        $data['values']['server'] = '';
        $data['values']['port'] = '';
        $data['values']['username'] = '';
        $data['values']['password'] = '';
        
        if (isset($_POST['create']) && $_POST['create'] == 'Create') {
            $data['values'] = $_POST;
            // Loading form validation library
            $this->load->library('form_validation');
            // Setting validation rules
            $this->form_validation->set_rules('server', 'Server', 'required');
            $this->form_validation->set_rules('port', 'Port', 'required');
            $this->form_validation->set_rules('username', 'User Name', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            // Validating..
            if ($this->form_validation->run() == TRUE) {
                $this->Smtp_model->insert();
                redirect('/smtp/lists?msg=smtpaddedsuccess');
            }
        }
        $this->load->view('layout/header');
        $this->load->view('smtp/create', $data);
        $this->load->view('layout/footer');        
    }
    
    public function lists() {
        $data = array();
        $data['msg'] = isset($_GET['msg']) ? $_GET['msg'] : '';

        $finyear_query = $this->Smtp_model->get();

        $data['smtps'] = array();
        foreach ($finyear_query->result() as $row) {
            $data['smtps'][] = $row;
        }

        $this->load->view('layout/header');
        $this->load->view('smtp/list', $data);
        $this->load->view('layout/footer');
    }    
    
    public function get($smtpId) {
        $smtp_query = $this->Smtp_model->getSmtp($smtpId);
        $res = $smtp_query->result();
        $data['smtp'] = $res[0];
            
        $this->load->view('layout/header');
        $this->load->view('smtp/edit', $data);
        $this->load->view('layout/footer');
    }    
    
    public function edit() {
        echo $_POST['id'];
        if (isset($_POST['edit']) && $_POST['edit'] == 'Edit') {
            $this->Smtp_model->edit();
            redirect('/smtp/lists?msg=smtpEditSuccess');
        }
    }    
}

