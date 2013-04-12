<?php

class Books extends CI_Model{

	$title = '';
	$desc = '';
	$picture = '';
	$download_url = '';
	$process = '';

	function __construct(){
		parent::__construct();
		define("TABLE", "books");
	}

	function insert($savedPicture){
		$title = $this->input->post("title");
		$desc = $this->input->post("desc");
		$picture = $savedPicture;
		$download_url = $this->input->post("download_url");
		$process = $this->input->post("process");		

		$this->db->insert(TABLE, $this);
	}

}


?>