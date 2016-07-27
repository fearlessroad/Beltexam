<?php 
class User extends CI_Model{
	function add($data){
		$query = "INSERT INTO users (name, alias, email, DOB, created_at, updated_at, password) VALUES (?,?,?,?,?,?,?)";
		return $this->db->query($query, $data);
	}
	function login($data){
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		return $this->db->query($query, $data)->row_array();
	}
	function getById($id){
		$query = "SELECT * FROM users WHERE id=?";
		return $this->db->query($query, array($id))->row_array();
	}
}