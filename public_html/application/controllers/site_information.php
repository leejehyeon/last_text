<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_information extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this -> load -> database();
		$this -> load -> library('session');
		$this -> load -> helper('alert');
		$this -> load -> helper('url');
	}

	public function _remap($title) {
		$login_data = $this->session->userdata('login_data');
		
		if($login_data != NULL){
			 $data['login_data'] = $login_data;
		}
		
		$data['category_title'] = $title;
		$data['menu_title'] = "site_information";
		$view_name = '/site_information/' . $title;
		$data['view_name'] = $view_name;
		
		$this -> load -> view('header', $data);
		$this -> load -> view('sidebar', $data);
		if (method_exists($this, $title)) {
			$this -> {"{$title}"}($view_name, $data);
		}
		$this -> load -> view('footer');
	}
	
	private function personal_information($view_name,$data){
		$this -> load -> view($view_name, $data);
	}
	
	private function email_collection($view_name,$data){
		$this -> load -> view($view_name, $data);
	}
}