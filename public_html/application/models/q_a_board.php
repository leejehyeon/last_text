<?php
class Q_a_board extends CI_Model {

	function __construct() {
		parent::__construct();
	}//__construct()
	
	public function get_board_all($board_type_array,$table='q_a_board',$type='',$offset='',$limit='') {
		$board_type_array = array('board_type' => $board_type_array['board_type']);
		$this -> db -> order_by('board_id', 'desc');
		$this -> db -> limit($limit,$offset);
		$board_list = $this -> db -> get_where('q_a_board', $board_type_array);
		
		if( $type == 'count'){
			$this -> db -> like('board_type',$board_type_array['board_type']);
			$this -> db -> from('q_a_board');
			$result = $this->db->count_all_results();
		
		}else{
			$result = $board_list -> result();
		}
		return $result; 
	}
	
	function get_subject_all_data(){
		return $this -> db -> get('subject') -> result();
	}
	
	public function select_id_list($board_type_array) {
		$this -> db -> get('q_a_board');
		$board_type_array = array('board_type' => $board_type_array['board_type'], 'board_id' => $board_type_array['board_id']);
		return $this -> db -> get_where('q_a_board', $board_type_array) -> row_array();

	}
	
	public function insert_board($board_sign_up_array){
		return $this -> db -> insert('q_a_board',$board_sign_up_array);
	}
	
	public function update_board($board_id_type_array) {
		$this -> db -> get('q_a_board');
		$board_update_array = array('subject' => $board_id_type_array['subject'], 'contents' => $board_id_type_array['contents']);
		$this -> db -> where('board_id', (string)$board_id_type_array['board_id']);
		return $this -> db -> update('q_a_board', $board_update_array);
	}
	
	public function delete_board($board_id_type_array) {
		$this -> db -> where('board_id', (string)$board_id_type_array['board_id']);
		return $this -> db -> delete('q_a_board', $board_id_type_array);
	}
	
	public function update_hit($board_id_type_array) {
		$this -> db -> get('q_a_board');
		$board_type_array = array('board_type' => $board_id_type_array['board_type'],'board_id' => $board_id_type_array['board_id']);
		$get_array = $this -> db -> get_where('q_a_board', $board_type_array) -> row_array();
		$data = array('hits' => $get_array['hits'] + (int)1);
		$this -> db -> where('board_id',(string)$board_id_type_array['board_id']);
		$this -> db -> update('q_a_board', $data);
		return $get_array;
	}
	
}
?>