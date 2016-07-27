<?php 
class Poke extends CI_Model{
	function getpokes($id){
		$query = "SELECT users.name, users.alias, users.email, users.id, count(pokes.pokee_id) as count from pokes
			join users on users.id=pokes.pokee_id AND pokes.pokee_id !=?
			GROUP BY pokes.pokee_id
			order by count desc";
		return $this->db->query($query, array($id))->result_array();
	}
	function addPoke($poker, $pokee){
	// adding poke
		$query = "INSERT INTO pokes(created_at, updated_at, poker_id, pokee_id) 
				VALUES (?,?,?,?)";
		$date = date('Y-m-d, H:i:s');
		$data = array($date, $date, $poker, $pokee);
		return $this->db->query($query,$data);
	}
	function totalPokes($pokee){
		$query = "SELECT COUNT(*) as count FROM pokes where pokes.pokee_id = ?";
		return $this->db->query($query, array($pokee))->row_array();
	}
	function getRecent($id){
		$query = "SELECT users.alias, count(pokes.poker_id) as count from pokes
			join users on users.id=pokes.pokee_id 
			AND pokes.pokee_id=?
			GROUP BY pokes.poker_id
			order by count desc";
		return $this->db->query($query, array($id))->result_array();
	}
}