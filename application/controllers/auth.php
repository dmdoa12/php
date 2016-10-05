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

	}
?>