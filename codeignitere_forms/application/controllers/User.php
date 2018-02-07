<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
	 {
 //load model , session and helper
        parent::__construct();
  	  	$this->load->model('user_model');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
    }
 
	public function index()
	{

		$this->load->view('login');
	}


	public function loadRegistre()
	{
		$this->load->view('register');
	}
		public function loadLogin()
	{
		$this->load->view('login');
	}

		public function register()
	{
    $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user.user_email]');
    $this->form_validation->set_rules('password', 'password', 'required');
    $this->form_validation->set_rules('age', 'age', 'required');
    $this->form_validation->set_rules('city', 'city', 'required');
    $this->form_validation->set_rules('username', 'username', 'required');
     if ($this->form_validation->run() == FALSE)
     {
     $this->load->view('register');
    }
    else{   

    $user_name= $this->input->post('username');  
    $email = $this->input->post('email');
    $age= $this->input->post('age');  
    $city = $this->input->post('city'); 
    $password =sha1( $this->input->post('password')); 

    //array for data 
    $data = array(
    'user_name'=> $user_name,
    'user_email'=> $email,
    'user_password'=> $password,
    'user_age'=> $age,
    'user_city'=> $city,
	       ) ; 
	$email_check=$this->user_model->email_check($email);
    if($email_check){
    $this->user_model->register($data);
    $this->session->set_flashdata('success_msg', 'Registered successfully.Now login to your account.'); 
    //data for one reuest then automaticlly cleared
    redirect('user/loadLogin');
 
        }
    else{
 
    $this->session->set_flashdata('error_msg', 'This email is already Regestred Log in Now.');
    redirect('user/loadLogin');
 
 
        }

      }
	}

    public function login(){
     $this->form_validation->set_rules('email', 'email', 'required');
     $this->form_validation->set_rules('password', 'password', 'required');
     if ($this->form_validation->run() == FALSE)
     {
     $this->load->view('login');
    }
    else{



    $email=$this->input->post('email');
    $password=sha1($this->input->post('password'));
    $data=array(
    'user_email'=> $email,
    'user_password'=> $password,
       );
 
    $info=$this->user_model->login_user($email, $password);
      if($info)
      {
        $this->session->set_userdata('user_id',$info['user_id']);
        $this->session->set_userdata('user_email',$info['user_email']);
        $this->session->set_userdata('user_name',$info['user_name']);
        $this->session->set_userdata('user_age',$info['user_age']);
        $this->session->set_userdata('user_city',$info['user_city']);
 
        $this->load->view('user_profile');
 
      }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
        $this->load->view("login");
 
      }
 }
 
}
   public function check(){

 
       echo 'shurooq';

  }



   
   	
}
