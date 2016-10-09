<?php
	class User_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		//회원가입 기능
		public function register($option){
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
		//로그인 기능
		public function getId($option){
			$result = $this->db->get_where("user",array("id" => $option["id"]))->row();
			return $result;
		}
		//아이디 찾기
		public function findId($option){
			$where = array(
					'name' => $option['name'],
					'email' => $option['email']
			);

			$result = $this->db->get_where("user",$where)->row();
			return $result;
		}
		//유저확인 (비밀번호)
		public function findPw($option){
			$where = array(
					'id' => $option['id'],
					'quiz' => $option['quiz'],
					'result' => $option['result']
			);

			$result = $this->db->get_where("user",$where)->row();
			return $result;
		}
		//비밀번호 수정
		public function modifyPw($option){
			$data=array(
					'password' => $option['new_passwd']
				);

			$this->db->where('id',$option['id']);
			$this->db->update('user',$data);
		}
	}
?>