<?php
	class Auth extends CI_Controller{
	
		function __construct(){
				parent::__construct();
				$this->load->helper('url');
				$this->load->helper('password');
			 	$this->load->model('User_model');
			 	$this->load->library("form_validation");
			}
			
		public function login(){
			$this->load->view('_head');
			$this->load->view('login_view');
			$this->load->view('_footer');
		}
		//로그인 기능
		public function authantication(){
			$this->form_validation->set_rules('id', '아이디', 'required|max_length[20]');
			$this->form_validation->set_rules('password', '비밀번호', 'required|max_length[20]');
			
			$user = $this->User_model->getId(array("id"=>$this->input->post("id")));

			if($this->form_validation->run() == false){
				$this->session->set_flashdata('message','입력 값을 확인해주시기 바랍니다.');
				redirect("");
			}
			else{
				$set_id = $this->input->post("id");

				if($this->input->post("id") == $user->id && password_verify($this->input->post("password"),$user->password)){
					$this->session->set_flashdata('success','로그인 되었습니다.');
					$this->session->set_userdata('id',$set_id);
					$this->session->set_userdata("is_login",true);
					redirect("/Board/page");
				}
				else{
					$this->session->set_flashdata('message','로그인에 실패 했습니다.');
					redirect("");
				}
			}
		}
		//로그 아웃
		public function logout(){
			$this->session->unset_userdata("is_login");
			$this->session->unset_userdata('id');
			$this->session->set_flashdata('success','로그아웃 되었습니다.');
			redirect("");
		}
		//회원가입
		public function register(){
			$this->form_validation->set_rules('id', '아이디', 'required|is_unique[user.id]');
			$this->form_validation->set_rules('name', '이름', 'required|max_length[10]');
			$this->form_validation->set_rules('password', '비밀번호', 'required|max_length[30]|matches[password-confirm]');
			$this->form_validation->set_rules('password-confirm', '비밀번호 확인', 'required');
			$this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('quiz', '문항', 'required');
			$this->form_validation->set_rules('result', '문항 정답', 'required|max_length[30]');

			 if($this->form_validation->run() == false){
			 	$this->session->set_flashdata('message','입력 값을 확인해주시기 바랍니다.');
				redirect("");
			 }
			 //회원가입 포맷 일치
			 else{
			 	$hash = password_hash($this->input->post('password'),PASSWORD_BCRYPT);

			 	$this->User_model->register(array(
			 		"id" =>$this->input->post("id"),
			 		"name" =>$this->input->post("name"),
			 		"password" =>$hash,
			 		"email" =>$this->input->post("email"),
			 		"quiz" =>$this->input->post("quiz"),
			 		"result" =>$this->input->post("result")
			 		));

			 	$this->session->set_flashdata('success','회원가입이 완료되었습니다.');
			 	redirect("");
			 }
		}
		//id 찾기
		public function idFind(){
			$this->form_validation->set_rules('name', '이름', 'required|max_length[20]');
			$this->form_validation->set_rules('email', '이메일', 'required|valid_email');

			if($this->form_validation->run() == false){
				$this->session->set_flashdata('message','입력 값을 확인해주시기 바랍니다.');
				redirect("");
			}
			else{
				$find = $this->User_model->findId(array(
			 		"name" =>$this->input->post("name"),
			 		"email" =>$this->input->post("email")
			 		));
				if($find->id == ""){
					$this->session->set_flashdata('message','찾으시는 계정이 없습니다.');
					redirect("");
				}
				else{
					$this->session->set_flashdata('success','찾으시는 아이디는 '.$find->id.' 입니다.');
					redirect("");
				}
			}

		}
		//pw 찾기
		public function pwFind(){
			$this->form_validation->set_rules('id', '아이디', 'required|max_length[20]');
			$this->form_validation->set_rules('quiz', '문항', 'required');
			$this->form_validation->set_rules('result', '문항 정답', 'required|max_length[30]');

			$set_id = $this->input->post('id');
			if($this->form_validation->run() == false){
				$this->session->set_flashdata('message','입력 값을 확인해주시기 바랍니다.');
				redirect("");
			}
			else{
				$find = $this->User_model->findPw(array(
					"id" =>$this->input->post("id"),
					"quiz" =>$this->input->post("quiz"),
					"result" =>$this->input->post("result")
					));

				if($find->password == ""){
					$this->session->set_flashdata('message','아이디나 문제 또는 정답을 확인해주시기 바랍니다.');
					redirect("");
				}
				else{
					$this->session->set_userdata("passChange",true);
					$this->session->set_userdata("check_id",$set_id);
					$this->load->view('head');
					$this->load->view('newPassword');
					$this->load->view('footer');
				}
			}

		}//pwFind

		public function pwModify(){
			if (!$this->session->userdata('passChange') || !$this->session->userdata('check_id')) {
			$this->session->set_flashdata('message','잘못된 접근입니다.');
			redirect("");
		}	

			$this->load->model('User_model');
			$this->load->library("form_validation");
			$this->form_validation->set_rules('new_passwd', '새 비밀번호', 'required|max_length[20]|matches[new_passwd_confirm]');
			$this->form_validation->set_rules('new_passwd_confirm','새 비밀번호 확인','required|max_length[20]');

			if($this->form_validation->run() == false){
				$this->session->set_flashdata('message','입력 값을 확인해주시기 바랍니다.');
				redirect("");
			}
			else{
				$hash = password_hash($this->input->post('new_passwd'),PASSWORD_BCRYPT);

				$this->User_model->modifyPw(array(
					"id" =>$this->session->userdata('check_id'),
					"new_passwd" => $hash
					));

				$this->session->unset_userdata("passChange");
				$this->session->set_flashdata('success','비밀번호 변경이 완료되었습니다.');
			 	redirect("");
			}
		}

	}//class
?>
