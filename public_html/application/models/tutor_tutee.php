<?php
class Tutor_tutee extends CI_Model {
    function __construct(){       
        parent::__construct();
    }//__construct()

    public function tutee_registration($registration_array){
		return $this -> db -> insert('tutee_application', $registration_array);
    }
	
	public function tutor_registration($registration_array){
		return $this -> db -> insert('tutor_application', $registration_array);
    }
	
	public function tutee_list(){
		$this -> db -> order_by("reg_date", "asc");
		return $this -> db -> get('tutee_application') -> result();
	}
	
	public function tutor_list(){
		$this -> db -> order_by("reg_date", "asc");
		return $this -> db -> get('tutor_application') -> result();
	}
	
	public function tutor_list_row(){
		return $this -> db -> get('tutee_application') -> row_array();
	}
	
	public function get_subject_list(){
		return $this -> db -> get('subject') -> result();
	}
	
	public function select_list(){
		return $this -> db -> get('subject') -> result();
	}
	
	public function select_list_sub(){
		return $this -> db -> get('subject_sub') -> result();
	}
	
	public function select_id_tutee($user_number){
		$this -> db -> where('user_number',$user_number);
		return $this -> db -> get('tutor_application') -> row();
	}
	
	public function select_id_tutor($user_number){
		$this -> db -> where('user_number',$user_number);
		return $this -> db -> get('tutor_application') -> row();
	}
	
	public function update_user_application($update_application){
		$update_appliation_subject=array('user_application_subject' => $update_application['user_application_subject']);
		$this -> db -> where('user_number', $update_application['user_number']);
		return $this -> db -> update('member', $update_appliation_subject);
	}
	
	public function select_tutee_by_id($login_array){
		return $this -> db -> get_where('tutee_application',$login_array) -> row_array();
	}
	
	public function select_tutor_by_id($login_array){
		return $this -> db -> get_where('tutor_application',$login_array) -> row_array();
	}
	
	public function update_tutee($update_array){
		$this -> db -> where('user_id', $update_array['user_id']);
		return $this -> db -> update('tutee_application', $update_array);
	}
	
	public function update_tutor($update_array){
		$this -> db -> where('user_id', $update_array['user_id']);
		return $this -> db -> update('tutor_application', $update_array);
	}
	
	public function tutee_delete($delete_data){
		return $this -> db -> delete('tutee_application', $delete_data);
	}

	public function tutor_delete($delete_data){
		return $this -> db -> delete('tutor_application', $delete_data);
	}
}	
?>