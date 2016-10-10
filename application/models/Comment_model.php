<?php
class Comment_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	//댓글 작성
	public function writeComment($option){
    	$this->db->set('id',$option['id']);
    	$this->db->set('commentDate',$option['commentDate'],false);
    	$this->db->set('commentContent',$option['commentContent']);
    	$this->db->set('boardNum',$option['boardNum']);
    	$this->db->insert('comment');
    }
    //댓글 내용 부르기
    public function get_reply_view($id) {
        $sql = "SELECT * FROM comment WHERE boardNum = ".$id." ORDER BY commentDate DESC";
        $query = $this->db->query($sql);

        // 게시물 내용 반환
        $result = $query->result();

        return $result;
    }

}
?>