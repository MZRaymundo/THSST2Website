<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// set_time_limit(1000);

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		// $this->load->model('psychologist_home_model');

		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

    public function index(){
		$data['title'] = "Home";
		
		//dynamic css & js
		$data['css'] = link_tag('assets/css/home.css');
		$data['js'] = "assets/js/home.js";


        $this->load->view('templates/header', $data);
        $this->load->view('pages/view_home', $data);
        $this->load->view('templates/footer');
    }
}
?>