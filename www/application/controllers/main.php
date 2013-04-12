<?php

class Main extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(array('url'));
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
            $path =  dirname($this->config->base_url())."/". UPLOAD_DIR . $fileData["file_name"];

	        $this->load->model("books");
	        $this->books->insert($path);
	        redirect(base_url() . 'main', 'refresh');
        }
        
	}

	public function _remap($method, $params = array()) {
        if ($this->session->userdata('user_name') != null) {
            call_user_func(array($this, $method), $params);
        } else {
            if (isset($_POST["login"]) && isset($_POST["password"])) {
                $login = $this->input->post("login");
                $password = $this->input->post("password");

                if ($login==USERNAME && $password==USERPASS) {
                	$this->session->set_userdata('user_name', USERNAME);
                    redirect(base_url() . 'main', 'refresh');
                } else {
                    call_user_func(array($this, 'load_user_authentification_form'));
                }
            } else {
                call_user_func(array($this, 'load_user_authentification_form'));
            }
        }
    }

    public function load_user_authentification_form(){
    	$this->load->view("login");
    }

    public function logoff() {
        $this->session->unset_userdata('user_name');
        $this->session->sess_destroy();
        redirect(base_url() . 'main', 'refresh');
    }

}

?>