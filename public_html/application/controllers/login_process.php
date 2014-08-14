<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Login_process extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> load -> model('member');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
		$this -> load -> library('form_validation');
	}

	public function _remap($title) {
		$login_data = $this -> session -> userdata('login_data');

		if ($login_data != NULL) {
			$data['login_data'] = $login_data;
			$this -> session_update($data);
		}

		if (method_exists($this, $title)) {
			$this -> {"{$title}"}();
		}
		$data['category_title'] = $title;
		$data['menu_title'] = "login_process";
		$view_name = '/login_process/' . $title;
		$data['view_name'] = $view_name;
		$this -> load -> view('header', $data);
		$this -> load -> view('sidebar', $data);

		$this -> load -> view($view_name, $data);
		$this -> load -> view('footer');

	}

	//회원가입
	/*public function sign_up() {
	 $this -> form_validation -> set_rules('user_id', '아이디', 'required|callback_user_id_check');
	 $this -> form_validation -> set_rules('user_pw', '비밀번호', 'required|min2_length[6]|max_length[16]|matches[user_pw_check]');
	 $this -> form_validation -> set_rules('user_pw_check', '비밀번호 확인', 'required');
	 $this -> form_validation -> set_rules('user_name', '이름', 'required');
	 $this -> form_validation -> set_rules('user_number', '학번', 'required|numeric|exact_length[10]|callback_user_number_check');
	 $this -> form_validation -> set_rules('user_phonenumber2', '핸드폰 번호', 'required');
	 $this -> form_validation -> set_rules('user_phonenumber3', '핸드폰 번호', 'required');
	 $this -> form_validation -> set_rules('user_phonenumber', '핸드폰 번호', 'required|min_length[17]');
	 $this -> form_validation -> set_rules('user_email', '이메일', 'required|valid_email');

	 if ($this -> form_validation -> run() == FALSE) {
	 } else {
	 $join_array = array('user_id' => $this -> input -> post('user_id'), 'user_pw' => $this -> input -> post('user_pw'), 'user_name' => $this -> input -> post('user_name'), 'user_year' => $this -> input -> post('user_year'), 'user_number' => $this -> input -> post('user_number'), 'user_department' => $this -> input -> post('user_department'), 'user_phonenumber' => $this -> input -> post('user_phonenumber'), 'user_email' => $this -> input -> post('user_email'));
	 $this -> load -> model('member');
	 $data = $this -> member -> joining($join_array);
	 alert('회원가입이 완료되었습니다.', '/index.php/');
	 }
	 }*/
	public function sign_up_check() {
		$this -> id_form_check();
		$this -> pw_form_check();
		$this -> pw_check_form_check();
		$this -> name_form_check();
		$this -> number_form_check();
		$this -> phoneNumber_form_check();
		$this -> email_form_check();
		$join_array = array('user_id' => $this -> input -> post('user_id'), 'user_pw' => $this -> input -> post('user_pw'), 'user_name' => $this -> input -> post('user_name'), 'user_year' => $this -> input -> post('user_year'), 'user_number' => $this -> input -> post('user_number'), 'user_department' => $this -> input -> post('user_department'), 'user_phonenumber' => $this -> input -> post('user_phonenumber1') . " - " . $this -> input -> post('user_phonenumber2') . " - " . $this -> input -> post('user_phonenumber3'), 'user_email' => $this -> input -> post('user_email1') . "@" . $this -> input -> post('user_email2'));
		$this -> load -> model('member');
		if ($join_array != null) {
			$data = $this -> member -> joining($join_array);
			alert('회원가입이 완료되었습니다.', '/index.php/');
		}
	}

	public function update() {
		$this -> name_form_check();
		$this -> pw_form_check();
		$this -> number_form_check();
		$this -> phoneNumber_form_check();
		$this -> email_form_check();
		$update_user_array = array('user_id' => $this -> input -> post('user_id'), 'user_pw' => $this -> input -> post('user_pw'), 'user_name' => $this -> input -> post('user_name'), 'user_year' => $this -> input -> post('user_year'), 'user_number' => $this -> input -> post('user_number'), 'user_department' => $this -> input -> post('user_department'), 'user_phonenumber' => $this -> input -> post('user_phonenumber'), 'user_email' => $this -> input -> post('user_email'));
		$this -> load -> model('member');
		$data = $this -> member -> update($update_user_array);
		alert('회원수정이 완료되었습니다.', '/index.php/');
	}

	public function login_id_pw_check() {
		if ($this -> input -> post('form_id') == null) {
			alert('아이디를 입력하시지 않았습니다.');
		} else if ($this -> input -> post('form_pw') == null) {
			alert('비밀번호를 입력하시지 않았습니다.');
		}
		/*테스트 후 적용
		 * $this -> id_form_check();
		 $this -> pw_form_check();*/
		$form_id_pw_array = array('form_id' => $this -> input -> post('form_id'), 'form_pw' => $this -> input -> post('form_pw'));
		$this -> load -> model('member');
		$login_ok = $this -> member -> logincheck($form_id_pw_array);
		if ($login_ok == TRUE) {
			$login_data = $this -> member -> select_where($form_id_pw_array);
			$login_array = array('user_id' => $login_data['user_id'], 'user_pw' => $login_data['user_pw'], 'user_name' => $login_data['user_name'], 'user_year' => $login_data['user_year'], 'user_number' => $login_data['user_number'], 'subject_id' => $login_data['subject_id'], 'user_department' => $login_data['user_department'], 'user_phonenumber' => $login_data['user_phonenumber'], 'user_email' => $login_data['user_email'], 'user_application' => $login_data['user_application'], 'user_check_admin' => $login_data['user_check_admin'], 'user_application_subject' => $login_data['user_application_subject'], 'grade' => $login_data['grade']);
			$this -> session -> set_userdata(array('login_data' => $login_array));
			$this -> session -> all_userdata();
			alert('로그인이 되었습니다.', '/index.php/main');
		} else {
			alert('아이디나 비밀번호가 일치하지 않습니다.', '/index.php/login_process/login');
		}
	}

	public function logout() {
		$this -> session -> unset_userdata('session_data');
		$this -> session -> sess_destroy();
		alert('로그아웃 되었습니다.', '/index.php/main');
	}

	//이름, 전화번호, 이메일로 ID 찾기

	/*제현 8.12 작업 시작*/
	/*public function id_search() {
	 if ($this -> input -> post('form_name') == null) {
	 alert('이름을 입력하시지 않았습니다.');
	 } else if ($this -> input -> post('form_number') == null) {
	 alert('학번을 입력하지 않았습니다.');
	 } else if ($this -> input -> post('form_email1') == null) {
	 alert('e-mail울 입력하시지 않았습니다.');
	 } else if ($this -> input -> post('form_email2') == null) {
	 alert('e-mail울 입력하시지 않았습니다.');
	 }
	 $find_id_array = array('form_name' => $this -> input -> post('form_name'), 'form_number' => $this -> input -> post('form_number'), 'form_email1' => $this -> input -> post('form_email1'),'form_email2' => $this -> input -> post('form_email2'));
	 $this -> load -> model('member');
	 $data = $this -> member -> id_search($find_id_array);
	 if ($data != null) {
	 alert_parameter('당신의 아이디는', '입니다.', $data[0] -> user_id, '/index.php/login_process/login');
	 } else {
	 alert('입력하신 정보에 해당하는 아이디가 없습니다.', '/index.php/login_process/search_id_pwd');
	 }
	 }*/

	public function id_search() {
		$this -> name_form_check();
		$this -> number_form_check();
		$this -> email_form_check();
		$find_id_array = array('user_name' => $this -> input -> post('user_name'), 'user_number' => $this -> input -> post('user_number'), 'user_email' => $this -> input -> post('user_email1') . "@" . $this -> input -> post('user_email2'));
		$this -> load -> model('member');
		$data = $this -> member -> id_search($find_id_array);
		if ($data != null) {
			alert_parameter('당신의 아이디는', '입니다.', $data[0] -> user_id, '/index.php/login_process/login');
		} else {
			alert('입력하신 정보에 해당하는 아이디가 없습니다. 다시 확인해주세요.', '/index.php/login_process/search_id_pwd');
		}
	}

	//아이디, 이름, 이메일로 PW 찾기
	/*public function pw_search() {
	 if ($this -> input -> post('form_id') == null) {
	 alert('아이디를 입력하시지 않았습니다.');
	 } else if ($this -> input -> post('form_name') == null) {
	 alert('이름을 입력하시지 않았습니다.');
	 } else if ($this -> input -> post('form_email1') == null) {
	 alert('e-mail울 입력하시지 않았습니다.');
	 } else if ($this -> input -> post('form_email2') == null) {
	 alert('e-mail울 입력하시지 않았습니다.');
	 }
	 $pw_search_array = array('form_id' => $this -> input -> post('form_id'), 'form_name' => $this -> input -> post('form_name'), 'form_email1' => $this -> input -> post('form_email1'),'form_email2' => $this -> input -> post('form_email2'));
	 $this -> load -> model('member');
	 $data = $this -> member -> pw_search($pw_search_array);
	 if ($data != null) {
	 alert_parameter('해당 아이디의 암호는', '입니다.', $data[0] -> user_pw, '/index.php/login_process/login');
	 } else {
	 alert('입력하신 정보가 올바르지 않습니다.', '/index.php/login_process/search_id_pwd');
	 }
	 }*/
	public function pw_search() {
		$this -> id_form_check();
		$this -> name_form_check();
		$this -> email_form_check();
		$pw_search_array = array('user_id' => $this -> input -> post('user_id'), 'user_name' => $this -> input -> post('user_name'), 'user_email' => $this -> input -> post('user_email1') . "@" . $this -> input -> post('user_email2'));
		$this -> load -> model('member');
		$data = $this -> member -> pw_search($pw_search_array);
		if ($data != null) {
			alert_parameter('해당 아이디의 암호는', '입니다.', $data[0] -> user_pw, '/index.php/login_process/login');
		} else {
			alert('입력하신 정보에 해당하는 비밀번호가 없습니다. 다시 확인해주세요.', '/index.php/login_process/search_id_pwd');
		}
	}

	public function user_id_check() {
		$id_array = array('user_id' => $this -> input -> post('user_id'));
		$this -> load -> model('member');
		$data = $this -> member -> id_compare($id_array);
		if ($data != null) {
			alert('중복된 아이디 입니다. 아이디를 다시 입력해주세요.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function user_number_check() {
		$number_array = array('user_number' => $this -> input -> post('user_number'));
		$this -> load -> model('member');
		$data = $this -> member -> number_compare($number_array);
		if ($data != null) {
			$this -> form_validation -> set_message('user_number_check', $number_array['user_number'] . '학번이 존재합니다. 학번을 다시 확인해주세요');
			return FALSE;
		} else {
			$this -> form_validation -> set_message('user_number_check', $number_array['user_number'] . '은(는) 사용하실수 있는 학번입니다.');
			return TRUE;
		}
	}

	//세션 업데이트
	public function session_update($data) {
		$user_id_array = array('user_id' => $data['login_data']['user_id']);
		$user_data = $this -> member -> select_id($user_id_array);
		$login_array = array('user_id' => $user_data['user_id'], 'user_pw' => $user_data['user_pw'], 'user_name' => $user_data['user_name'], 'user_year' => $user_data['user_year'], 'user_number' => $user_data['user_number'], 'subject_id' => $user_data['subject_id'], 'user_department' => $user_data['user_department'], 'user_phonenumber' => $user_data['user_phonenumber'], 'user_email' => $user_data['user_email'], 'user_application' => $user_data['user_application'], 'user_check_admin' => $user_data['user_check_admin'], 'user_application_subject' => $user_data['user_application_subject'], 'grade' => $user_data['grade']);
		$this -> session -> set_userdata(array('login_data' => $login_array));
	}

	//폼 체크
	public function id_form_check() {
		preg_match('/[가-힣!@#$%^&*()?+=\/]/', $this -> input -> post('user_id'), $user_id_check);
		if ($this -> input -> post('user_id') == null) {
			alert('아이디를 입력하지 않았습니다');
		} else if((strlen($this -> input -> post('user_id')) < 5) || (strlen($this -> input -> post('user_id')) > 12)) {
			alert('아이디는 5자 이상 12자 이하 입니다.');
		} else if( $user_id_check != null ){
			alert('아이디는 영어와 숫자만 입력 가능합니다.');
		}
		/* 숫자 한글 특수문자 제한
		 else if ($user_id_check != null) {
		 alert('아이디는 영문과 숫자만 입력 가능합니다.');
		 }*/
	}

	public function pw_form_check() {
		if ($this -> input -> post('user_pw') == null) {
			alert('비밀번호를 입력하지 않았습니다');
		} else if ((strlen($this -> input -> post('user_pw')) < 6) || (strlen($this -> input -> post('user_pw')) > 17) != null) {
			alert('비밀번호는 6자 이상 17자 이하 입니다.');
		}
	}

	public function pw_check_form_check() {
		if ($this -> input -> post('user_pw_check') == null) {
			alert('비밀번호 확인을 입력하지 않았습니다');
		} else if (($this -> input -> post('user_pw')) != ($this -> input -> post('user_pw_check'))) {
			alert('비밀번호가 일치하지 않습니다.');
		}
	}

	public function name_form_check() {
		preg_match('/[0-9!@#$%^&*()?+=\/]/', $this -> input -> post('user_name'), $user_name_check);
		if ($this -> input -> post('user_name') == null) {
			alert('이름을 입력하지 않았습니다');
		} else if ($user_name_check != null) {
			alert('이름은 한글과 알파벳만 입력 가능합니다.');
		}
	}

	public function number_form_check() {
		preg_match('/[a-zA-Z!@#$%^&*()?+=\/]/', $this -> input -> post('user_number'), $user_number_check);
		if ($this -> input -> post('user_number') == null) {
			alert('학번을 입력하지 않았습니다');
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
			alert('핸드폰 번호를 입력하지 않았습니다');
		} else if ($user_phone2_check != null) {
			alert('핸드폰 번호는 숫자만 입력가능합니다.');
		} else if ($this -> input -> post('user_phonenumber3' == null)) {
			alert('핸드폰 번호를 입력하세요.');
		} else if ($user_phone3_check != null) {
			alert('핸드폰 번호는 숫자만 입력가능합니다.');
		}
	}

	public function email_form_check() {
		preg_match('/[!@#$%^&*()?+=\/]/', $this -> input -> post('user_email1'), $user_email1_check);
		preg_match('/[!@#$%^&*()?+=\/]/', $this -> input -> post('user_email2'), $user_email2_check);
		preg_match('/[\xA1-\xFE\xA1-\xFE]/', $this -> input -> post('user_email1'), $user_email3_check);
		preg_match('/[\xA1-\xFE\xA1-\xFE]/', $this -> input -> post('user_email2'), $user_email4_check);
		if ($this -> input -> post('user_email1') == null) {
			alert('e-mail울 입력하지 않았습니다');
		} else if ($user_email1_check != null) {
			alert('e-mail은 특수문자를 사용하실 수 없습니다.');
		} else if ($this -> input -> post('user_email2') == null) {
			alert('e-mail울 입력하세요.');
		} else if ($user_email2_check != null) {
			alert('e-mail은 특수문자를 사용하실 수 없습니다.');
		} else if (strlen($this -> input -> post('user_email2')) < 4) {
			alert('e-mail이 올바르지 않습니다.');
		} else if ($user_email3_check) {
			alert('e-mail은 한글을 사용하실 수 없습니다.');
		} else if ($user_email4_check) {
			alert('e-mail은 한글을 사용하실 수 없습니다.');
		}
	}

}
