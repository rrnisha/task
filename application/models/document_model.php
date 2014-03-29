<?php
class Document_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    function get($id){
        $query = $this->db->query('SELECT * FROM documents WHERE register_id='.$id.' and row_status="'.'active'.'" ORDER BY register_id asc');
        
        return $query;
    }    
    function get_update($id, $edit_start_date){
    	$edit_start_date=str_replace('%20', ' ', $edit_start_date);
        $query = $this->db->query('SELECT * FROM documents WHERE register_id='.$id.' and row_status="'.'active'.'" and (create_date > "'.$edit_start_date.'" or update_date > "'.$edit_start_date.'" ) ORDER BY register_id asc');
        
        return $query;
    }    
    function get_update_by_status($id, $status, $edit_start_date){
    	$edit_start_date=str_replace('%20', ' ', $edit_start_date);
        $query = $this->db->query('SELECT * FROM documents WHERE register_id='.$id.' and row_status="'.'active'.'" and status="'.$status.'" and (create_date > "'.$edit_start_date.'" or update_date > "'.$edit_start_date.'" ) ORDER BY register_id asc');
        
        return $query;
    }    
    function get_all(){
        $query = $this->db->query('SELECT * FROM documents WHERE row_status="'.active.'" ORDER BY doc_id desc');
        
        return $query;
    }
    function insert($i){      
        $this->register_id = mysql_real_escape_string($_POST['register_id']);
        
		$this->particulars = mysql_real_escape_string($_POST['particulars'][$i]);
// 		$this->quantity = mysql_real_escape_string($_POST['quantity'][$i]);
		$this->tag = mysql_real_escape_string($_POST['tag'][$i]);
		$this->status = mysql_real_escape_string($_POST['status']);
		$this->by_employee = mysql_real_escape_string($_POST['by_employee'][$i]);
		$this->mode_of_receipt = mysql_real_escape_string($_POST['mode_of_receipt'][$i]);
        $this->db->set('create_date', 'NOW()', FALSE);

        // Inserting..
        $this->db->insert('documents', $this)  or die($this->db->_error_message());
        return;
    }    

    function edit(){
//     else if (mysql_real_escape_string($_POST['particularsChanged'][$i])=="ND") {
//        		// do nothing
//        	} else if (mysql_real_escape_string($_POST['particularsChanged'][$i])=="D") {
//        		if ($_POST['particularsID'][$i]==null){
//        			//do nothing
//        		}else {
////			        $this->register_id = mysql_real_escape_string($_POST['register_id']);
////					$this->particulars = mysql_real_escape_string($_POST['particulars'][$i]);
////					$this->by_employee = mysql_real_escape_string($_POST['by_employee'][$i]);
////					$this->mode_of_receipt = mysql_real_escape_string($_POST['mode_of_receipt'][$i]);
////					$this->quantity = mysql_real_escape_string($_POST['quantity'][$i]);
//					$this->status = "deleted";
////			        $this->db->set('update_date', 'NOW()', FALSE);
//			
//			        // Updating..
////			        $this->db->where('doc_id', $_POST['particularsID'][$i]);
////			        $this->db->update('documents', $this)  or die($this->db->_error_message());
//			        
//			        $this->db->query("UPDATE documents SET status='deleted', update_date=NOW() WHERE doc_id=".$_POST['particularsID'][$i]) or die('error');
//			        
//			        $_POST['doc_id'] = $_POST['particularsID'][$i];
//		        	$_POST['trans_type'] = 'delete';
//            		$this->Document_Transaction_model->insert();            
//        		}
//        	}    	      
        for($i=0;$i<count($_POST["particularsID"]);$i++) {
        	if (mysql_real_escape_string($_POST['particularsChanged'][$i])=="Y") {
		        $this->register_id = mysql_real_escape_string($_POST['register_id']);
				$this->particulars = mysql_real_escape_string($_POST['particulars'][$i]);
				$this->tag = mysql_real_escape_string($_POST['tag'][$i]);
				$this->by_employee = mysql_real_escape_string($_POST['by_employee'][$i]);
				$this->mode_of_receipt = mysql_real_escape_string($_POST['mode_of_receipt'][$i]);
// 				$this->quantity = mysql_real_escape_string($_POST['quantity'][$i]);
				$this->status = mysql_real_escape_string($_POST['status']);
				
		        $this->db->set('update_date', 'NOW()', FALSE);
		
		        // Updating..
		        $this->db->where('doc_id', $_POST['particularsID'][$i]);
		        $this->db->update('documents', $this)  or die($this->db->_error_message());

		        $_POST['doc_id'] = $_POST['particularsID'][$i];
		        $_POST['trans_type'] = 'edit';
            	$this->Document_Transaction_model->insert();            
        	} else if (mysql_real_escape_string($_POST['particularsChanged'][$i])=="NEW") {
		        $this->register_id = mysql_real_escape_string($_POST['register_id']);
				$this->particulars = mysql_real_escape_string($_POST['particulars'][$i]);
				$this->tag = mysql_real_escape_string($_POST['tag'][$i]);
				$this->by_employee = mysql_real_escape_string($_POST['by_employee'][$i]);
				$this->mode_of_receipt = mysql_real_escape_string($_POST['mode_of_receipt'][$i]);
// 				$this->quantity = mysql_real_escape_string($_POST['quantity'][$i]);
				$this->status = mysql_real_escape_string($_POST['status']);
		        $this->db->set('create_date', 'NOW()', FALSE);
		
		        if ($this->particulars=='' || $this->tag=='' || $this->by_employee == 0 || $this->mode_of_receipt == 0) {
		        	continue;
		        } else {
			        // Inserting..
			        $this->db->insert('documents', $this)  or die($this->db->_error_message());        		
		            $_POST['trans_type'] = 'create';
		            $_POST['doc_id'] = $this->db->insert_id();
		            $this->Document_Transaction_model->insert();
		        }            
        	}
        }
        $docsToDel = explode(':', $_POST['particularsDeleted']);
        if (count($docsToDel) >1){
	        foreach ($docsToDel as $docToDel){
				$this->row_status = "deleted";
		        $this->db->query("UPDATE documents SET row_status='deleted', update_date=NOW() WHERE doc_id=".$docToDel) or die('error');
		        $_POST['doc_id'] = $docToDel;
	        	$_POST['trans_type'] = 'delete';
	            $this->Document_Transaction_model->insert();            
	        }
        } else if ($_POST['particularsDeleted'] !='' & count($docsToDel) == 1) {
			$this->row_status = "deleted";
	        $this->db->query("UPDATE documents SET row_status='deleted', update_date=NOW() WHERE doc_id=".$docsToDel[0]) or die('error');
	        $_POST['doc_id'] = $docsToDel[0];
        	$_POST['trans_type'] = 'delete';
            $this->Document_Transaction_model->insert();            
        }
        return;
    }    
    function outward($surrender_by, $doc_id, $status, $mode_of_receipt){
        $this->db->query("UPDATE documents SET  
             status='".$status."', by_employee='".$surrender_by."', mode_of_receipt='".$mode_of_receipt."', update_date=NOW() WHERE doc_id=".$doc_id) or die('error');
    }    
    function inward($received_by, $doc_id, $status, $mode_of_receipt){
        $this->db->query("UPDATE documents SET 
            status='".$status."', by_employee='".$received_by."', mode_of_receipt='".$mode_of_receipt."', update_date=NOW() WHERE doc_id=".$doc_id) or die('error');
    }    
}