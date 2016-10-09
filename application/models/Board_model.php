<?php
class Board_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	function get_list($type='',$offset='',$limit='') {
		$limit_query = '';

		if ($limit!='' OR $offset!='') {
            // 페이징이 있을 경우 처리
			$limit_query='LIMIT '.$offset.','.$limit;
		}

		$sql = "SELECT * FROM board ORDER BY boardNum DESC ".$limit_query;
		$query = $this->db->query($sql);

		if ($type=='count') {
			$result =$query->num_rows();
		} else {
			$result =$query->result();
		}

		return $result;
	}
}
?>