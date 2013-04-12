<?php

class Admin extends CI_Controller{

	function __construct(){
		session_start();
		parent::__construct();
		define('USERNAME', "admin");
		define('PASSWORD', "admin");
	}

	public function index(){

		if(isset($_SESSION["username"])){
			redirect('main');
		}else{
			$login = $this->input->post('login');
			$password = $this->input->post('password');
		
			if($login==USERNAME && $password==PASSWORD){
				$_SESSION['username'] = USERNAME;
				redirect('main');
			}
		}

		$this->load->view('login');
	}

	public function logout(){
		session_destroy();
		redirect('admin');
	}

}

?>