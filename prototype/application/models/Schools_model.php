<?php
	class Schools_model extends CI_Model {

		public function retrieveAllSchools() {
			$this->load->database();

//			$query = $this->db->query("SELECT col_school_id, col_school_name FROM tbl_school");
			$query = $this->db->select('col_school_id, col_school_name')
							  ->get('tbl_school');

			return  $query->result_array();
		}

		public function get_selected_school_details($school_name){
			$this->load->database();

			$query = $this->db->select('col_school_name, col_school_address')
							  ->where('col_school_name', $school_name)
							  ->get('tbl_school');

			return  $query->result_array();
		}

		public function get_selected_school_students($school_name){
			$this->load->database();

			$query = $this->db->select('*')
							  ->join('tbl_school SC', 'ST.col_school_id = SC.col_school_id')
							  ->where('SC.col_school_name', $school_name)
							  ->get('tbl_students ST');

			return  $query->result_array();	
		}

		public function retrieveStudentDetails($student_name){
			$this->load->database();

			$query = $this->db->select('CONCAT(col_student_fname, " ", col_student_mname, " ", col_student_lname, " ", IF(col_student_suffix != null, col_student_suffix, "")) AS FULLNAME, col_student_birthday, col_student_age, col_student_sex')
							  ->like('CONCAT(col_student_fname, " ", col_student_mname, " ", col_student_lname, " ", IF(col_student_suffix != null, col_student_suffix, ""))', $student_name)
							  ->get('tbl_students');

			return  $query->result_array();
		}
	}
?>