<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$this->load->view('head.php');
		$this->load->view('main.php');
		$this->load->view('footer.php');
	}
}
