<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// set_time_limit(1000);

class Register extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->library('session');
		$this->load->model('register_model');

		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('url_helper');
		$this->load->helper('email');

		$this->load->helper('form');
		$this->load->library('form_validation');
	}

    public function index(){
    	$data['title'] = "System Name";

    	//dynamic css & js
		$data['css'] = link_tag('assets/css/register.css');
		$data['js'] = "<script type='text/javascript' src='<?php echo base_url(); ?>assets/js/register.js'></script>";

		//temp
		$data['invalidInput'] = "";

		$this->load->view('pages/view_register', $data);
    }

   public function check(){
    	$data['title'] = "System Name";
		$data['css'] = link_tag('assets/css/register.css');

    	$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email', 'e-mail', 'required');
		$this->form_validation->set_rules('password', 'password', 'required');

		if($this->form_validation->run() === FALSE){
			if($this->input->post('email') === "" && $this->input->post('password') === ""){
		 		$data['invalidInput'] = "Please Enter Your Email and Password";
		 	}
			else if($this->input->post('email') === "" && $this->input->post('password') != ""){
		 		$data['invalidInput'] = "Please Enter Your Email";
			 }
			else if($this->input->post('email') != "" && $this->input->post('password') === ""){
		 	$data['invalidInput'] = "Please Enter Your Password";
			}
			$this->load->view('pages/view_login', $data);
		}
		else {
			if($this->register_model->check()) {
				$data['invalidInput'] = "Account Exists...";
				$this->load->view('pages/view_login', $data);
			}
			else {
				$sessiondata = array(
						'email' => $this->input->post('email'),
						'password' => $this->input->post('password'),
					);
				$this->db->insert('tbl_users', $sessiondata);
				$this->session->set_userdata($sessiondata);
				redirect('home');
			}
		}
    }
}
?>