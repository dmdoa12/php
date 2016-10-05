<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
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
}
