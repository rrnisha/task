<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Session {
    public function requireLogin(){  
        if( !$this->isLoggedIn() ){
            redirect('/employee/index?msg=login_continue');
        }
    }
    public function isLoggedIn(){  
        if( isset($_SESSION['emp_id']) && $_SESSION['emp_id']){
            return true;
        }else{
            return false;
        }
    }
}