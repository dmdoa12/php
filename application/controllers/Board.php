<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Board extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Board_model');
        $this->load->model('Comment_model');
        $this->load->library('pagination');
	}

	function index($board_page=0){
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message','로그인을 하셔야 됩니다.');
			$this->load->helper('url');
			redirect("");
     }

     $this->load->view('_head');
     $this->load->library('pagination');
        // 페이지 네이션 설정
     $config['base_url'] = '/index.php/Board';
        // 페이징 주소
     $config['total_rows'] = $this->Board_model->get_list('count');
        // 게시물 전체 개수
     $config['per_page'] = 4;
        // 한 페이지에 표시할 게시물 수
     $config['uri_segment'] = 3;
        // 페이지 번호가 위치한 세그먼트

        // 페이지네이션 초기화
     $this->pagination->initialize($config);
        // 페이지 링크를 생성하여 view에서 사용한 변수에 할당
     $data['pagination']=$this->pagination->create_links();

        // 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
     $page=(int)($this->uri->segment(3,0));

    $data['list'] = $this->Board_model->get_list('',$page,$config['per_page']);
    $this->load->view('board_view',$data);

    $this->load->view('_footer');
    }//게시판 메인

    public function view($board_id) {
        // 게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
        $data['content'] = $this->Board_model->get_view($board_id);
        $data['comment_list'] = $this->Comment_model->get_reply_view($board_id);

        $this->load->view('_head');
        $this->load->view('board_content',$data);
        $this->load->view('_footer');
    }//글보기

    public function write(){
        if (!$this->session->userdata('is_login')) {
            $this->session->set_flashdata('message','로그인을 하셔야 됩니다.');
            $this->load->helper('url');
            redirect("");
        }

        $this->load->view('_head');
        $this->load->view('board_write');
        $this->load->view('_footer');
    }//글쓰기

    public function insert(){
        $this->load->library("form_validation");

        $this->form_validation->set_rules('boardTitle', '글제목', 'required|max_length[50]');
        $this->form_validation->set_rules('boardContent', '글내용', 'required|max_length[1000]');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('message','입력 값을 확인해주시기 바랍니다.');
            redirect("/Board");
        }
        else{
            $this->Board_model->writeboard(array(
                'boardTitle' => $this->input->post('boardTitle'),
                'boardContent' => $this->input->post('boardContent'),
                'boardDate' => 'sysdate()',
                'id' => $this->session->userdata('id')
                ));
            $this->session->set_flashdata('success','글 작성이 완료되었습니다.');
            redirect("/Board");
        }
    }//글쓰기

    public function delete($board_id){
    	$this->Board_model->deleteboard($board_id);
    	$this->session->set_flashdata('success','글 삭제가 완료되었습니다.');
        redirect("/Board");
    }

    public function modify($board_id){
        $data = $this->Board_model->get_view($board_id);

        $this->load->view('_head');
        $this->load->view('board_modify',$data);
        $this->load->view('_footer');
    }

    public function boardmodify($board_id){
        $this->load->library("form_validation");

        $this->form_validation->set_rules('boardTitle', '글제목', 'required|max_length[50]');
        $this->form_validation->set_rules('boardContent', '글내용', 'required|max_length[1000]');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('message','입력 값을 확인해주시기 바랍니다.');
            redirect("");
        }
        else{
            $this->Board_model->modifyboard($board_id,array(
                'boardTitle' => $this->input->post('boardTitle'),
                'boardContent' => $this->input->post('boardContent')
                ));
            $this->session->set_flashdata('success','글 수정이 완료되었습니다.');
            redirect("/Board/view/".$board_id);
        }
    }
}
?>
