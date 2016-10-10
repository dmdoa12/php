<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->view('head');
		$this->load->view('main');
		$this->load->view('footer');
	}
}
?>
