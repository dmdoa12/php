<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function index()
	{
		echo '토픽 페이지';
	}

	public function get($id)
	{
		echo '토픽'.$id;
	}

}
?>