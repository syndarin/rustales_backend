<?php

class Books extends CI_Model{

	var $title = '';
	var $desc = '';
	var $picture = '';
	var $download_url = '';
	var $process = '';

	function __construct(){
		parent::__construct();
		define("TABLE", "books");
	}

	function getBooks(){
		$this->db->select('id,title,desc,picture,download_url,process');
		return $this->db->get(TABLE)->result();
	}

	function getLastUpdate(){
		$this->db->distinct();
		$this->db->select('updated');
		$result = $this->db->get(TABLE)->result();	
		return $result[0]->updated;
	}

	function insert($savedPicture){
		$this->title        = $this->input->post("title");
		$this->desc         = $this->input->post("desc");
		$this->picture      = $savedPicture;
		$this->download_url = $this->input->post("download_url");
		$this->process      = $this->input->post("process");		

		$this->db->insert(TABLE, $this);
		$this->_updateTimestamp();
	}

	function delete($bookId){
		$params = array();
		$params['id'] = $bookId;
		$this->db->delete(TABLE, $params);
		$this->_updateTimestamp();
	}

	function _updateTimestamp(){
		$params = array();
		$params['updated'] = time();
		$this->db->update(TABLE, $params);
	}

}


?>