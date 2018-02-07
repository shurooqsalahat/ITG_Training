<?php
class Form extends CI_Controller {

 public function __construct(){
   parent::__construct();

  $this->load->library('form_validation');
  $this->load->helper(array('form', 'url'));
   $this->load->library('session');
 }

 public function index(){
  
  $this->form_validation->set_rules('userName', 'Username', 'required');
  $this->form_validation->set_rules('userPassword', 'Password', 'required');
  $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
  
  if ($this->form_validation->run() == FALSE){
   $this->load->view('myform');
  }else{
   $this->load->view('login');
  }
  
 }
}
?>