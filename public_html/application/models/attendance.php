<?php
class Attendance extends CI_Model {

	function __construct() {
		parent::__construct();
	}//__construct()
	
	/*
	 *  
	 */
	function get_attendance($year, $month){
		$this -> db -> select('date,data');
		$this -> db -> like('date',$year.'-'.$month);
		return $this -> db -> get('attendance') -> result();
	}
	
	function insert_daily($insert_daily_array){
		return $this -> db -> insert('journal_board',$insert_daily_array);
	}
	
	function select_id_list($daily_id_array){
		$daily_board_id_array = array('board_id' => $daily_id_array['reply_id']);
		return $this -> db -> get_where('journal_board', $daily_board_id_array) -> row_array();
	}
	
	function get_all_data($data_data_array){
		$this -> db -> like($data_data_array);
		$this -> db -> from('journal_board');
		$this -> db -> order_by("date", "asc");
		return $this -> db -> get() -> result();
	}
}
?>