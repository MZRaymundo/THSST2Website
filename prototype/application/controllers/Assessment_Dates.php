<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// set_time_limit(1000);

class Assessment_Dates extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('assessment_dates_model');

		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('url_helper');
		$this->load->helper('email');

		$this->load->helper('form');
		$this->load->library('form_validation');
	}

    public function index(){
    	$data['title'] = "Assessment Dates";

    	//dynamic css & js
		$data['css'] = link_tag('assets/css/assessment_dates.css');
		$data['js'] = "assets/js/assessment_dates.js";
		
		$data['allassessments'] = $this->assessment_dates_model->retrieveAllAssessments();
		$data['alldates'] = $this->assessment_dates_model->retrieveAllAssessmentDates();

       // RETRIEVING ALL SCHOOLS
		$data['allschools'] = $this->assessment_dates_model->retrieveAllSchools();



		$this->load->view('templates/header', $data);
		$this->load->view('pages/view_assessment_dates', $data);
		$this->load->view('templates/footer');
    }

    public function deleteAssessment(){
    	$item_id_tobe_deleted = $this->input->get('item_id_tobe_deleted');
    	$this->assessment_dates_model->deleteAssessment($item_id_tobe_deleted);

    	echo json_encode("An assessment was deleted");
    }

    public function addAssessment(){
    	$password		 = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ<>?!@#$%^&()"), 0, 8);
    	$school			 = $this->input->get("school");
		$assessment_date = $this->input->get("assessment_date");
		$school_ids		 = $this->assessment_dates_model->retrieveSchoolId($school);
		$school_id ="";

		foreach($school_ids as $row){
    	 	$school_id = $row['col_school_id'];
    	}

    	$data_arr = array(
		        'col_session_password' => $password,
		        'col_session_schedule' => $assessment_date,
		        'col_school_id' => $school_id
		);

		$this->db->insert('tbl_session', $data_arr);

		echo json_encode($assessment_date);
//		echo json_encode("An assessment was deleted");
    }
}
?>