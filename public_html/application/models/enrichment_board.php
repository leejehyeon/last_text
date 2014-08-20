<?php
class enrichment_board extends CI_Model {

	function __construct() {
		parent::__construct();
	}//__construct()
	
	/*
	 *  
	 */
	public function get_board_all($table = 'enrichment_board' , $type ='', $offset='', $limit='') {
		$this -> db -> order_by('board_id', 'desc');
		$this -> db -> limit($limit, $offset);
		$board_list = $this -> db -> get('enrichment_board');
		
		if( $type == 'count'){
			$result = $this -> db -> count_all_results('enrichment_board');
		}else{
			$result = $board_list -> result();
		}
		return $result; 
	}
	
	public function insert_board($board_array){
		return $this -> db -> insert('enrichment_board',$board_array);
	}
	
	public function update_hit($board_id_array) {
		$this -> db -> get('enrichment_board');
		$get_array = $this -> db -> get_where('enrichment_board', $board_id_array) -> row_array();
		$data = array('hits' => $get_array['hits'] + (int)1);
		$this -> db -> where('board_id',(string)$board_id_array['board_id']);
		$this -> db -> update('enrichment_board', $data);
		return $get_array;
	}
	
	public function delete_board($board_id_array){
		$this -> db -> where('board_id',(string)$board_id_array['board_id']);
		return $this -> db -> delete('enrichment_board', $board_id_array);
	}
	
	public function select_id_list($board_id_array){
		return $this -> db -> get_where('enrichment_board',$board_id_array) -> row_array();
	}
	
	public function update_board($board_update_array){
		$this -> db -> get('enrichment_board');
		$this -> db -> where('board_id',(string)$board_update_array['board_id']);
		return $this -> db -> update('enrichment_board', $board_update_array);
	}
}
?>