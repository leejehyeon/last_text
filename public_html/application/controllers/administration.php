<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administration extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> load -> model('attendance');
		$this -> load -> model('tutor_tutee');
		$this -> load -> model('member');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
	}

	public function _remap($title,$name) {
		$user_id= $this->input->get('user_id');
		$title_name= implode(",", $name);
		$login_data = $this->session->userdata('login_data');
		if($login_data != NULL){
			 $data['login_data'] = $login_data;
		}
		
		$data['user_id']=$user_id;
		$data['name']=$title_name;
		$data['category_title'] = $title;
		$data['menu_title'] = "administration";
		$view_name = '/administration/' . $title;
		$data['view_name'] = $view_name;
		
		$this -> load -> view('header', $data);
		
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}
		$this -> load -> view('footer');
	}
	public function tutee($view_name, $data){
		if($data['user_id']!=NULL){
			$login_array = array('user_id' => $data['user_id']);
			$data['user_data'] = $this -> tutor_tutee -> select_tutee_by_id($login_array);
			$data['get_subject'] = $this -> attendance -> get_subject_all_data();
		
			$this -> load -> view('/administration/view_tutee', $data);
		}else{
		$get_tutee_list = $this -> member -> get_tutee_list();
		$get_count_tutee = $this -> member -> get_count_tutee();
		
		$data['get_tutee_list'] = $this -> member -> get_tutee_list();
		$data['get_count_tutee'] = $this -> member -> get_count_tutee();
		$data['get_subject_list'] = $this -> tutor_tutee -> get_subject_list();
		$data['get_list'] = $this -> tutor_tutee -> tutee_list();
		$data['get_sub_list'] = $this -> tutor_tutee -> select_list_sub();
		$data['tutee_tutor_application'] = $this -> member -> get_application();
		
		$data['get_subject'] = $this -> attendance -> get_subject_all_data();
		
		
		$this -> load -> view('sidebar', $data);
		$this -> load -> view($view_name, $data);
		}
	}
	
	public function tutor($view_name, $data){
		if($data['user_id']!=NULL){
			$login_array = array('user_id' => $data['user_id']);
			$data['user_data'] = $this -> tutor_tutee -> select_tutor_by_id($login_array);
			$data['get_subject'] = $this -> attendance -> get_subject_all_data();
		
			$this -> load -> view('/administration/view_tutor', $data);
		}else{
		$get_tutor_list = $this -> member -> get_tutor_list();
		$get_count_tutor = $this -> member -> get_count_tutor();
		
		$data['get_tutor_list'] = $this -> member -> get_tutor_list();
		$data['get_count_tutor'] = $this -> member -> get_count_tutor();
		$data['get_subject_list'] = $this -> tutor_tutee -> get_subject_list();
		$data['get_list'] = $this -> tutor_tutee -> tutor_list();
		$data['get_sub_list'] = $this -> tutor_tutee -> select_list_sub();
		$data['tutee_tutor_application'] = $this -> member -> get_application();
		
		$data['get_subject'] = $this -> attendance -> get_subject_all_data();
		
		$this -> load -> view('sidebar', $data);
		$this -> load -> view($view_name, $data);
		}
	}
	
	public function tutee_grade_up($view_name, $data){
		if($this -> input -> post('user_subject')=="선택하세요"){
			alert('과목을 선택하세요.', '/index.php/administration/tutee');
		}else if($this -> input -> post('user_divide')=="선택하세요"){
			alert('분반을 선택하세요.', '/index.php/administration/tutee');
		}else{
		$update_data = array('user_id' => $this -> input -> post('user_id'),
							 'subject_id' => $this -> input -> post('user_subject'),
							 'user_divide' => $this -> input -> post('user_divide'),
							 'user_application_subject' => $this -> input -> post('user_application_subject'),
							 'grade' => "3"
							);
		$this -> member -> tutee_grade_up($update_data);
		$delete_data = array('user_id' => $this -> input -> post('user_id')
							);	
		$this -> tutor_tutee -> tutee_delete($delete_data);
		alert('등급을 올렸습니다.', '/index.php/administration/tutee');
		}
	}
	
	public function tutor_grade_up($view_name, $data){
		if($this -> input -> post('user_subject')=="선택하세요"){
			alert('과목을 선택하세요.', '/index.php/administration/tutee');
		}else if($this -> input -> post('user_divide')=="선택하세요"){
			alert('분반을 선택하세요.', '/index.php/administration/tutee');
		}else{
		$update_data = array('user_id' => $this -> input -> post('user_id'),
							 'subject_id' => $this -> input -> post('user_subject'),
							 'user_divide' => $this -> input -> post('user_divide'),
							 'user_application_subject' => $this -> input -> post('user_application_subject'),
							 'grade' => "2"
							);
		$this -> member -> tutor_grade_up($update_data);
		$delete_data = array('user_id' => $this -> input -> post('user_id')
							);		
		$this -> tutor_tutee -> tutor_delete($delete_data);
		alert('등급을 올렸습니다.', '/index.php/administration/tutor');
		}
	}
}