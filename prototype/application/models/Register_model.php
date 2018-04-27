<?php
	class Register_model extends CI_Model {
		public function check() {
			$this->load->database();

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$query = $this->db->query("SELECT * FROM tbl_users WHERE email = '".$email."' AND password = '".$password."'");
			if($query->num_rows() > 0){
				return true;
			}
			else
				return false;
		}

		public function getUserId() {
			$this->load->database();

			$userId = 0;
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$query = $this->db->query("SELECT user_id FROM tbl_users WHERE email = '".$email."' AND password = '".$password."'");
			if($query->num_rows() > 0) {
				$result = $query->row();
				if(isset($result)) {
					$userId = $result->user_id;
				}
			}
			else $userId = 0;

			return $userId;
		}
	}
?>