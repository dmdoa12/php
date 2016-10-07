<?php
	class User_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		public function add($option){
			$this->db->set('id',$option['id']);
			$this->db->set('name',$option['name']);
			$this->db->set('password',$option['password']);
			$this->db->set('email',$option['email']);
			$this->db->set('quiz',$option['quiz']);
			$this->db->set('result',$option['result']);
			$this->db->insert('user');

			$result = $this->db->insert_id();
			return $result;

		}

		public function getId($option){
			$result = $this->db->get_where("user",array("id" => $option["id"]))->row();
			return $result;
		}
	}
?>