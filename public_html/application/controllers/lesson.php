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
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
		$this -> load -> library('pagination');
		$this -> load -> library('form_validation');
	}

	public function _remap($title, $name) {

		$req_id = $this -> input -> get('req_id');
		$title_name = implode(",", $name);
		$login_data = $this -> session -> userdata('login_data');

		if (isset($login_data))
			$data['login_data'] = $login_data;

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
		$conf = array('show_next_prev' => "true", 'next_prev_url' => '/index.php/lesson/my_attendance');

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

		$this -> load -> library('calendar', $conf);

		$calendar_data = $this -> get_calendar($year, $month);
		$data['calendar'] = $this -> calendar -> generate($year, $month, $calendar_data);
		$this -> load -> view($view_name, $data);
	}

	// 수업 -> 내 출결보기 달력기능
	private function get_calendar($year, $month) {
		$calendar_data = array();

		$this -> load -> model('attendance');
		$calen_data = $this -> attendance -> get_attendance($year, $month);

		foreach ($calen_data as $cal_data) {
			$day = (int)substr(($cal_data -> date), 8, 2);
			$calendar_data[(int)$day] = $cal_data -> data;
		}

		return $calendar_data;
	}

	// 튜터 -> 수업 -> 출석부
	private function get_user_by_divide($view_name, $data) {
		$year = $this -> uri -> segment(3);
		$month = $this -> uri -> segment(4);
		$day = $this -> uri -> segment(5);
		$subject = $_POST['subject'];

		$divide_array = array('user_divide' => $_POST['subject']);
		$this -> load -> model('member');
		$data['divide'] = $this -> member -> select_divide($divide_array);
		$this -> load -> view($view_name, $data);
	}

	/* 튜터 -> 수업 -> 출석부에서 출석,결근,병결,지각 클릭시 발생
	 *
	 */
	private function register() {
		$year = $this -> input -> post('year');
		$month = $this -> input -> post('month');
		$day = $this -> input -> post('day');
		$url = "/index.php/lesson/attendance_record" + $year + "/" + $month + "/" + $day;
		alert('저장되었습니다.', $url);
	}

	private function daily_journal_admin($view_name, $data) {
		/*$data['subject_list'] = $this -> attendance -> get_subject_all_data();*/
		$this -> load -> view($view_name, $data);
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
		$data_update_by_date = array('user_id' => $this -> input -> post('user_id'), 'date' => $this -> input -> post('date'));
		$data['update_data'] = $this -> attendance -> get_data_id_date($data_update_by_date);
		$this -> load -> view($view_name, $data);
	}

	private function daily_journal_update_ok($view_name, $data) {
		$user_id_array = array('board_id' => $this -> input -> post('board_id'));
		$update_daily_array = array('classroom' => $this -> input -> post('classroom'), 'subject' => $this -> input -> post('subject'), 'tutor_time' => $this -> input -> post('tutor_time'), 'date' => $this -> input -> post('date'), 'member_number' => $this -> input -> post('member_number'), 'activity' => $this -> input -> post('activity'), 'note' => $this -> input -> post('note'));
		$this -> attendance -> update_daily($update_daily_array, $user_id_array);
		alert_date('업데이트 되었습니다.', '/index.php/lesson/daily_journal_admin', date('Y'), date('m'));
	}

	/*제현 8.1지움private function daily_journal($view_name, $data){
	 $date = $this -> uri -> segment(3).'-'.$this -> uri -> segment(4);
	 $data_data_array = array('user_id'=> $data['login_data']['user_id'],
	 'date' => $date);
	 $all_data = $this -> attendance -> get_all_data($data_data_array);
	 $data_get_subject = array('subject_id' => $data['login_data']['subject_id']);

	 $data['get_subject'] = $this -> attendance -> get_subject($data_get_subject);
	 $data['get_list'] = $all_data;
	 $this -> load -> view($view_name, $data);
	 if($data['name'] =='write'){

	 }
	 }*/
	private function daily_journal($view_name, $data) {
		if ($data['name'] == 'write') {
			$this -> load -> view('lesson/daily_journal_write', $data);
		} else {
			$date = $this -> uri -> segment(3) . '-' . $this -> uri -> segment(4);
			$data_data_array = array('user_id' => $data['login_data']['user_id'], 'date' => $date);
			$all_data = $this -> attendance -> get_all_data($data_data_array);
			$data_get_subject = array('subject_id' => $data['login_data']['subject_id']);

			/*$data['get_subject'] = $this -> attendance -> get_subject($data_get_subject);*/
			$data['get_list'] = $all_data;
			$this -> load -> view($view_name, $data);
		}
	}

	/*제현 8.1 지움private function daily_journal_write($view_name, $data) {
		$this -> load -> view('lesson/daily_journal_write', $data);
	}*/

	private function daily_journal_write_ok($view_name, $data) {
		$insert_daily_array = array('user_id' => $this -> input -> post('user_id'), 'user_name' => $this -> input -> post('user_name'), 'user_number' => $this -> input -> post('user_number'), 'user_subject' => $this -> input -> post('user_subject'), 'classroom' => $this -> input -> post('classroom'), 'subject' => $this -> input -> post('subject'), 'tutor_time' => $this -> input -> post('tutor_time'), 'date' => $this -> input -> post('date'), 'member_number' => $this -> input -> post('member_number'), 'activity' => $this -> input -> post('activity'), 'note' => $this -> input -> post('note'));
		$this -> attendance -> insert_daily($insert_daily_array);
		alert_date('글이 등록되었습니다.', '/index.php/lesson/daily_journal', date('Y'), date('m'));
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

	private function select_divide() {
		$divide_array = array('user_divide' => $this -> input -> post('user_divide'));
		$this -> load -> model('tutee_application');
		$this -> member -> select_list($divide_array);
	}

	private function attendance_record_admin_status($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}

	//보강신청
	private function enrichment_study($view_name, $data) {
		if ($data['name'] == "reinforce") {
			$this -> form_validation -> set_rules('subject', '교과목명', 'required');
			$this -> form_validation -> set_rules('reason', '보강사유', 'required');
			$this -> form_validation -> set_rules('year', '날짜(년)', 'required');
			$this -> form_validation -> set_rules('month', '날짜(월)', 'required');
			$this -> form_validation -> set_rules('day', '날짜(일)', 'required');
			$this -> form_validation -> set_rules('startTime', '시작시간', 'required');
			$this -> form_validation -> set_rules('endTime', '종료시간', 'required|callback_time_check');

			if ($this -> form_validation -> run() == FALSE) {
				$this -> load -> view('lesson/reinforce', $data);
			} else {
				$reinforc_array = array('subject' => $this -> input -> post('subject'), 'reason' => $this -> input -> post('reason'), 'date' => $this -> input -> post('year') . $this -> input -> post('month') . $this -> input -> post('day'), 'startTime' => $this -> input -> post('startTime'), 'endTime' => $this -> input -> post('endTime'), 'classroom' => '승인 대기 중');
				$this -> load -> model('reinforce_model');
				$this -> reinforce_model -> reinforce_registration($reinforc_array);
				alert('보강 신청이 완료되었습니다.', '/index.php/lesson/enrichment_study');
			}
		} else {
			$this -> load -> view($view_name, $data);
		}
	}

	//관리자 보강신청
	private function enrichment_study_admin($view_name, $data) {
		if ($data['name'] == "reinforce_admin") {
			$this -> form_validation -> set_rules('subject', '교과목명', 'required');
			$this -> form_validation -> set_rules('reason', '보강사유', 'required');
			$this -> form_validation -> set_rules('year', '날짜(년)', 'required');
			$this -> form_validation -> set_rules('month', '날짜(월)', 'required');
			$this -> form_validation -> set_rules('day', '날짜(일)', 'required');
			$this -> form_validation -> set_rules('startTime', '시작시간', 'required');
			$this -> form_validation -> set_rules('endTime', '종료시간', 'required|callback_time_check');
			$this -> form_validation -> set_rules('classroom', '강의실', 'required');

			if ($this -> form_validation -> run() == FALSE) {
				$this -> load -> view('lesson/reinforce_admin', $data);
			} else {
				$reinforc_array = array('subject' => $this -> input -> post('subject'), 'reason' => $this -> input -> post('reason'), 'date' => $this -> input -> post('year') . $this -> input -> post('month') . $this -> input -> post('day'), 'startTime' => $this -> input -> post('startTime'), 'endTime' => $this -> input -> post('endTime'), 'classroom' => $this -> input -> post('classroom'));
				$this -> load -> model('reinforce_model');
				$this -> reinforce_model -> reinforce_registration($reinforc_array);
				alert('강의실 배정이 완료되었습니다.', '/index.php/lesson/enrichment_study_admin');
			}
		} else {
			$this -> load -> view($view_name, $data);
		}
	}

	//보강시간 폼 체크
	public function time_check($data) {
		$Time_array = array('startTime' => $this -> input -> post('startTime'), 'endTime' => $this -> input -> post('endTime'));
		if ($Time_array['startTime'] >= $Time_array['endTime']) {
			$this -> form_validation -> set_message('time_check', '보강시간이 올바르지 않습니다!');
			return FALSE;
			//alert($Time_array['startTime'].' + '.$Time_array['endTime'],'index.php/lesson/enrichment_study');
		}
	}

	private function tutor_report($view_name, $data) {
		$this -> load -> view($view_name, $data);
	}

	private function my_question($view_name, $data) {
		if ($data['req_id'] != NULL) {
			if ($data['name'] == "update_board") {
				$board_id_type_array = array('board_type' => $data['category_title'], 'board_id' => $data['req_id']);
				$data['list'] = $this -> ci_board -> select_id_list($board_id_type_array);
				$this -> load -> view('notice/update_board', $data);

			} else if ($data['name'] == "update_ok") {
				$board_id_type_array = array('board_type' => $data['category_title'], 'board_id' => $data['req_id'], 'subject' => $this -> input -> post('subject'), 'contents' => $this -> input -> post('contents'));
				$data['list'] = $this -> ci_board -> update_board($board_id_type_array);
				alert_url('글이 업데이트 되었습니다.', '/index.php', $data['view_name']);

			} else if ($data['name'] == "delete_board") {
				$board_id_type_array = array('board_type' => $data['category_title'], 'board_id' => $data['req_id']);
				$this -> ci_board -> delete_board($board_id_type_array);
				alert_url('글이 삭제되었습니다.', '/index.php', $data['view_name']);

			} else {
				$board_id_type_array = array('board_type' => $data['category_title'], 'board_id' => $data['req_id']);
				$data['list'] = $this -> ci_board -> update_hit($board_id_type_array);
				$this -> load -> view('notice/view_board', $data);
			}

		} else if ($data['name'] == "write_board") {
			$this -> load -> view('notice/write_board', $data);

		} else if ($data['name'] == "write_ok") {
			$board_sign_up_array = array('board_type' => $data['category_title'], 'subject' => $this -> input -> post('subject'), 'contents' => $this -> input -> post('contents'), 'user_id' => $this -> input -> post('user_id'), 'user_name' => $this -> input -> post('user_name'));
			$this -> ci_board -> insert_board($board_sign_up_array);
			alert_url('글이 등록되었습니다.', '/index.php', $data['view_name']);

		} else {
			$board_type_array = array('board_type' => $data['category_title']);
			$get_list = $this -> ci_board -> get_board_all($board_type_array);
			$get_list_count = $this -> ci_board -> get_all_board_count($board_type_array);
			$data['get_list'] = $get_list;
			$data['get_list_count'] = $get_list_count;
			$this -> load -> view($view_name, $data);
		}
	}

}
