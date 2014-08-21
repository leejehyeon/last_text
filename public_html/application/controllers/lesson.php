<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Lesson extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('member');
		$this -> load -> model('ci_board');
		$this -> load -> model('attendance');
		$this -> load -> model('tutor_tutee');
		$this -> load -> model('enrichment_board');
		$this -> load -> model('attendance');
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
		$this -> load -> library('pagination');
	}

	public function _remap($title, $name) {

		$req_id = $this -> input -> get('req_id');
		$title_name = implode(",", $name);
		$login_data = $this -> session -> userdata('login_data');

		if ($login_data != NULL) {
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
			if ($title == "get_user_by_divide") {
				$this -> {"{$title}"}($view_name, $data);
			} else if ($title == "daily_journal_admin_tutorlist") {
				$this -> {"{$title}"}($view_name, $data);
			} else if ($title == "attendance_subject_list") {
				$this -> {"{$title}"}($view_name, $data);
			} else {
				$this -> load -> view('header', $data);
				$this -> load -> view('sidebar', $data);
				$this -> {"{$title}"}($view_name, $data);
				$this -> load -> view('footer');
			}
		}

	}

	// 튜티 -> 수업 -> 내 출결보기
	private function my_attendance($view_name, $data, $year = null, $month = null) {
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$conf['template'] = '
		{table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar">{/table_open}
		
   		{week_row_start}<tr>{/week_row_start}
   		{week_day_cell}<th>{week_day}</th>{/week_day_cell}
   		{week_row_end}</tr>{/week_row_end}

   		{cal_row_start}<tr class="days">{/cal_row_start}
   		{cal_cell_start}<td>{/cal_cell_start}

   		{cal_cell_content}<div class="day_num">{day}</div>
   		<div class="content">{content}</div>{/cal_cell_content}
   		{cal_cell_content_today}<div class="day_num">{day}</div>
   		<div class="content">{content}</div>{/cal_cell_content_today}

   		{cal_cell_no_content}{day}{/cal_cell_no_content}
   		{cal_cell_no_content_today}<div class="highlight">{day}</div>
   		{/cal_cell_no_content_today}
	
   		{cal_cell_blank}&nbsp;{/cal_cell_blank}

   		{cal_cell_end}</td>{/cal_cell_end}
   		{cal_row_end}</tr>{/cal_row_end}

   		{table_close}</table>{/table_close}
   		';

		$this -> load -> library('calendar', $conf);

		$calendar_data = $this -> get_calendar($year, $month,$data['login_data']['user_id']);
		$data['calendar'] = $this -> calendar -> generate($year, $month, $calendar_data);
		$this -> load -> view($view_name, $data);
	}

	// 수업 -> 내 출결보기 달력기능
	private function get_calendar($year, $month,$user_id) {
		$calendar_data = array();

		$this -> load -> model('attendance');
		$calen_data = $this -> attendance -> get_attendance($year, $month,$user_id);
		foreach ($calen_data as $cal_data) {
			$day = number_format(substr(($cal_data -> date), 8, 2));
			$calendar_data[$day] = $cal_data -> attendance;
		}
		return $calendar_data;
	}

	// 튜터 -> 수업 -> 출석부
	private function get_user_by_divide($view_name, $data) {
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$day = $this -> uri -> segment(5);
		$bydate = $_GET['bydate'];
		$grade = 3;

		$subject_array = array('subject_id' => $_GET['subject_id'],
							   'user_divide' => $_GET['user_divide'],
							   'user_time' => $_GET['user_time'],
							   'grade' => $grade);
		$this -> load -> model('member');
		$data['divide'] = $this -> member -> select_subject($subject_array);
		$data['date'] = $this -> attendance -> get_data_by_date($bydate);
		
		$this -> load -> view($view_name, $data);
	}

	/* 튜터 -> 수업 -> 출석부에서 출석,결근,병결,지각 클릭시 발생
	 *
	 */
	private function insert_attendance() {
		$user_id = explode(",",$this -> input -> post('user_id'));
		var_dump($this -> input -> post('time'));
		for($i=0;$i<=($this ->input -> post('check_length')-1);$i++){
			$subject_array = array('user_id' => $user_id[$i],
							       'attendance' => $this -> input -> post('attendance'),
							       'date' => $this -> input -> post('time'));
			$this -> attendance -> insert_data($subject_array);    
		}
		$alert_url = "/index.php/lesson/attendance_record/" + $this -> input -> post('date_url');
		alert('저장되었습니다.', $alert_url );
	}

	private function daily_journal_admin($view_name, $data) {
		//if ($data['name'] == "daily_journal_tutor") {
		if ($this -> uri -> segment(5) == "daily_journal_tutor") {
			$get_id_array = array('user_id' => $this -> input -> post('user_id'));
			$data['user_data_by_id'] = $this -> member -> user_id_get($get_id_array);
			$date = $this -> uri -> segment(3) . '-' . $this -> uri -> segment(4);
			$data_data_array = array('user_id' => $data['user_data_by_id']['user_id'], 'date' => $date);
			$all_data = $this -> attendance -> get_all_data($data_data_array);
			$data_get_subject = array('subject_id' => $data['user_data_by_id']['subject_id']);
			$data['get_subject'] = $this -> attendance -> get_subject($data_get_subject);
			$data['get_list'] = $all_data;
			$this -> load -> view("lesson/daily_journal_tutor", $data);
		} else if($data['name'] == "daily_journal_update"){
			
			/*$get_number_array = array('user_number' => $this -> input -> post('user_number'));
			var_dump($get_number_array);
			$data['user_data_by_number'] = $this -> member -> user_number_get($get_number_array);
			var_dump($data['user_data_by_number']);*/
			
			$data_update_by_date = array('user_id' => $this -> input -> post('user_id'), 'date' => $this -> input -> post('date'));
			$data['update_data'] = $this -> attendance -> get_data_id_date($data_update_by_date);
			$this -> load -> view("lesson/daily_journal_update", $data);
		} else if($data['name'] == "daily_journal_tutor"){
			$get_id_array = array('user_id' => $this -> input -> post('user_id'));
			$data['user_data_by_id'] = $this -> member -> user_id_get($get_id_array);
	
			$date = $this -> uri -> segment(4) . '-' . $this -> uri -> segment(5);
			$data_data_array = array('user_id' => $data['user_data_by_id']['user_id'], 'date' => $date);
			$all_data = $this -> attendance -> get_all_data($data_data_array);
	
			$data_get_subject = array('subject_id' => $data['user_data_by_id']['subject_id']);
			$data['get_subject'] = $this -> attendance -> get_subject($data_get_subject);
			$data['get_list'] = $all_data;
			$this -> load -> view("lesson/daily_journal_tutor", $data);
		}else {
			$data['list_count'] = $this -> attendance -> get_all_data_count();
			$data['subject_list'] = $this -> attendance -> get_subject_all_data();
			$this -> load -> view($view_name, $data);
		}
	}

	private function daily_journal_admin_tutorlist($view_name, $data) {
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$day = $this -> uri -> segment(5);
		$subject = $_POST['subject'];

		$tutor_subject_array = array('subject_id' => $_POST['subject']);
		$this -> load -> model('member');
		$data['tutor_data'] = $this -> member -> subject_by_tutor_data($tutor_subject_array);
		$this -> load -> view($view_name, $data);
	}

	private function daily_journal_tutor($view_name, $data) {
		$get_id_array = array('user_id' => $this -> input -> post('user_id'));
		$data['user_data_by_id'] = $this -> member -> user_id_get($get_id_array);

		$date = $this -> uri -> segment(3) . '-' . $this -> uri -> segment(4);
		$data_data_array = array('user_id' => $data['user_data_by_id']['user_id'], 'date' => $date);
		$all_data = $this -> attendance -> get_all_data($data_data_array);

		$data_get_subject = array('subject_id' => $data['user_data_by_id']['subject_id']);
		$data['get_subject'] = $this -> attendance -> get_subject($data_get_subject);
		$data['get_list'] = $all_data;
		$this -> load -> view($view_name, $data);
	}

	private function daily_journal_update($view_name, $data) {
		/*$get_number_array = array('user_number' => $this -> input -> post('user_number'));
		var_dump($get_number_array);
		$data['user_data_by_number'] = $this -> member -> user_number_get($get_number_array);
		var_dump($data['user_data_by_number']);*/
		$data_update_by_date = array('user_id' => $this -> input -> post('user_id'), 'date' => $this -> input -> post('date'));
		$data['update_data'] = $this -> attendance -> get_data_id_date($data_update_by_date);
		$this -> load -> view($view_name, $data);
	}

	/*private function daily_journal_update_ok($view_name, $data) {
		$user_id_array = array('board_id' => $this -> input -> post('board_id'));
		$update_daily_array = array('classroom' => $this -> input -> post('classroom'), 'subject' => $this -> input -> post('subject'), 'tutor_time' => $this -> input -> post('tutor_time'), 'date' => $this -> input -> post('date'), 'member_number' => $this -> input -> post('member_number'), 'activity' => $this -> input -> post('activity'), 'note' => $this -> input -> post('note'));
		$this -> attendance -> update_daily($update_daily_array, $user_id_array);
		alert_date('업데이트 되었습니다.', '/index.php/lesson/daily_journal_admin', date('Y'), date('m'));
	}*/
		private function daily_journal_update_ok($view_name, $data) {
		/*$date_array=array('classroom' => $this -> input -> post('classroom'), 'subject' => $this -> input -> post('subject'), 'tutor_time' => $this -> input -> post('tutor_time'), 'date' => $this -> input -> post('date'), 'member_number' => $this -> input -> post('member_number'), 'activity' => $this -> input -> post('activity'), 'note' => $this -> input -> post('note'));
		$this -> load -> model('attendance');
		$date_check = $this -> attendance -> this_date($date_array);
		var_dump($date_array['user_number']);
		*/
		
		$this -> user_date_check($this -> input -> post('user_real_date'), $this -> input -> post('date'));
		$this -> today_check($this -> input -> post('date'));
		$this -> member_check();
		$user_id_array = array('board_id' => $this -> input -> post('board_id'));
		$update_daily_array = array('classroom' => $this -> input -> post('classroom'), 'tutor_time' => $this -> input -> post('tutor_time'), 'date' => $this -> input -> post('date'), 'member_number' => $this -> input -> post('member_number'), 'activity' => $this -> input -> post('activity'), 'note' => $this -> input -> post('note'));
		$this -> attendance -> update_daily($update_daily_array, $user_id_array);
		alert_date('업데이트 되었습니다.', '/index.php/lesson/daily_journal_admin', date('Y'), date('m'));
	}
	

	private function daily_journal($view_name, $data) {
		if ($data['name'] == "daily_journal_write") {
			$data_update_by_date = array('user_id' => $data['login_data']['user_id']);
			$data['update_data'] = $this -> attendance -> get_data_date($data_update_by_date);
			
			foreach($data['update_data'] as $lt){
				$date_array=array('date' => $lt->date);
				/*var_dump($date_array);*/
				if($date_array['date']==$this->input->post('date')){
					alert('이미 작성된 근무 날짜 입니다.');
				}
			}
			
			$this -> load -> view('lesson/daily_journal_write', $data);
		}else if ($data['name'] == "daily_journal_update") {
			$this -> load -> model('ci_board');/*
			$load_data = $this -> ci_board -> load_journal_descript();*/
			$data_update_by_date = array('user_id' => $this -> input -> post('user_id'), 'date' => $this -> input -> post('date'));
			$data['update_data'] = $this -> attendance -> get_data_id_date($data_update_by_date);
			$this -> load -> view('lesson/daily_journal_update', $data);
		} else {
			$date = $this -> uri -> segment(3) . '-' . $this -> uri -> segment(4);
			$data_data_array = array('user_id' => $data['login_data']['user_id'], 'date' => $date);
			$all_data = $this -> attendance -> get_all_data($data_data_array);
			$data_get_subject = array('subject_id' => $data['login_data']['subject_id']);
			
			$data['get_subject'] = $this -> attendance -> get_subject_all_data();
			$data['get_list'] = $all_data;
			$this -> load -> view($view_name, $data);
		}
	}

	private function daily_journal_write($view_name, $data) {
		$data_update_by_date = array('user_id' => $this -> input -> post('user_id'), 'date' => $this -> input -> post('date'));
		$data['update_data'] = $this -> attendance -> get_data_id_date($data_update_by_date);
		$this -> load -> view('lesson/daily_journal_write', $data);
	}

	/*private function daily_journal_write_ok($view_name, $data) {
		$insert_daily_array = array('user_id' => $this -> input -> post('user_id'), 'user_name' => $this -> input -> post('user_name'), 'user_number' => $this -> input -> post('user_number'), 'user_subject' => $this -> input -> post('user_subject'), 'classroom' => $this -> input -> post('classroom'), 'subject' => $this -> input -> post('subject'), 'tutor_time' => $this -> input -> post('tutor_time'), 'date' => $this -> input -> post('date'), 'member_number' => $this -> input -> post('member_number'), 'activity' => $this -> input -> post('activity'), 'note' => $this -> input -> post('note'));
		$this -> attendance -> insert_daily($insert_daily_array);
		alert_date('글이 등록되었습니다.', '/index.php/lesson/daily_journal', date('Y'), date('m'));
	}*/
	private function daily_journal_write_ok($view_name, $data) {/*
		$date_array=array('date' => $data['date']);
		$this -> load -> model('attendance');
		$date_check = $this -> attendance -> this_date($date_array);*/
		$data_update_by_date = array('user_id' => $data['login_data']['user_id']);
			$data['update_data'] = $this -> attendance -> get_data_date($data_update_by_date);
			
			foreach($data['update_data'] as $lt){
				$date_array=array('date' => $lt->date);
				/*var_dump($date_array);*/
				if($date_array['date']==$this->input->post('date')){
					alert('이미 작성된 근무 날짜 입니다.');
				}
			}
		$this -> member_check();
		//$pattern = '/([0-9])+/';
		//preg_match($pattern, $this -> input -> post('member_number'), $member_number_check);
		//if(($member_number_check == null) || (strlen($member_number_check[0]) != strlen($this -> input -> post('member_number')))){
		//	alert('참여인원은 숫자만 입력 가능합니다.');
		//}
		//else{
		$insert_daily_array = array('user_id' => $this -> input -> post('user_id'), 'user_name' => $this -> input -> post('user_name'), 'user_number' => $this -> input -> post('user_number'), 'subject_id' => $this -> input -> post('subject_id'), 'classroom' => $this -> input -> post('classroom'), 'tutor_time' => $this -> input -> post('tutor_time'), 'date' => $this -> input -> post('date'), 'member_number' => $this -> input -> post('member_number'), 'activity' => $this -> input -> post('activity'), 'note' => $this -> input -> post('note'));
		$this -> attendance -> insert_daily($insert_daily_array);
		alert_date('글이 등록되었습니다.', '/index.php/lesson/daily_journal', date('Y'), date('m'));
		//}
	}

	private function attendance_record_admin($view_name, $data) {
		$this -> load -> model('tutor_tutee');
		$get_list = $this -> tutor_tutee -> select_list();
		$get_sub_list = $this -> tutor_tutee -> select_list_sub();
		$get_sub_time = $this -> tutor_tutee -> select_time();
		
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;
		
		$this -> load -> view($view_name, $data);
	}

	private function attendance_subject_list($view_name, $data){
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$day = $this -> uri -> segment(5);
		$subject_id = $_GET['subject_id'];

		$subject_array = array('subject_id' => $_GET['subject_id'],
							  );
		$this -> load -> model('member');
		
		$data['sub_list'] = $this -> member -> select_list_by_sub($subject_array);
		$data['get_sub_time'] = $this -> tutor_tutee -> select_time();
		$data['get_list'] = $this -> tutor_tutee -> select_list();
		
		
		$this -> load -> view($view_name, $data);
	}
	private function attendance_record($view_name, $data) {
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$day = $this -> uri -> segment(5);
		
		$this -> load -> model('tutor_tutee');
		$get_list = $this -> tutor_tutee -> select_list();
		$get_sub_list = $this -> tutor_tutee -> select_list_sub();
		$get_sub_time = $this -> tutor_tutee -> select_time();
		
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;
		$data['get_sub_time'] = $get_sub_time;
		$this -> load -> view($view_name, $data);
	}

	private function select_divide() {
		$divide_array = array('user_divide' => $this -> input -> post('user_divide'));
		$this -> load -> model('tutee_application');
		$this -> member -> select_list($divide_array);
	}

	private function attendance_record_admin_status($view_name, $data) {
		$get_list = $this -> tutor_tutee -> select_list();
		$get_sub_list = $this -> tutor_tutee -> select_list_sub();
		$divide = $this -> uri -> segment(4);
		$name = "분반";
		$divide_name = $divide . "" . $name;
		
		$member_data = array('subject_id' => $this -> uri -> segment(3),
							 'user_divide' => $divide_name,
							 'grade' => 3);
							 
		$data['member_data']=$this -> member -> get_user_data($member_data);
		$data['get_date_list'] = $this -> attendance -> get_date_data();
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;
		$this -> load -> view($view_name, $data);
	}

	private function enrichment_study($view_name, $data) {
		if ($data['req_id'] != NULL) {	
			if ($data['name'] == "update_board") {
				$board_id_array = array('board_id' => $data['req_id']);
				$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
				$data['list'] = $this -> enrichment_board -> select_id_list($board_id_array);
				$this -> load -> view('lesson/update_board', $data);

			} else if ($data['name'] == "update_ok") {
				$board_update_array = array('board_id' => $data['req_id'], 'subject_title' => $this -> input -> post('subject_title'), 'reason' => $this -> input -> post('reason'), 'subject' => $this -> input -> post('subject'), 'date' => $this -> input -> post('date'), 'time' => $this -> input -> post('time'));
				$data['list'] = $this -> enrichment_board -> update_board($board_update_array);
				alert_url('글이 업데이트 되었습니다.', '/index.php', $data['view_name']);

			} else if ($data['name'] == "delete_board") {
				$board_id_array = array('board_id' => $data['req_id']);
				$this -> enrichment_board -> delete_board($board_id_array);
				alert_url('글이 삭제되었습니다.', '/index.php', $data['view_name']);

			} else {
				$board_id_array = array('board_id' => $data['req_id']);
				$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
				$data['list'] = $this -> enrichment_board -> update_hit($board_id_array);
				$this -> load -> view('lesson/view_board', $data);
			}

		} else if ($data['name'] == "write_board") {
			$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
			$this -> load -> view('lesson/write_board', $data);

		} else if ($data['name'] == "write_ok") {
			$board_array = array('user_id' => $this -> input -> post('user_id'), 'user_name' => $this -> input -> post('user_name'), 'subject_title' => $this -> input -> post('subject_title'), 'reason' => $this -> input -> post('reason'), 'subject' => $this -> input -> post('subject'), 'date' => $this -> input -> post('date'), 'time' => $this -> input -> post('time'), 'classroom' => $this -> input -> post('classroom'));
			$this -> enrichment_board -> insert_board($board_array);
			alert_url('글이 등록되었습니다.', '/index.php', $data['view_name']);

		} else if($data['name']=="update_board"){
				$board_id_array = array('board_id' => $data['req_id']);
				$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
				$data['list'] = $this -> enrichment_board -> select_id_list($board_id_array);
				$this -> load -> view('lesson/update_board', $data);
			}else {
			//페이징 처리
			$config['base_url'] = '/index.php/lesson/enrichment_study/';
			$config['total_rows'] = $this -> enrichment_board -> get_board_all($this -> uri -> segment(3), 'count');
			$config['per_page'] = 5;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;

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

			$page = $this -> uri -> segment(3, 1);
			if ($page > 1) {
				$start = (($page / $config['per_page'])) * $config['per_page'];
			} else {
				$start = ($page - 1) * $config['per_page'];
			}
			$limit = $config['per_page'];

			$data['page'] = $page;
			$data['list'] = $this -> enrichment_board -> get_board_all($this -> uri -> segment(3), '', $start, $limit);
			$data['get_list_count'] = $config['total_rows'];
			$this -> load -> view($view_name, $data);

		}
	}

	private function enrichment_study_admin($view_name, $data) {
		if ($data['req_id'] != NULL) {
			if ($data['name'] == "update_board") {
				$board_id_array = array('board_id' => $data['req_id']);
				$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
				$data['list'] = $this -> enrichment_board -> select_id_list($board_id_array);
				$this -> load -> view('lesson/update_board', $data);

			} else if ($data['name'] == "update_admin_ok") {
				$board_update_array = array('board_id' => $data['req_id'],'admin_check' => $this -> input -> post('admin_check'), 'subject_title' => $this -> input -> post('subject_title'), 'reason' => $this -> input -> post('reason'), 'subject' => $this -> input -> post('subject'), 'date' => $this -> input -> post('date'), 'time' => $this -> input -> post('time'), 'classroom' => $this -> input -> post('classroom'));
				$data['list'] = $this -> enrichment_board -> update_board($board_update_array);
				alert_url('글이 업데이트 되었습니다.', '/index.php', $data['view_name']);

			} else if ($data['name'] == "delete_board") {
				$board_id_array = array('board_id' => $data['req_id']);
				$this -> enrichment_board -> delete_board($board_id_array);
				alert_url('글이 삭제되었습니다.', '/index.php', $data['view_name']);

			} else {
				$board_id_array = array('board_id' => $data['req_id']);
				$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
				$data['list'] = $this -> enrichment_board -> update_hit($board_id_array);
				$this -> load -> view('lesson/view_board', $data);
			}

		} else if ($data['name'] == "write_board") {
			$data['get_list'] = $this -> tutor_tutee -> get_subject_list();
			$this -> load -> view('lesson/write_board', $data);

		} else if ($data['name'] == "write_ok") {
			$board_array = array('user_id' => $this -> input -> post('user_id'), 'user_name' => $this -> input -> post('user_name'), 'subject_title' => $this -> input -> post('subject_title'), 'reason' => $this -> input -> post('reason'), 'subject' => $this -> input -> post('subject'), 'date' => $this -> input -> post('date'), 'time' => $this -> input -> post('time'), 'classroom' => $this -> input -> post('classroom'));
			$this -> enrichment_board -> insert_board($board_array);
			alert_url('글이 등록되었습니다.', '/index.php', $data['view_name']);

		} else {
			//페이징 처리
			$config['base_url'] = '/index.php/lesson/enrichment_study_admin/';
			$config['total_rows'] = $this -> enrichment_board -> get_board_all($this -> uri -> segment(3), 'count');
			$config['per_page'] = 10;
			$config['num_links'] = 5;
			$config['uri_segment'] = 3;

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

			$page = $this -> uri -> segment(3, 1);
			if ($page > 1) {
				$start = (($page / $config['per_page'])) * $config['per_page'];
			} else {
				$start = ($page - 1) * $config['per_page'];
			}
			$limit = $config['per_page'];
			
			$data['page'] = $page;
			$data['list'] = $this -> enrichment_board -> get_board_all($this -> uri -> segment(3), '', $start, $limit);
			$data['get_list_count'] = $config['total_rows'];
			$this -> load -> view($view_name, $data);

		}
	}

	private function tutor_report($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}
	private function user_date_check($check_date,$date){
		$date_array = array('date' => $date);
		$this -> load -> model('attendance');
		$data = $this -> attendance -> date_check($date_array);
		var_dump($data);
		/*var_dump($check_date);
		var_dump($data['date']);
		var_dump($this->input->post('user_id'));
		var_dump($data['user_id']);*/
		//$user_id = $this -> attendance -> id_check($date_array);
		if ($data != null) {
			/*alert($check_date.". ".$data['date'].". ".$user_number.". ".$data['user_number']);*/
			
			if (($check_date == $data['date'])/* && ($this -> input -> post('user_id') != $data['user_id'])*/) {
				return TRUE;
			}else if(/*($check_date != $data['date']) &&*/ ($this->input->post('user_id') != $data['user_id'])){
				return TRUE;
			}/* else if(($check_date != $data['date']) && ($this -> input -> post('user_id') == $data['user_id'])){
				return TRUE;
			} else if(($check_date != $data['date']) && ($this -> input -> post('user_id') != $data['user_id'])){
				return TRUE;
			}*/ else {
				alert('이미 작성된 근무 날짜 입니다.');
				return FALSE;
			}
		} else {
			return TRUE;
		}
	}

	private function user_date_check2($date){
		
		$date_array = array('date' => $date);
		$this -> load -> model('attendance');
		$data = $this -> attendance -> date_check($date_array);
		
		$this -> input -> post('date');
		$data_update_by_date = array('user_id' => $data['login_data']['user_id']);
		$data['update_data'] = $this -> attendance -> get_data_date($data_update_by_date);
		var_dump($data['update_data']);
		
	}
	private function member_check(){
		$pattern = '/([0-9])+/';
		preg_match($pattern, $this -> input -> post('member_number'), $member_number_check);
		if(($member_number_check == null) || (strlen($member_number_check[0]) != strlen($this -> input -> post('member_number')))){
			alert('참여인원은 숫자만 입력 가능합니다.');
		}
	}
	
	private function today_check($check_date){
		
		$explode_check_date = explode("-",$check_date);
		$explode_today = explode("-",date("Y-m-d"));
		
		if(($explode_check_date[0]>$explode_today[0]) ||
		($explode_check_date[0]==$explode_today[0] && $explode_check_date[1]>$explode_today[1]) ||
		($explode_check_date[0]==$explode_today[0] && $explode_check_date[1]==$explode_today[1] && $explode_check_date[2]>$explode_today[2])){
			alert('날짜가 올바르지 않습니다.');
		}
	}

}