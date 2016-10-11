<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Comment extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Comment_model');
		$this->load->library("form_validation");
	}

	function index(){

	}

    public function comment_page()

	public function commentWrite($board_id){
		$this->form_validation->set_rules('comment','댓글 내용','required|max_length[500]');

		if($this->form_validation->run() == false){
            $this->session->set_flashdata('message','입력 범위를 초과했습니다.');
            redirect("/Board/view/".$board_id);
        }
        else{
            $this->Comment_model->writeComment(array(
            	'boardNum' => $board_id,
                'commentContent' => $this->input->post('comment'),
                'commentDate' => 'sysdate()',
                'id' => $this->session->userdata('id')
                ));
            $this->session->set_flashdata('success','댓글 작성이 완료되었습니다.');
            redirect("/Board/view/".$board_id);
        }
	}

	public function commentRemove($board_id,$comment_id){
		$this->Comment_model->removeComment($comment_id);
    	$this->session->set_flashdata('success','댓글 삭제가 완료되었습니다.');
        redirect("/Board/view/".$board_id);
	}

	public function commentModify($board_id,$comment_id){
		$this->session->set_userdata("modifyStatus",true);
		$this->session->set_userdata("comment_id",$comment_id);
		redirect("/Board/view/".$board_id);
	}

	public function modify($board_id,$comment_id){
        $this->form_validation->set_rules('commentContent', '댓글내용', 'required|max_length[500]');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('message','입력 범위를 초과했습니다.');
            redirect("/Board/view/".$board_id);
        }
        else{
            $this->Comment_model->commentModify($comment_id,array(
                'commentContent' => $this->input->post('commentContent')
                ));
            $this->session->unset_userdata("modifyStatus");
            $this->session->set_flashdata('success','댓글 수정이 완료되었습니다.');
            redirect("/Board/view/".$board_id);
        }
	}

	public function modifyCancel($board_id){
		$this->session->unset_userdata("modifyStatus");
		redirect("/Board/view/".$board_id);
	}
}
?>