<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Board extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Board_model');
        $this->load->model('Comment_model');
        $this->load->library('pagination');

    }

    function index(){

    }//게시판 메인

    public function page($page_num=0){
        $data['page'] = $this->uri->segment(3,0);

        $data['total'] = $this->Board_model->getAll();
        $config = array(
            'base_url' => '/index.php/Board/page',
            'total_rows' => $data['total'],
            'per_page' => 7,
            'num_links' => 10,
            'uri_segment' => 3
            );
// $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
// $config['display_pages'] = FALSE;
// 
        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);

        $data['query'] = $this->Board_model->getList($config['per_page'], $data['page']);
        $data['pagination']=$this->pagination->create_links();

        $this->load->view('_head');
        $this->load->view('board_view',$data);
        $this->load->view('_footer');

    }
    public function view($board_id,$page_num=0) {
        $data['page'] = $this->uri->segment(5,0);

        $data['total'] = $this->Comment_model->comment_getAll();
        $config = array(
            'base_url' => '/index.php/Board/view/'.$board_id.'/page',
            'total_rows' => $data['total'],
            'per_page' => 5,
            'num_links' => 10,
            'uri_segment' => 5
            );
// $config['use_page_numbers'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['full_tag_open'] = '<div class="pagination"><ul>';
        $config['full_tag_close'] = '</ul></div><!--pagination-->';
        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = 'Next &rarr;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&larr; Previous';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
// $config['display_pages'] = FALSE;
// 
        $config['anchor_class'] = 'follow_link';

        $this->pagination->initialize($config);

        $data['query'] = $this->Comment_model->comment_getList($config['per_page'], $data['page'],$board_id);
        $data['pagination']=$this->pagination->create_links();

        // 게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
        $data['content'] = $this->Board_model->get_view($board_id);

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
            redirect("/Board/page");
        }
    }//글쓰기

    public function delete($board_id){
    	$this->Board_model->deleteboard($board_id);
    	$this->session->set_flashdata('success','글 삭제가 완료되었습니다.');
        redirect("/Board/page");
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
            $this->session->set_flashdata('message','입력 범위를 초과했습니다.');
            redirect("/Board/view/".$board_id);
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
