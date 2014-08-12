<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('member');
		$this -> load -> model('ci_board');
		$this -> load -> model('tutor_tutee');
		$this -> load -> model('enrichment_board');
		$this -> load -> model('attendance');
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
		$this -> load -> library('pagination');	
	}

	public function _remap($title, $name){
		
		$req_id = $this -> input -> get('req_id');
		$title_name = implode(",", $name);
		$login_data = $this -> session -> userdata('login_data');

		if($login_data != NULL){
			 $data['login_data'] = $login_data;
		}

			$data['req_id'] = $req_id;

		$data['name'] = $title_name;
		$data['category_title'] = $title;
		$data['menu_title'] = "lesson";
		$view_name = '/lesson/' . $title;
		$data['view_name'] = $view_name;
		
		/*
		 * 만약 $title이 존재한다면
		 * $title에 맞는 함수를 호출하여 준다.
		 */
		if (method_exists($this, $title)) {
			if($title == "get_user_by_divide"){
				$this -> {"{$title}"}($view_name, $data);
			}else if($title == "daily_journal_admin_tutorlist"){
				$this -> {"{$title}"}($view_name, $data);
			}else{
			$this -> load -> view('header', $data);
			$this -> load -> view('sidebar', $data);
			$this -> {"{$title}"}($view_name, $data);
			$this -> load -> view('footer');
			}
		}
		
	}
	// 튜티 -> 수업 -> 내 출결보기
	private function my_attendance($view_name, $data ,$year = null, $month = null) {
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$conf = array(
					'show_next_prev' => "true",
					'next_prev_url' => '/index.php/lesson/my_attendance'
				);	
		
		$conf['template'] = '
		{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}


		{heading_row_start}<tr>{/heading_row_start}

   		{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   		{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   		{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

   		{heading_row_end}</tr>{/heading_row_end}

   		{week_row_start}<tr>{/week_row_start}
   		{week_day_cell}<td>{week_day}</td>{/week_day_cell}
   		{week_row_end}</tr>{/week_row_end}

   		{cal_row_start}<tr class="days">{/cal_row_start}
   		{cal_cell_start}<td>{/cal_cell_start}

   		{cal_cell_content}
   		<div class="day_num">{day}</div>
   		<div class="content">{content}</div>
   		{/cal_cell_content}
   		{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

   		{cal_cell_no_content}{day}{/cal_cell_no_content}
   		{cal_cell_no_content_today}
   		<div class="highlight">{day}</div>
   		{/cal_cell_no_content_today}
	
   		{cal_cell_blank}&nbsp;{/cal_cell_blank}

   		{cal_cell_end}</td>{/cal_cell_end}
   		{cal_row_end}</tr>{/cal_row_end}

   		{table_close}</table>{/table_close}
   		';
		
		$this -> load -> library('calendar',$conf);
		
		
		
		$calendar_data = $this -> get_calendar($year, $month);
		$data['calendar'] = $this -> calendar -> generate($year,$month,$calendar_data); 
		$this -> load -> view($view_name, $data);
	}
	
	// 수업 -> 내 출결보기 달력기능
	private function get_calendar($year, $month){
		$calendar_data=array();
			
		$this -> load -> model('attendance');
		$calen_data = $this -> attendance -> get_attendance($year, $month);
			
		foreach ($calen_data as $cal_data){
			$day = (int)substr(($cal_data -> date),8,2);
			$calendar_data[(int)$day] = $cal_data -> data;
		} 
		
		return $calendar_data;
	}

	// 튜터 -> 수업 -> 출석부 
	private function get_user_by_divide($view_name,$data){
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$day = $this -> uri -> segment(5);
		$subject = $_POST['subject'];
		
		$divide_array = array('user_divide'=> $_POST['subject']);
		$this -> load -> model('member');
		$data['divide']=$this -> member -> select_divide($divide_array);
		$this -> load -> view($view_name, $data);
	}
	
	/* 튜터 -> 수업 -> 출석부에서 출석,결근,병결,지각 클릭시 발생
	 * 
	 */
	private function register(){
		$year = $this -> input -> post('year');
		$month = $this -> input -> post('month');
		$day = $this -> input -> post('day');
		$url = "/index.php/lesson/attendance_record"+$year+"/"+$month+"/"+$day;
		alert('저장되었습니다.', $url);
	}
	
	private function daily_journal_admin($view_name, $data) {
		$data['subject_list']=$this -> attendance -> get_subject_all_data();
		$this -> load -> view($view_name, $data);
	}
	
	private function daily_journal_admin_tutorlist($view_name, $data){
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$day = $this -> uri -> segment(5);
		$subject = $_POST['subject'];
		
		$tutor_subject_array = array('subject_id'=> $_POST['subject']);
		$this -> load -> model('member');
		$data['tutor_data'] = $this -> member -> subject_by_tutor_data($tutor_subject_array);
		$this -> load -> view($view_name, $data);
	}
	
	private function daily_journal_tutor($view_name, $data){
			$get_id_array = array('user_id' =>$this->input->post('user_id'));
			$data['user_data_by_id'] = $this -> member -> user_id_get($get_id_array);
			
			$date = $this -> uri -> segment(3).'-'.$this -> uri -> segment(4);
			$data_data_array = array('user_id' => $data['user_data_by_id']['user_id'],
									 'date' => $date);
			$all_data = $this -> attendance -> get_all_data($data_data_array);
			
			
			$data_get_subject = array('subject_id' => $data['user_data_by_id']['subject_id']);
			$data['get_subject'] = $this -> attendance -> get_subject($data_get_subject);
			$data['get_list'] = $all_data;
			$this -> load -> view($view_name, $data);
	}
	
	private function daily_journal_update($view_name, $data) {
			$data_update_by_date = array('user_id'=> $this -> input -> post('user_id'),
									 	 'date'=> $this -> input -> post('date'));
			$data['update_data'] = $this -> attendance -> get_data_id_date($data_update_by_date);
			$this -> load -> view($view_name, $data);
	}
	
	private function daily_journal_update_ok($view_name, $data){
			$user_id_array = array('board_id' => $this -> input -> post('board_id'));
			$update_daily_array = array( 'classroom'=> $this -> input -> post('classroom'),
										 'subject'=> $this -> input -> post('subject'),
									 	 'tutor_time'=> $this -> input -> post('tutor_time'),
										 'date'=> $this -> input -> post('date'),
									     'member_number' => $this -> input -> post('member_number'),
										 'activity' => $this -> input -> post('activity'),
										 'note' => $this -> input -> post('note')
										 );
			$this -> attendance -> update_daily($update_daily_array,$user_id_array);
			alert_date('업데이트 되었습니다.', '/index.php/lesson/daily_journal_admin',date('Y'),date('m'));
	}
	
	private function daily_journal($view_name, $data){
			$date = $this -> uri -> segment(3).'-'.$this -> uri -> segment(4);
			$data_data_array = array('user_id'=> $data['login_data']['user_id'],
									 'date' => $date);
			$all_data = $this -> attendance -> get_all_data($data_data_array);
			$data_get_subject = array('subject_id' => $data['login_data']['subject_id']);
			
			$data['get_subject'] = $this -> attendance -> get_subject($data_get_subject);
			$data['get_list'] = $all_data;
			$this -> load -> view($view_name, $data);
	}
	
	private function daily_journal_write($view_name, $data){
		$this -> load -> view('lesson/daily_journal_write',$data);
	}
	
	private function daily_journal_write_ok($view_name, $data){
		$insert_daily_array = array('user_id'=> $this -> input -> post('user_id'),
									'user_name'=> $this -> input -> post('user_name'),
									'user_number'=> $this -> input -> post('user_number'),
									'user_subject'=> $this -> input -> post('user_subject'),
									'classroom'=> $this -> input -> post('classroom'),
									'subject'=> $this -> input -> post('subject'),
									'tutor_time'=> $this -> input -> post('tutor_time'),
									'date'=> $this -> input -> post('date'),
									'member_number' => $this -> input -> post('member_number'),
									'activity' => $this -> input -> post('activity'),
									'note' => $this -> input -> post('note')
									);
			$this -> attendance -> insert_daily($insert_daily_array);
			alert_date('글이 등록되었습니다.', '/index.php/lesson/daily_journal',date('Y'),date('m'));
	}
	private function attendance_record_admin($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}
	private function attendance_record($view_name, $data) {
		$this -> load -> model('tutor_tutee');
		$get_list = $this -> tutor_tutee -> select_list();
		$get_sub_list = $this -> tutor_tutee -> select_list_sub();
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;
		$this -> load -> view($view_name, $data);
	}
	private function select_divide(){
		$divide_array = array('user_divide' => $this -> input -> post('user_divide'));
		$this -> load -> model('tutee_application');
		$this -> member -> select_list($divide_array);
	}
	private function attendance_record_admin_status($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}

	private function enrichment_study($view_name, $data) {
		if($data['req_id']!=NULL){
			if($data['name']=="update_board"){
				$board_id_array = array('board_id' => $data['req_id']);
				$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
				$data['list']= $this -> enrichment_board -> select_id_list($board_id_array);
				$this -> load -> view('lesson/update_board',$data);
				
			}else if($data['name']=="update_ok"){
				$board_update_array = array('board_id' => $data['req_id'],
										'subject_title' => $this -> input -> post('subject_title'),
									 	'reason' => $this -> input -> post('reason'),
										'subject' => $this -> input -> post('subject'),
										'date' => $this -> input -> post('date'),
										'time' => $this -> input -> post('time'));
				$data['list']= $this -> enrichment_board -> update_board($board_update_array);
				alert_url('글이 업데이트 되었습니다.', '/index.php', $data['view_name']);
			
			}else if($data['name']=="delete_board"){
				$board_id_array = array('board_id' => $data['req_id']);
				$this -> enrichment_board -> delete_board($board_id_array);
				alert_url('글이 삭제되었습니다.', '/index.php', $data['view_name']);
				
			}else{
			$board_id_array = array('board_id' => $data['req_id']);
			$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
			$data['list']=$this -> enrichment_board -> update_hit($board_id_array);
			$this -> load -> view('lesson/view_board',$data);
			}
			
		}else if($data['name']=="write_board"){
			$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
			$this -> load -> view('lesson/write_board',$data);
			
		}else if($data['name']=="write_ok"){
			$board_array = array('user_id'=> $this -> input -> post('user_id'),
								 'user_name' => $this -> input -> post('user_name'),
								 'subject_title' => $this -> input -> post('subject_title'),
								 'reason' => $this -> input -> post('reason'),
								 'subject' => $this -> input -> post('subject'),
								 'date' => $this -> input -> post('date'),
								 'time' => $this -> input -> post('time'),
								 'classroom' => $this -> input -> post('classroom')
								);
			$this -> enrichment_board -> insert_board($board_array);
			alert_url('글이 등록되었습니다.', '/index.php', $data['view_name']);
		
		}else{
			//페이징 처리
			$config['base_url']= base_url()+'/index.php/lesson/enrichment_study/';
			$config['total_rows'] = $this -> enrichment_board -> get_board_all($this -> uri -> segment(3), 'count');
			$config['per_page'] = 5;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			
			$this -> pagination -> initialize($config); 
			
			$page = $this -> uri -> segment(3,0);
			if( $page > 1){
				$start = (($page/$config['per_page'])) * $config['per_page'];
			}else{
				$start = ($page-1) * $config['per_page'];
			}
			$limit = $config['per_page'];
			
			$data['page'] = $page;
			$data['list'] = $this -> enrichment_board -> get_board_all($this -> uri -> segment(3),'',$start,$limit);
			$data['get_list_count'] = $config['total_rows'];
			$this -> load -> view($view_name, $data);
			
		}
	}

	private function enrichment_study_admin($view_name, $data) {
		if($data['req_id']!=NULL){
			if($data['name']=="update_board"){
				$board_id_array = array('board_id' => $data['req_id']);
				$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
				$data['list']= $this -> enrichment_board -> select_id_list($board_id_array);
				$this -> load -> view('lesson/update_board',$data);
				
			}else if($data['name']=="update_admin_ok"){
				$board_update_array = array('board_id' => $data['req_id'],
										'subject_title' => $this -> input -> post('subject_title'),
									 	'reason' => $this -> input -> post('reason'),
										'subject' => $this -> input -> post('subject'),
										'date' => $this -> input -> post('date'),
										'time' => $this -> input -> post('time'),
										'classroom' => $this -> input -> post('classroom')
										);
				$data['list']= $this -> enrichment_board -> update_board($board_update_array);
				alert_url('글이 업데이트 되었습니다.', '/index.php', $data['view_name']);
				
			}else if($data['name']=="delete_board"){
				$board_id_array = array('board_id' => $data['req_id']);
				$this -> enrichment_board -> delete_board($board_id_array);
				alert_url('글이 삭제되었습니다.', '/index.php', $data['view_name']);
				
			}else{
			$board_id_array = array('board_id' => $data['req_id']);
			$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
			$data['list']=$this -> enrichment_board -> update_hit($board_id_array);
			$this -> load -> view('lesson/view_board',$data);
			}
			
		}else if($data['name']=="write_board"){
			$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
			$this -> load -> view('lesson/write_board',$data);
			
		}else if($data['name']=="write_ok"){
			$board_array = array('user_id'=> $this -> input -> post('user_id'),
								 'user_name' => $this -> input -> post('user_name'),
								 'subject_title' => $this -> input -> post('subject_title'),
								 'reason' => $this -> input -> post('reason'),
								 'subject' => $this -> input -> post('subject'),
								 'date' => $this -> input -> post('date'),
								 'time' => $this -> input -> post('time'),
								 'classroom' => $this -> input -> post('classroom')
								);
			$this -> enrichment_board -> insert_board($board_array);
			alert_url('글이 등록되었습니다.', '/index.php', $data['view_name']);
		
		}else{
			//페이징 처리
			$config['base_url']= base_url()+'/index.php'+$view_name;
			$config['total_rows'] = $this -> enrichment_board -> get_board_all($this -> uri -> segment(3), 'count');
			$config['per_page'] = 5;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;
			
			$this -> pagination -> initialize($config); 
			
			$page = $this -> uri -> segment(3,0);
			if( $page > 1){
				$start = (($page/$config['per_page'])) * $config['per_page'];
			}else{
				$start = ($page-1) * $config['per_page'];
			}
			$limit = $config['per_page'];
			
			$data['page'] = $page;
			$data['list'] = $this -> enrichment_board -> get_board_all($this -> uri -> segment(3),'',$start,$limit);
			$data['get_list_count'] = $config['total_rows'];
			$this -> load -> view($view_name, $data);
			
		}
	}
	
	private function tutor_report($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}
}
