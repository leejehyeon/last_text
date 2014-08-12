<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
			parent::__construct();
			$this->load->library('session');
			$this->load->database();
			$this -> load -> model('member');
		}
		
	public function _remap(){
		$login_data = $this->session->userdata('login_data');
		
		if($login_data != NULL){
			 $data['login_data'] = $login_data;
			 $this -> session_update($data);
		}
		
		$this->load->model('ci_board');
		$notice_list = $this->ci_board->get_list_title3();
		$data['notice_list3'] = $notice_list;
		$class_notice_list = $this->ci_board->get_class_list_title3();
		$data['class_notice_list3'] = $class_notice_list;
		
		$this->load->view('header', $data);
		$this->load->view('main', $data);
		$this->load->view('footer');
	}
	
	//세션 업데이트
	public function session_update($data){
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
			 'user_application' => $user_data['user_application'],
			 'user_check_admin' => $user_data['user_check_admin'],
			 'user_application_subject' => $user_data['user_application_subject'],
			 'grade' => $user_data['grade']);
		$this -> session -> set_userdata(array('login_data' => $login_array));
	}
}