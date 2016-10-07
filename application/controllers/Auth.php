<?php
	class Auth extends CI_Controller{
	
		function __construct(){
				parent::__construct();
				$this->load->helper('url');
			}

		public function index(){
			echo "hello";
		}

		public function login(){
			$this->load->view('_head');
			$this->load->view('login_view');
			$this->load->view('_footer');
		}
		//로그인 기능
		public function authantication(){
			$this->load->model('User_model');
			$this->load->helper('password');
			$user = $this->User_model->getId(array("id"=>$this->input->post("id")));

			if($this->input->post("id") == $user->id && password_verify($this->input->post("password"),$user->password)){
				$this->session->set_flashdata('success','로그인 되었습니다.');
				$this->session->set_userdata("is_login",true);
				redirect("/News/board");

			}
			else{
				$this->session->set_flashdata('message','로그인에 실패 했습니다.');
				redirect("");
			}
			
		}
		//로그 아웃
		public function logout(){
			$this->session->sess_destroy();
			$this->session->set_flashdata('success','로그아웃 되었습니다.');
			redirect("");
			
		}
		//회원가입
		public function register(){
			$this->load->library("form_validation");

			$this->form_validation->set_rules('id', '아이디', 'required|is_unique[user.id]');
			$this->form_validation->set_rules('name', '이름', 'required|max_length[10]');
			$this->form_validation->set_rules('password', '비밀번호', 'required|max_length[30]|matches[password-confirm]');
			$this->form_validation->set_rules('password-confirm', '비밀번호 확인', 'required');
			$this->form_validation->set_rules('email', '이메일 주소', 'required|valid_email');
			$this->form_validation->set_rules('quiz', '문항', 'required');
			$this->form_validation->set_rules('result', '문항 정답', 'required|max_length[30]');

			 if($this->form_validation->run() === false){
			 	echo "실패";
			 }
			 //회원가입 포맷 일치
			 else{
			 	$this->load->helper('password');
			 	$this->load->model('User_model');

			 	$hash = password_hash($this->input->post('password'),PASSWORD_BCRYPT);

			 	$this->User_model->add(array(
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
	}
?>
