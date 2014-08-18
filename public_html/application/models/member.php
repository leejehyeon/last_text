<?php
class Member extends CI_Model {
    function __construct(){       
        parent::__construct();
    }//__construct()

    public function joining($join_array){
		return $this -> db -> insert('member', $join_array);
    }
	
	 public function update($update_user_array){
		return $this -> db -> update('member', $update_user_array,array('user_id' => $update_user_array['user_id']));
    }
	 
	public function logincheck($form_id_pw_array){
		$form_array = array('form_id' => $form_id_pw_array['form_id'],
							'form_pw' => $form_id_pw_array['form_pw']);
		$db_data = $this->db->get_where('member',array('user_id'=>$form_array['form_id'],'user_pw'=>$form_array['form_pw']))->row();
		if(($db_data != null)){
			$this -> db -> get_where('member',array('user_id'=>$form_array['form_id']));
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function select_where($form_id_pw_array){
		$form_array = array('form_id' => $form_id_pw_array['form_id']);
		return $this -> db -> get_where('member',array('user_id'=>$form_array['form_id'])) -> row_array();
	}
	
	public function id_search($name_number_email_array){
		$form_array = array('user_name' => $name_number_email_array['user_name'],
				'user_number' => $name_number_email_array['user_number'],
				'user_email' => $name_number_email_array['user_email']);
				/*'user_email1' => $name_number_email_array['user_email1'],
				'user_email2' => $name_number_email_array['user_email2']);*/
				return $this -> db -> get_where('member', $form_array) -> result();
	}
	
	public function pw_search($id_name_email_array){
		$form_array = array('user_id' => $id_name_email_array['user_id'],
				'user_name' => $id_name_email_array['user_name'],
				'user_email' => $id_name_email_array['user_email']);
				/*'user_email' => $name_number_email_array['user_email1']."@".$name_number_email_array['user_email2']);*/
				/*'user_email1' => $id_name_email_array['user_email1'],
				'user_email2' => $id_name_email_array['user_email2']);*/
				return $this -> db -> get_where('member', $form_array) -> result();
	}
	public function id_compare($id_array){
		$form_array = array('user_id' => $id_array['user_id']);
		return $this -> db -> get_where('member', $form_array) -> result();
	}

	public function number_compare($number_array){
		$form_array = array('user_number' => $number_array['user_number']);
		return $this -> db -> get_where('member', $form_array) -> result();
	}
	
	/*튜터튜티 지원서 ON OFF 기능
	 *ON 일시 튜터, 튜티 지원기간
	 *OFF 일시 튜터, 튜티 지원기간 X  
	 */
	public function update_application_on(){
		$data = array('user_application' => "O");
		return $this -> db -> update('member',$data);
	}

	public function update_application_off(){
		$data = array('user_application' => "X");
		return $this -> db -> update('member',$data);
	}
	//----튜터튜티 지원서 ON OFF 기능
	
	public function delete($delete_id_array){
		return $this -> db -> delete('member',$delete_id_array); 
	}
	
	public function select_list($divide_array){
		return $this -> db -> get_where('member',$divide_array);
	}

	public function select_subject($subject_array){
		$this -> db -> like($subject_array);
		$this -> db -> from('member');
		return $this -> db -> get() -> result();
	}
	
	public function subject_by_tutor_data($tutor_subject_array){
		return $this -> db -> get_where('member',$tutor_subject_array) -> result();
	}

	public function user_id_get($get_id_array){
		return $this -> db -> get_where('member',$get_id_array) -> row_array();
	}
	
	//회원탈퇴시 정보 체크 맞으면 true 라턴, 틀리면 false 리턴
	public function check_member($check_member_array){
		$db_data = $this -> db -> get_where('member',$check_member_array) -> row();
		if(($db_data != null)){
			$this -> db -> get_where('member',array('user_id'=>$check_member_array['user_id']));
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	// member db에서 튜티를 지원한 사람들 전부 끌어오기
	public function get_tutee_list(){
		$user_application_array = array('user_application_subject' => 'tutee');
		$this -> db -> like($user_application_array);
		$this -> db -> from('member');
		return $this -> db -> get() -> result();
	}
	
	public function get_tutor_list(){
		$user_application_array = array('user_application_subject' => 'tutor');
		$this -> db -> like($user_application_array);
		$this -> db -> from('member');
		return $this -> db -> get() -> result();
	}
	
	public function get_count_tutee(){
		$user_application_array = array('user_application_subject' => 'tutee');
		$this -> db -> like($user_application_array);
		$this -> db -> from('member');
		return $this -> db -> count_all_results();
	}
	
	public function get_count_tutor(){
		$user_application_array = array('user_application_subject' => 'tutor');
		$this -> db -> like($user_application_array);
		$this -> db -> from('member');
		return $this -> db -> count_all_results();
	}
	
	public function tutee_grade_up($update_data){
		$this -> db -> where('user_id', $update_data['user_id']);
		return $this -> db -> update('member', $update_data);
	}
	
	public function tutor_grade_up($update_data){
		$this -> db -> where('user_id', $update_data['user_id']);
		return $this -> db -> update('member', $update_data);
	}

	public function select_id($user_id_array){
		return $this -> db -> get_where('member',$user_id_array) -> row_array();
	}
}
?>