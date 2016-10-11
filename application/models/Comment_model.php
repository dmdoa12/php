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

    public function removeComment($id){
    	$this->db->delete('comment',array('commentNum' => $id));
    }

    public function commentModify($id,$option){
        $this->db->where('commentNum',$id);
        $this->db->update('comment',$option);
    }

    public function comment_getAll(){
        $query = $this->db->get('comment');
        return $query->num_rows();
    }

    public function comment_getList($limit=0, $offset=0,$id){
        $this->db->where('boardNum',$id);
        $this->db->order_by("commentDate", "desc"); 
        $query = $this->db->get('comment',$limit,$offset)->result();
        return $query;
    }
}
?>