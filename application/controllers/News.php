<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		/**
		$this->load->database();
		$this->load->model('News_model');
		$data = $this->News_model->gets();
		foreach($data as $entry){
			var_dump($entry);
		}
		**/
		$this->load->view('head');
		$this->load->view('main');
		$this->load->view('footer');
	}
	//게시판 로그인을 해야 접속 가능
	public function board(){

		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message','로그인을 하셔야 됩니다.');
			$this->load->helper('url');
			redirect("");
		}

		$this->load->view('_head');
		$this->load->view('board');
		$this->load->view('_footer');
	}
}
