<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// set_time_limit(1000);

class Profile extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('url_helper');
		$this->load->helper('email');

		$this->load->helper('form');
		$this->load->library('form_validation');
	}

    public function index(){
    	$data['title'] = "Profile";

    	//dynamic css & js
		$data['css'] = link_tag('assets/css/profile.css');
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/view_profile', $data);
		$this->load->view('templates/footer');
    }
}
?>