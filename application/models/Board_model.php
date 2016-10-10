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

	public function get_view($id) {
        $sql = "SELECT * FROM board WHERE boardNum = ".$id;
        $query = $this->db->query($sql);

        // 게시물 내용 반환
        $result = $query->row();

        return $result;
    }

    public function writeboard($option){
    	$this->db->set('id',$option['id']);
    	$this->db->set('boardDate',$option['boardDate'],false);
    	$this->db->set('boardTitle',$option['boardTitle']);
    	$this->db->set('boardContent',$option['boardContent']);
    	$this->db->insert('board');
    }

    public function deleteboard($id){
    	$this->db->delete('board',array('boardNum' => $id));
    }

    public function modifyboard($id,$option){
    	$this->db->where('boardNum',$id);
    	$this->db->update('board',$option);
    }
    //pagination
    function total_entry(){
        $query = $this->db->get('board');
        return $query->num_rows();
    }
    // select
    function select_entry($list_num,$offset){
        $query = $this->db->get('board',$list_num,$offset);
        return $query->result();
    }
}
?>