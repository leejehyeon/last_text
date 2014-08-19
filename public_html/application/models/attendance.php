<?php
class Attendance extends CI_Model {

	function __construct() {
		parent::__construct();
	}//__construct()
	
	/*
	 *  
	 */
	function get_attendance($year, $month,$user_id){
		$this -> db -> select('date,attendance');
		$this -> db -> like('date',$year.'-'.$month);
		return $this -> db -> get_where('attendance_record',array('user_id' => $user_id)) -> result();
	}
	
	function insert_daily($insert_daily_array){
		return $this -> db -> insert('journal_board',$insert_daily_array);
	}
	
	function select_id_list($daily_id_array){
		$daily_board_id_array = array('board_id' => $daily_id_array['reply_id']);
		return $this -> db -> get_where('journal_board', $daily_board_id_array) -> row_array();
	}
	function get_all_data_count(){
		return $this->db->count_all('journal_board');
	}
	
	function get_all_data($data_data_array){
		$this -> db -> like($data_data_array);
		$this -> db -> from('journal_board');
		$this -> db -> order_by("date", "asc");
		return $this -> db -> get() -> result();
	}
	
	function get_subject($data_get_subject){
		$this -> db -> like($data_get_subject);
		$this -> db -> from('subject');
		return $this -> db -> get() -> row_array();
	}
	
	function get_subject_all_data(){
		return $this -> db -> get('subject') -> result();
	}
	
	function get_data_id_date($data_update_by_date){
		return $this -> db -> get_where('journal_board',$data_update_by_date) -> row_array();
	}

	function update_daily($update_daily_array,$user_id_array){
		$this -> db -> where(array('board_id' => $user_id_array['board_id']));
		return $this -> db -> update('journal_board',$update_daily_array);
	}
	
	function insert_data($subject_array){
		return $this -> db -> insert('attendance_record',$subject_array);
	}
	
	function get_date_list($subject_array){
		return $this -> db -> get('attendance_record');
	}
	
	function get_date_data(){
		return $this -> db -> get('attendance_record') -> result();
	}
	
	function get_data_by_date($bydate){
		$this -> db -> like('date',$bydate);
		$this -> db -> from('attendance_record');
		return $this -> db -> get() -> result();
	}
}
?>