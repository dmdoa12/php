<?php
class Board extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Board_model');
	}

	function index(){
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
		$config['per_page'] = 12;
        // 한 페이지에 표시할 게시물 수
		$config['uri_segment'] = 2;
        // 페이지 번호가 위치한 세그먼트

        // 페이지네이션 초기화
		$this->pagination->initialize($config);
        // 페이지 링크를 생성하여 view에서 사용한 변수에 할당
		$data['pagination']=$this->pagination->create_links();

        // 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
		$page=(int)($this->uri->segment(2,1));

        if ($page>1) {
            $start=($page/$config['per_page'])*$config['per_page'];
        } else {
            $start=($page-1)*$config['per_page'];
        }
       
        $limit=$config['per_page'];

        $data['list'] = $this->Board_model->get_list('',$start,$limit);
        $this->load->view('board_view',$data);

        $this->load->view('_footer');
    }

    public function view($board_id) {
    	$this->load->view('_head');
        // 게시판 이름과 게시물 번호에 해당하는 게시물 가져오기
        $data = $this->Board_model->get_view($board_id);
 
        // view 호출
        $this->load->view('board_content',$data);

        $this->load->view('_footer');
    }
    public function write(){
    	$this->load->view('_head');
    	$this->load->view('board_write');
    	$this->load->view('_footer');
    }

    public function insert(){
        $this->load->library("form_validation");

        $this->form_validation->set_rules('boardTitle', '글제목', 'required|max_length[50]');
        $this->form_validation->set_rules('boardContent', '글내용', 'required|max_length[500]');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('message','입력 값을 확인해주시기 바랍니다.');
            redirect("");
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
    }
}
?>
