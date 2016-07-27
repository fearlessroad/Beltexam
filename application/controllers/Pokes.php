<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Pokes extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->model('poke');
	}
	public function addPoke($pokee){
	$poker = $this->session->userdata('id');
	$this->poke->addpoke($poker, $pokee);
	redirect('users/main');
	}
	public function getPokeHistory()
}