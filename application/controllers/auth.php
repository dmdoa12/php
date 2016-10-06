<?php
	class Auth extends CI_Controller{
	
		function __construct(){
				parent::__construct();
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
			$authantication = $this->config->item('authantication');

			if($this->input->post('id') == $authantication['id'] && $this->input->post('password') == $authantication['password']){
				$this->session->set_userdata("is_login",true);
				$this->load->helper('url');
				redirect("/News/board");
			}
			else{
				$this->session->set_flashdata('message','로그인에 실패 했습니다.');
				$this->load->helper('url');
				redirect("");
			}
			
		}

	}
?>