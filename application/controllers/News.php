<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	var $layout = 'main_layout.php';

	public function index()
	{
		$this->load->view('main');
	}
	public function ajax_call()
	{
		$this->News = FALSE;

		echo json_encode($array);
	}
	public function get($id)
	{
		echo '토픽'.$id;
	}

}
?>