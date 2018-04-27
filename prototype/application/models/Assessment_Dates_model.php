<?php
	class Assessment_Dates_model extends CI_Model {

		public function retrieveAllAssessments() {
			$this->load->database();
			$query = $this->db->select('CAST(col_session_schedule AS DATE) AS DATE, 
										CAST(col_session_schedule AS TIME) AS TIME,
										col_session_id, 
										col_school_name, 
										col_session_password')
							  ->join('tbl_school', 'tbl_session.col_school_id = tbl_school.col_school_id')
							  ->order_by('CAST(col_session_schedule AS DATE), 
							  			  CAST(col_session_schedule AS TIME)', 'asc')
							  ->get('tbl_session');

			return  $query->result_array();
		}

		public function retrieveAllAssessmentDates(){
			$this->load->database();
			$query = $this->db->select('DISTINCT CAST(col_session_schedule AS DATE) AS DATE')
							  ->order_by('CAST(col_session_schedule AS DATE)')
							  ->get('tbl_session');

			return  $query->result_array();	
		}

		public function deleteAssessment($id){
			$this->load->database();
			
			$this->db->where('col_session_id', $id)
					 ->delete('tbl_session');

		}

		public function retrieveAllSchools(){
			$this->load->database();
			
			$query = $this->db->select('col_school_id, col_school_name')
				  			  ->get('tbl_school');

			return  $query->result_array();
		}

		public function retrieveSchoolId($schoolName){
			$this->load->database();
		
			$query = $this->db->select('col_school_id')
				  			  ->where('col_school_name', $schoolName)
				  			  ->get('tbl_school');

			return  $query->result_array();	
		}
	}
?>