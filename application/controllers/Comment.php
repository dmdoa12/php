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
}
?>