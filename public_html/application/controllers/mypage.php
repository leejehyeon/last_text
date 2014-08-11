<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
		$login_data = $this->session->userdata('login_data');
		if(isset($login_data))
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
	
	public function modify($view_name, $data){
		$this -> load -> model('tutor_tutee');
		$user_number = $data['login_data']['user_number'];
		if($data['login_data']['user_application_subject']=="tutee"){
			$data['tutee_data'] = $this -> tutor_tutee -> select_id_tutee($user_number);
			
			$this -> load -> view('sidebar', $data);
			$this -> load -> view($view_name, $data);
		}else if($data['login_data']['user_application_subject']=="tutor"){
			$data['tutor_data'] = $this -> tutor_tutee -> select_id_tutor($user_number);
			$this -> load -> view('sidebar', $data);
			$this -> load -> view($view_name, $data);
		}else{
			$this -> load -> view('sidebar', $data);
			$this -> load -> view($view_name, $data);
		}	
	}

	public function delete($view_name, $data){
		$this -> load -> view('sidebar', $data);
		$this -> load -> view($view_name, $data);
	}
	
	public function delete_ok($view_name, $data){
		$check_member_array = array('user_id' => $this -> input -> post('user_id'),
									'user_pw' => $this -> input -> post('user_pw'),
									'user_email' => $this -> input -> post('user_email'));
		$check_member = $this -> member -> check_member($check_member_array);
		if($check_member){
			$delete_id_array = array('user_id' => $this -> input -> post('user_id'));
			$this -> member -> delete($delete_id_array);
			$this -> session -> unset_userdata('session_data');
			$this -> session -> sess_destroy();
			alert('계정정보가 삭제되었습니다.', '/index.php/');
		}else{
			alert('입력하신 정보가 맞지 않습니다.', '/index.php/mypage/delete');
		}
		
	}

	public function tutee($view_name, $data){
		$get_list = $this -> tutor_tutee -> select_list();
		$get_sub_list = $this -> tutor_tutee -> select_list_sub();
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;
		
		$login_array = array('user_id' => $this -> input -> post('user_id'));
		$data['user_data'] = $this -> tutor_tutee -> select_tutee_by_id($login_array);
		$this -> load -> view($view_name, $data);
	}
	
	public function tutor($view_name, $data){
		$get_list = $this -> tutor_tutee -> select_list();
		$data['get_list'] = $get_list;
		
		$login_array = array('user_id' => $this -> input -> post('user_id'));
		$data['user_data'] = $this -> tutor_tutee -> select_tutor_by_id($login_array);
		$this -> load -> view($view_name, $data);
	}
}