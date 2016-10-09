<?php
class Board extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Board_model');
	}

	public function index(){
		if (!$this->session->userdata('is_login')) {
			$this->session->set_flashdata('message','로그인을 하셔야 됩니다.');
			$this->load->helper('url');
			redirect("");
		}

		$this->lists();
	}
		//사이트 헤더,푸터 추가
	public function _remap($method){
		$this->load->view('_head');

		var_dump((int)($this->uri->segment(2,1)));
		if(method_exists($this,$method)){
			$this->{"{$method}"}();
		}

		$this->load->view('_footer');
	}

	public function lists() {
		$this->load->library('pagination');
        // 페이지 네이션 설정
        $config['base_url'] = '/index.php/Board';
        // 페이징 주소
        $config['total_rows'] = $this->Board_model->get_list('count');
        // 게시물 전체 개수
        $config['per_page'] = 4;
        // 한 페이지에 표시할 게시물 수
        $config['uri_segment'] = 2;
        // 페이지 번호가 위치한 세그먼트
 
        // 페이지네이션 초기화
        $this->pagination->initialize($config);
        // 페이지 링크를 생성하여 view에서 사용한 변수에 할당
        $data['pagination']=$this->pagination->create_links();
 
        // 게시물 목록을 불러오기 위한 offset, limit 값 가져오기
        $page=(int)($this->uri->segment(2,1));
 		/**
        if ($page>1) {
            $start=($page/$config['per_page'])*$config['per_page'];
        } else {
            $start=($page-1)*$config['per_page'];
        }
        **/
        $start=0;
        $limit=$config['per_page'];

		$data['list'] = $this->Board_model->get_list('',$start,$limit);
		$this->load->view('board_view', $data);
	}

	public function viewboard(){

	}
}
?>
