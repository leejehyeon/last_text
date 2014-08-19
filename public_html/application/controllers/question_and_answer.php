<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_and_answer extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('ci_board');
		$this -> load -> model('q_a_board');
		$this -> load -> model('reply_ci_board');
		$this -> load -> model('tutor_tutee');
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
		$this -> load -> library('pagination');	
	}

	public function _remap($title,$name) {
		$req_id = $this -> input -> get('req_id');
		$title_name= implode(",", $name);
		$login_data = $this -> session -> userdata('login_data');

		if($login_data != NULL){
			 $data['login_data'] = $login_data;
		}
		
		$data['req_id'] = $req_id;
		$data['category_title'] = $title;
		$data['name']=$name[0];
		$data['menu_title'] = "question_and_answer";
		$view_name = '/question_and_answer/' . $title;
		$data['view_name'] = $view_name;
			
		$this -> load -> view('header', $data);
		$this -> load -> view('sidebar', $data);
		/*
		 * 만약 $title이 존재한다면
		 * $title에 맞는 함수를 호출하여 준다.
		 */
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}
		$this -> load -> view('footer');
	}
	
	private function questioning_and_answering($view_name,$data){
		/*
		 view에서 req_id 값을 받아와서 검사를 한다.
		 */
		if($data['req_id']!=NULL){
			/*
			 * 만약 $data['name']가 update_board일때,
			 * board_type과 board_id 값을 가지고 model로 가서
			 * board_type과 board_id 값에 맞는 database를 갖고 controller로 다시와서 view에 뿌려준다.
			 * 
			 * 만약 $data['name']가 update_ok일때,
			 * name값이 update_board라면 
			 * board_type과 board_id 값을 가지고 model로 가서
			 * board_type과 board_id 값에 맞는 database를 찾고 폼에 입력한 것과 데이터베이스에 있는 것을 업데이트 하고 countroller로 돌아와 alert창과 함께 게시판페이지로 리턴한다.
			 */
			if($data['name']=="update_board"){
				$board_id_type_array = array('board_type'=> $this -> uri ->segment(4),'board_id' => $data['req_id']);
				$data['get_sub_list'] = $this -> tutor_tutee -> select_list();
				$data['list']= $this -> q_a_board -> select_id_list($board_id_type_array);
				
				$this -> load -> view('question_and_answer/update_board',$data);
			
				
			}else if($data['name']=="update_ok"){
				$board_id_type_array = array('board_type'=> $this -> uri ->segment(4),
											 'board_id' => $data['req_id'],
										     'subject' => $this -> input -> post('subject'),
											 'contents' => $this -> input -> post('contents'));
				$data['list']= $this -> q_a_board -> update_board($board_id_type_array);
				alert_q_w_url('글이 업데이트 되었습니다.', '/index.php', $data['view_name'],$this -> uri ->segment(4),$data['req_id']);
			/*
			 * 만약 $data['name']가 delete_board일때,
			 * board_type과 board_id 값을 가지고 model로 가서
			 * board_type과 board_id 값에 맞는 database를 찾아서 삭제하고 countroller로 돌아와 alert창과 함께 게시판페이지로 리턴한다.
			 */	
			}else if($data['name']=="reply_insert"){
				$board_id_type_array = array('board_id' => $this -> input -> post('board_id'),
											 'user_id' => $this -> input -> post('user_id'),
											 'user_name' => $this -> input -> post('user_name'),
											 'reply_contents' => $this -> input -> post('reply_contents'));
				$data['list']= $this -> reply_ci_board -> reply_board($board_id_type_array);
				alert_q_w_url('댓글이 등록되었습니다.', '/index.php', $data['view_name'],$this -> uri ->segment(4),$data['req_id']);
			
			
			}else if($data['name']=="reply_update"){
				$reply_id_type_array = array('reply_id' => $this -> input -> post('reply_id'),
											 'reply_contents' => $this -> input -> post('reply_contents'));
				$this -> reply_ci_board -> update_reply_board($reply_id_type_array);
				alert_q_w_url('댓글이 업데이트 되었습니다.', '/index.php', $data['view_name'],$this -> uri ->segment(4),$data['req_id']);
			
			
			}else if($data['name']=="reply_delete"){
				$board_reply_id_array = array('reply_id' => $this -> input -> post('reply_id'));
				$this -> reply_ci_board -> delete_reply_board($board_reply_id_array);
				alert_q_w_url('댓글이 삭제되었습니다.', '/index.php', $data['view_name'],$this -> uri ->segment(4),$data['req_id']);
			
			
			}else if($data['name']=="delete_board"){
				$board_id_type_array = array('board_type'=> $this -> uri ->segment(4),'board_id' => $data['req_id']);
				$this -> q_a_board -> delete_board($board_id_type_array);
				alert_p_url('글이 삭제되었습니다.', '/index.php', $data['view_name'],$this -> uri ->segment(4));
			/*
			 * Board Type과 board_id에 맞는 게시물을 보여주며 hit를 1을 올려준다.
		 	 */	
			}else{
			$board_id_type_array = array('board_type' => $this -> uri ->segment(3),'board_id' => $data['req_id']);
			$reply_board_array = array('board_id' => $data['req_id']);
			$data['get_sub_list'] = $this -> tutor_tutee -> select_list();
			
			$data['get_list']=$this -> reply_ci_board -> get_list($reply_board_array);
			$data['get_all_board_count']= $this -> reply_ci_board -> get_all_board_count($reply_board_array);;
			
			$data['list']=$this -> q_a_board -> update_hit($board_id_type_array);
			
			
			$this -> load -> view('question_and_answer/view_board',$data);
			
			}
			/*
			 * 만약 $data['name']가 write_board일때,
			 * 게시판 글쓰기 페이지로  이동한다.
			 * 
			 * 만약 $data['name']가 write_ok일때,
			 * board_type, subject, contents, user_id, user_name 값을 가지고 model로 가서 글을 insert를 해준다.
  		 	 */
		}else if($data['name']=="write_board"){
			$data['get_list'] = $this -> tutor_tutee -> select_list();
			
			$this -> load -> view('question_and_answer/write_board',$data);
			
		}else if($data['name']=="write_ok"){
			$board_sign_up_array = array('board_type'=> $this -> input -> post('board_type'),
									     'subject' => $this -> input -> post('subject'),
										 'contents' => $this -> input -> post('contents'),
										 'user_id' => $this -> input -> post('user_id'),
										 'user_name' => $this -> input -> post('user_name'));
			$this -> q_a_board -> insert_board($board_sign_up_array);
			alert_p_url('글이 등록되었습니다.', '/index.php', $data['view_name'],$this -> input -> post('board_type'));
		
			/*
			 * 게시판 번호, 제목, 작성자, 작성일, 조회수를 list형식으로 뿌려준다.
			 */ 
		}else{

			$board_type_array = array('board_type'=> $this -> uri -> segment(3));
			//페이징 처리
			$config['base_url']= '/index.php/question_and_answer/questioning_and_answering/'.+$this -> uri -> segment(3);
			$config['total_rows'] = $this -> q_a_board -> get_board_all($board_type_array,$this -> uri -> segment(4), 'count');
			$config['per_page'] = 5;
			$config['num_links'] = 5;
			$config['uri_segment'] = 4;

			//페이징 처리 수정 8_08 Jay
			$config['prev_tag_open'] = '<div class="prev_tag_div">';
			$config['prev_tag_close'] = '</div>';
			$config['next_tag_open'] = '<div class="next_tag_div">';
			$config['next_tag_close'] = '</div>';
			$config['num_tag_open'] = '<div class="num_tag_open">';
			$config['num_tag_close'] = '</div>';
			$config['prev_link'] = '&nbsp&nbsp&nbsp&nbsp';
			$config['next_link'] = '&nbsp&nbsp&nbsp&nbsp';
			$config['cur_tag_open'] = '<div class="cur_tag_div">';
			$config['cur_tag_close'] = '</div>';
			////////////////////////////////////////////////
			
			$this -> pagination -> initialize($config); 
			
			$page = $this -> uri -> segment(4,1);
			if( $page > 1){
				$start = (($page/$config['per_page'])) * $config['per_page'];
			}else{
				$start = ($page-1) * $config['per_page'];
			}
			$limit = $config['per_page'];
			$data['page'] = $page;
			$data['list'] = $this -> q_a_board -> get_board_all($board_type_array,$this -> uri -> segment(4),'',$start,$limit);
			$data['get_list_count'] = $config['total_rows'];
			$data['get_subject'] = $this -> q_a_board -> get_subject_all_data();
			$this -> load -> view($view_name, $data);
			}
	}
}