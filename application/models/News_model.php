<?php
	class News_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function gets(){
			return $this->db->query("SELECT * FROM user")->result();
		}
	}