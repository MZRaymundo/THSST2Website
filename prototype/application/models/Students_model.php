<?php
	class Students_model extends CI_Model {

		public function retrieveAllStudents() {
			$this->load->database();

			$query = $this->db->select('col_student_id, col_student_fname, col_student_mname, col_student_lname, col_student_suffix')
							  ->get('tbl_students');

			return  $query->result_array();
		}

		public function retrieveAllSchools() {
			$this->load->database();
			$query = $this->db->select('col_school_id, col_school_name')
							  ->get('tbl_school');

			return  $query->result_array();
		}

		public function retrieveAllStudentsFromSchool($school_name){
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