<?php
class Reinforce_model extends CI_Model {
    function __construct(){       
        parent::__construct();
    }//__construct()
    
    public function reinforce_registration($registration_array){
		return $this -> db -> insert('reinforce', $registration_array);
    }
}
?>