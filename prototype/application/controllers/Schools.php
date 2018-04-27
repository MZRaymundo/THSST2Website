<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// set_time_limit(1000);

class Schools extends CI_Controller {
	public function __construct() {
		parent::__construct();


		$this->load->model('schools_model');
		
		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('url_helper');
		$this->load->helper('email');

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->load->database();
	}

    public function index(){
    	$data['title'] = "Schools";

    	//dynamic css & js
		$data['css'] = link_tag('assets/css/schools.css');
				$data['js'] = "assets/js/schools.js";


       // RETRIEVING ALL SCHOOLS
		$data['allschools'] = $this->schools_model->retrieveAllSchools();


		
		$this->load->view('templates/header', $data);
        $this->load->view('pages/view_schools', $data);
        $this->load->view('templates/footer');

    }

    public function go_to_student_page(){
        
        $data['current_student_name'] = $this->input->get('student_name');
        
        $student_info = $this->school_model->retrieveStudentDetails($student_name);
        $data['current_student_bday'] = $student_info['col_student_birthday'];
        $data['current_student_age'] =  $student_info['col_student_age'];
        $data['current_student_sex'] =  $student_info['col_student_sex'];
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/view_students', $data);
        $this->load->view('templates/footer');
    }

    public function get_selected_school_details(){

    	$school_name = $this->input->get('school_name');
    	$school_address = "";
    	$school_details = $this->schools_model->get_selected_school_details($school_name);

    	foreach($school_details as $school_detail){
    	 	$school_address = $school_detail['col_school_address'];
    	}

    	echo json_encode(
    		array(
    			'school_name'		=> $school_name,
    			'school_address'	=> $school_address
    		));
    }

    public function get_selected_school_students(){
    	$school_name = $this->input->get('school_name');
    	$school_students = $this->schools_model->get_selected_school_students($school_name);

        echo json_encode(
            array(
                'school_students' =>$school_students,
                'count_school_students' => count($school_students)
            ));

    	

    }
}
?>