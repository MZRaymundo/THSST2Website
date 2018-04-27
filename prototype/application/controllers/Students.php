<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// set_time_limit(1000);

class Students extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('students_model');

		$this->load->helper('url');
		$this->load->helper('html');
		$this->load->helper('url_helper');
		$this->load->helper('email');

		$this->load->helper('form');
		$this->load->library('form_validation');
	}

    public function index(){
    	$data['title'] = "Students";

    	//dynamic css & js
		$data['css'] = link_tag('assets/css/students.css');
		$data['js'] = "assets/js/students.js";


       // RETRIEVING ALL STUDENTS
		$data['allstudents'] = $this->students_model->retrieveAllStudents();
		// RETRIEVING ALL SCHOOLS
		$data['allschools'] = $this->students_model->retrieveAllSchools();

		$data['current_student_name'] = "";
		$data['current_student_bday'] = "";
		$data['current_student_age'] = "";
		$data['current_student_sex'] = "";
		
		$this->load->view('templates/header', $data);
		$this->load->view('pages/view_students', $data);
		$this->load->view('templates/footer');
    }

    public function get_selected_school_students(){
    	$school_name = $this->input->get('school_name');

    	if($school_name == "ALL SCHOOLS")
    		$school_students = $this->students_model->retrieveAllStudents();
    	else	
    		$school_students = $this->students_model->retrieveAllStudentsFromSchool($school_name);

        echo json_encode(
            array(
                'school_students' =>$school_students,
                'count_school_students' => count($school_students)
            ));

    }

    public function get_selected_student_details(){
    	$student_name = $this->input->get('student_name');
    	$student_info = $this->students_model->retrieveStudentDetails($student_name);

    	echo json_encode($student_info);

    }
}
?>