<?php
	class Search_model extends CI_Model {

		public function retrieveItems($input){
			$this->load->database();

			$query1 = $this->db->select('col_school_name as RESULTS, "School" AS IDENTIFIER')
							   ->like('col_school_name', $input)
							   ->get('tbl_school');

			$query2 = $this->db->select('CONCAT(col_student_fname, " ", col_student_mname, " ", col_student_lname, " ", IF(col_student_suffix != null, col_student_suffix, "")) as RESULTS, "Student" AS IDENTIFIER')
							   ->like('CONCAT(col_student_fname, " ", col_student_mname, " ", col_student_lname, " ", IF(col_student_suffix != null, col_student_suffix, ""))', $input)
							   ->get('tbl_students');

			$query = array_merge($query1->result_array(), $query2->result_array());
			sort($query);

			return  $query;	
		}
	}
?>