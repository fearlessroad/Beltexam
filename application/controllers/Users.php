<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Users extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('user');
		$this->load->model('poke');
	}
	public function index(){
			$this->load->view('index');
	}
	public function register(){
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('alias','Alias','trim|required|is_unique[users.alias]');
		$this->form_validation->set_rules('email','Email','trim|required|is_unique[users.email]|valid_email');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
		$this->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[password]');
		$this->form_validation->set_rules('DOB','Date of Birth','trim|required');

		if ($this->form_validation->run()== FALSE){
			$this->load->view('index');
		}
		else{
			$name = $this->input->post('name');
			$alias = $this->input->post('alias');
			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			$date = date('Y-m-d, H:i:s');
			$DOB = $this->input->post('DOB');
			$data = array($name, $alias, $email, $DOB, $date, $date, $password);
			$this->user->add($data);
			redirect("users/login");
			}
	}
	public function login(){
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$data = array($email, $password);
		$result = $this->user->login($data);
		if(empty($result)){
			$this->session->set_flashdata('errors',"It doesn't look like that email/password combination exists.");
			redirect('/');
		}
		else{
			$this->session->set_userdata('loggedin',true);
			$this->session->set_userdata('id',$result['id']);
			redirect('users/main');
		}
	}
	public function main(){
		if($this->session->userdata()){
			$user = $this->user->getById($this->session->userdata('id'));
			$pokes = $this->poke->getpokes($this->session->userdata('id'));
			// I want to get an array of all the pokers associated with this particular user ID
			$totalPokes = $this->poke->totalPokes($this->session->userdata('id')); 
			$recentPokes = $this->poke->getRecent($this->session->userdata('id'));
			$data = array(
				"user"=>$user,
				"pokes"=>$pokes,
				"totalPokes"=>$totalPokes,
				"recentPokes"=>$recentPokes);
			$this->load->view('main',$data);
		}
		else{
			redirect('/');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
}