<?php

class Main extends CI_Controller{

	public function __construct(){	
		session_start();
      	parent::__construct();
      	if ( !isset($_SESSION['username']) ) {
        	redirect('admin');
      	}

		define("UPLOAD_DIR", "upload/");
		define("USERNAME", "admin");
		define("USERPASS", "admin");
	}

	public function index(){
		$data = array();
		$data['books'] = $this->db->get("books")->result();
		$this->load->view("panel", $data);
	}

	public function getBooksReal(){
		$books = $this->db->get("books")->result();
		echo json_encode($books);
	}

	public function delete(){
		$bookId = $this->uri->segment(3);
		$this->load->model("books");
		$this->books->delete($bookId);
		redirect(base_url() . 'main', 'refresh');
	}

	public function addRecord(){
		$config = array();
        $config['upload_path'] = UPLOAD_DIR;
        $config['allowed_types'] = 'png|jpg';
        $config['max_size'] = '100000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            echo $error['error'];
        }else{
        	$fileData = $this->upload->data();
            $path =  $this->config->base_url(). UPLOAD_DIR . $fileData["file_name"];

	        $this->load->model("books");
	        $this->books->insert($path);
	        redirect('main');
        }
        
	}
}

?>