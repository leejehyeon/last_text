<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Mypage extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('member');
		$this -> load -> model('tutor_tutee');
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
	}

	public function _remap($title) {
		$login_data = $this -> session -> userdata('login_data');
		if (isset($login_data))
			$data['login_data'] = $login_data;

		$data['category_title'] = $title;
		$data['menu_title'] = "mypage";
		$view_name = '/mypage/' . $title;
		$data['view_name'] = $view_name;

		$this -> load -> view('header', $data);
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}
		$this -> load -> view('footer');
	}

	public function modify($view_name, $data) {
		$this -> load -> model('tutor_tutee');
		$user_number = $data['login_data']['user_number'];
		if ($data['login_data']['user_application_subject'] == "tutee") {
			$data['tutee_data'] = $this -> tutor_tutee -> select_id_tutee($user_number);

			$this -> load -> view('sidebar', $data);
			$this -> load -> view($view_name, $data);
		} else if ($data['login_data']['user_application_subject'] == "tutor") {
			$data['tutor_data'] = $this -> tutor_tutee -> select_id_tutor($user_number);
			$this -> load -> view('sidebar', $data);
			$this -> load -> view($view_name, $data);
		} else {
			$this -> load -> view('sidebar', $data);
			$this -> load -> view($view_name, $data);
		}
	}
	public function delete($view_name, $data) {
		$this -> load -> view('sidebar', $data);
		$this -> load -> view($view_name, $data);
	}

	public function delete_ok($view_name, $data) {
		$check_member_array = array('user_id' => $this -> input -> post('user_id'), 'user_pw' => $this -> input -> post('user_pw'), 'user_email' => $this -> input -> post('user_email'));
		$check_member = $this -> member -> check_member($check_member_array);
		if ($check_member) {
			$delete_id_array = array('user_id' => $this -> input -> post('user_id'));
			$this -> member -> delete($delete_id_array);
			$this -> session -> unset_userdata('session_data');
			$this -> session -> sess_destroy();
			alert('계정정보가 삭제되었습니다.', '/index.php/');
		} else {
			alert('입력하신 정보가 맞지 않습니다.', '/index.php/mypage/delete');
		}

	}

	public function tutee($view_name, $data) {
		$get_list = $this -> tutor_tutee -> select_list();
		$get_sub_list = $this -> tutor_tutee -> select_list_sub();
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;

		$login_array = array('user_id' => $this -> input -> post('user_id'));
		$data['user_data'] = $this -> tutor_tutee -> select_tutee_by_id($login_array);
		$this -> load -> view($view_name, $data);
	}

	public function tutor($view_name, $data) {
		$get_list = $this -> tutor_tutee -> select_list();
		$data['get_list'] = $get_list;

		$login_array = array('user_id' => $this -> input -> post('user_id'));
		$data['user_data'] = $this -> tutor_tutee -> select_tutor_by_id($login_array);
		$this -> load -> view($view_name, $data);
	}

	//폼 체크
	public function id_form_check() {
		/* 한글 특수문자 제한
		 preg_match('/[가-힣!@#$%^&*()?+=\/]/', $this -> input -> post('user_name'), $user_id_check);*/
		if ($this -> input -> post('user_id') == null) {
			alert('아이디를 입력하시지 않았습니다.');
		} else if ((strlen($this -> input -> post('user_id')) < 5) || (strlen($this -> input -> post('user_id')) > 12)) {
			alert('아이디는 5자 이상 12자 이하 입니다.');
		}
		/* 숫자 한글 특수문자 제한
		 else if ($user_id_check != null) {
		 alert('아이디는 영문과 숫자만 입력 가능합니다.');
		 }*/
	}

	public function pw_form_check() {
		if ($this -> input -> post('user_pw') == null) {
			alert('비밀번호를 입력하시지 않았습니다.');
		} else if ((strlen($this -> input -> post('user_pw')) < 6) || (strlen($this -> input -> post('user_pw')) > 17) != null) {
			alert('비밀번호는 6자 이상 17자 이하 입니다.');
		}
	}

	public function pw_check_form_check() {
		if ($this -> input -> post('user_pw_check') == null) {
			alert('비밀번호 확인을 입력하시지 않았습니다.');
		} else if (($this -> input -> post('user_pw')) != ($this -> input -> post('user_pw_check'))) {
			alert('비밀번호가 일치하지 않았습니다.');
		}
	}

	public function name_form_check() {
		preg_match('/[0-9!@#$%^&*()?+=\/]/', $this -> input -> post('user_name'), $user_name_check);
		if ($this -> input -> post('user_name') == null) {
			alert('이름을 입력하시지 않았습니다.');
		} else if ($user_name_check != null) {
			alert('이름은 한글과 알파벳만 입력 가능합니다.');
		}
	}

	public function number_form_check() {
		preg_match('/[a-zA-Z!@#$%^&*()?+=\/]/', $this -> input -> post('user_number'), $user_number_check);
		if ($this -> input -> post('user_number') == null) {
			alert('학번을 입력하시지 않았습니다.');
		} else if (strlen($this -> input -> post('user_number')) != 10) {
			alert('학번이 올바르지 않습니다.');
		} else if ($user_number_check != null) {
			alert('학번이 올바르지 않습니다.');
		}
	}

	public function phoneNumber_form_check() {
		preg_match('/[a-zA-Z!@#$%^&*()?+=\/]/', $this -> input -> post('user_phonenumber2'), $user_phone2_check);
		preg_match('/[a-zA-Z!@#$%^&*()?+=\/]/', $this -> input -> post('user_phonenumber3'), $user_phone3_check);
		if ($this -> input -> post('user_phonenumber2') == null) {
			alert('핸드폰 번호를 입력하시지 않았습니다.');
		} else if ($user_phone2_check != null) {
			alert('올바른 핸드폰 번호가 아닙니다.');
		} else if ($this -> input -> post('user_phonenumber3' == null)) {
			alert('핸드폰 번호를 입력하시지 않았습니다.');
		} else if ($user_phone3_check != null) {
			alert('올바른 핸드폰 번호가 아닙니다.');
		}
	}

	public function email_form_check() {
		preg_match('/[!@#$%^&*()?+=\/]/', $this -> input -> post('user_email1'), $user_email1_check);
		preg_match('/[!@#$%^&*()?+=\/]/', $this -> input -> post('user_email2'), $user_email2_check);
		if ($this -> input -> post('user_email1') == null) {
			alert('e-mail울 입력하시지 않았습니다.');
		} else if ($user_email1_check != null) {
			alert('올바른 e-mail형식이 아닙니다.');
		} else if ($this -> input -> post('user_email2') == null) {
			alert('e-mail울 입력하시지 않았습니다.');
		} else if ($user_email2_check != null) {
			alert('올바른 e-mail형식이 아닙니다.');
		} else if (strlen($this -> input -> post('user_email2')) < 4) {
			alert('올바른 e-mail형식이 아닙니다.');
		}

	}

}
