<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// set_time_limit(1000);

class Search extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model('search_model');

		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

    public function index(){
		$data['title'] = "Search";
		
		//dynamic css & js
		$data['css'] = link_tag('assets/css/search.css');
		$data['js'] = "assets/js/search.js";


        $this->load->view('templates/header_search', $data);
        $this->load->view('pages/view_search', $data);
        $this->load->view('templates/footer');
    }

    public function retrieveItems(){
    	$searched_item = $this->input->get('searched_item');


    	$search_results = $this->search_model->retrieveItems($searched_item);
    	$count_search_results = count($search_results);

    	if($searched_item == ""){
    		$count_search_results = 0;
    	}
        echo json_encode(
            array(
                'search_results' => $search_results,
                'count_search_results' => $count_search_results
            ));

    	

    }
}
?>