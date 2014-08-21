<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Tutor_tutee_application extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> model('tutor_tutee');
		$this -> load -> model('member');
		$this -> load -> library('session');
		$this -> load -> helper('alert');
	}

	public function _remap($title) {

		$login_data = $this -> session -> userdata('login_data');
		
		if($login_data != NULL){
			 $data['login_data'] = $login_data;
		}
		
		$data['category_title'] = $title;
		$data['menu_title'] = "tutor_tutee_application";
		$view_name = '/tutor_tutee_application/' . $title;
		$data['view_name'] = $view_name;
		$this -> load -> view('header', $data);
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}

		$this -> load -> view('footer');
	}

	private function tutee($view_name, $data){
		$get_list = $this -> tutor_tutee -> select_list();
		$get_sub_list = $this -> tutor_tutee -> select_list_sub();
		$data['get_list'] = $get_list;
		$data['get_sub_list'] = $get_sub_list;
		$this -> load -> view($view_name, $data);
	}

	private function tutor($view_name, $data){
		$get_list = $this -> tutor_tutee -> select_list();
		$data['get_list'] = $get_list;
		$this -> load -> view($view_name, $data);
	}
	
	private function tutee_insert($view_name,$data){
		$registration_array = array('user_id' => $this -> input -> post('user_id'),
									'user_number' => $this -> input -> post('user_number'), 
									'user_department' => $this -> input -> post('user_department'), 
									'user_name' => $this -> input -> post('user_name'), 
									'user_year' => $this -> input -> post('user_year'),
									'user_number' => $this -> input -> post('user_number'),
									'user_phonenumber' => $this -> input -> post('user_phonenumber'),
									'user_email' => $this -> input -> post('user_email'),
									'subject_id' => $this -> input -> post('user_subject'),
									'user_divide' => $this -> input -> post('user_divide'),
									'user_level' => $this -> input -> post('user_level'),
									'user_hs_division' => $this -> input -> post('user_hs_division'),
									'user_hs_application' => $this -> input -> post('user_hs_application'),
									'user_time' => $this -> input -> post('user_time'),
									'user_content_application' => $this -> input -> post('user_content_application')
									);
		$this -> tutor_tutee ->tutee_registration($registration_array);
		$update_application= array( 'user_number' => $this -> input -> post('user_number'),
									'user_application_subject' => $this -> input -> post('user_application_subject')
									);
		$this -> tutor_tutee ->update_user_application($update_application);
		$this -> session_update($data);
		alert('글이 등록되었습니다.', '/index.php/');
	} 

	private function tutor_insert($view_name,$data){
		$registration_array = array('user_id' => $this -> input -> post('user_id'),
									'user_number' => $this -> input -> post('user_number'), 
									'user_department' => $this -> input -> post('user_department'), 
									'user_name' => $this -> input -> post('user_name'), 
									'user_year' => $this -> input -> post('user_year'),
									'user_number' => $this -> input -> post('user_number'),
									'user_phonenumber' => $this -> input -> post('user_phonenumber'),
									'user_email' => $this -> input -> post('user_email'),
									'user_grade1' => $this -> input -> post('user_grade1'),
									'user_grade2' => $this -> input -> post('user_grade2'),
									'user_grade3' => $this -> input -> post('user_grade3'),
									'user_grade4' => $this -> input -> post('user_grade4'),
									'user_grade5' => $this -> input -> post('user_grade5'),
									'subject_id' => $this -> input -> post('user_subject'),
									'user_time' => $this -> input -> post('user_time'),
									'user_career' => $this -> input -> post('user_career'),
									'user_content_application' => $this -> input -> post('user_content_application')
									);
		$this -> tutor_tutee ->tutor_registration($registration_array);
		$update_application= array( 'user_number' => $this -> input -> post('user_number'),
									'user_application_subject' => $this -> input -> post('user_application_subject')
									);
		$this -> tutor_tutee ->update_user_application($update_application);
		$this -> session_update($data);
		alert('글이 등록되었습니다.', '/index.php/');
	}
	
	private function tutee_update(){
		$update_array = array('user_id' => $this -> input -> post('user_id'),
									'user_number' => $this -> input -> post('user_number'), 
									'user_department' => $this -> input -> post('user_department'), 
									'user_name' => $this -> input -> post('user_name'), 
									'user_year' => $this -> input -> post('user_year'),
									'user_number' => $this -> input -> post('user_number'),
									'user_phonenumber' => $this -> input -> post('user_phonenumber'),
									'user_email' => $this -> input -> post('user_email'),
									'subject_id' => $this -> input -> post('user_subject'),
									'user_divide' => $this -> input -> post('user_divide'),
									'user_level' => $this -> input -> post('user_level'),
									'user_hs_division' => $this -> input -> post('user_hs_division'),
									'user_hs_application' => $this -> input -> post('user_hs_application'),
									'user_time' => $this -> input -> post('user_time'),
									'user_content_application' => $this -> input -> post('user_content_application')
									);
		$this -> tutor_tutee -> update_tutee($update_array);
		alert('글이 업데이트 되었습니다.', '/index.php/');
	}
	
	private function tutor_update(){
		$update_array = array('user_id' => $this -> input -> post('user_id'),
									'user_number' => $this -> input -> post('user_number'), 
									'user_department' => $this -> input -> post('user_department'), 
									'user_name' => $this -> input -> post('user_name'), 
									'user_year' => $this -> input -> post('user_year'),
									'user_number' => $this -> input -> post('user_number'),
									'user_phonenumber' => $this -> input -> post('user_phonenumber'),
									'user_email' => $this -> input -> post('user_email'),
									'user_grade1' => $this -> input -> post('user_grade1'),
									'user_grade2' => $this -> input -> post('user_grade2'),
									'user_grade3' => $this -> input -> post('user_grade3'),
									'user_grade4' => $this -> input -> post('user_grade4'),
									'user_grade5' => $this -> input -> post('user_grade5'),
									'subject_id' => $this -> input -> post('user_subject'),
									'user_time' => $this -> input -> post('user_time'),
									'user_career' => $this -> input -> post('user_career'),
									'user_content_application' => $this -> input -> post('user_content_application')
									);
		$this -> tutor_tutee -> update_tutor($update_array);
		alert('글이 업데이트 되었습니다.', '/index.php/');
	}

	private function change_application_on(){
		$this -> load -> model('member');
		$data = $this -> member ->update_application_on(); 
		alert('튜터,튜티 지원기능이 활성화되었습니다..', '/index.php/');
	}

	private function change_application_off(){
		$this -> load -> model('member');
		$data = $this -> member ->update_application_off(); 
		alert('튜터,튜티 지원기능이 비활성화되었습니다..', '/index.php/');
	}
	
	private function session_update($data){
		$user_id_array = array('user_id' => $data['login_data']['user_id']);
		$user_data = $this -> member -> select_id($user_id_array);
		$login_array = array('user_id' => $user_data['user_id'],
			 'user_pw' => $user_data['user_pw'], 
			 'user_name' => $user_data['user_name'], 
			 'user_year' => $user_data['user_year'],
			 'user_number' => $user_data['user_number'],
			 'subject_id' => $user_data['subject_id'],
			 'user_department' => $user_data['user_department'],
			 'user_phonenumber' => $user_data['user_phonenumber'],
			 'user_email' => $user_data['user_email'],
			 'user_application_subject' => $user_data['user_application_subject'],
			 'grade' => $user_data['grade']);
		$this -> session -> set_userdata(array('login_data' => $login_array));
	}
	
}
