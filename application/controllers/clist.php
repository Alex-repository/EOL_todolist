<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clist extends CI_Controller {
    
     function __construct()
    {
        parent::__construct();
        $this->load->model('mlist');
         $this->load->helper('form');
         $this->load->library('user_agent'); 
    }

	public function index()
	{
		$this->load->view('vlist');
	}
    
    function savetask(){
        $data['tarea'] = $this->input->post('task');
        $this->mlist->saveTask($data); 
        redirect($this->agent->referrer()); 
    }
    
    function gettask(){
        echo json_encode($this->mlist->getTask());
        
    }
   function deletetask(){
    $data['id'] = $this->input->post('id');
    $this->mlist->deleteTask($data);
    redirect($this->agent->referrer()); 
   }
}