<?php

	class Api extends CI_Controller{

		public function books(){
			$response = array();
			$this->load->model('books');
			$response['data'] = $this->books->getBooks();
			$response['timestamp'] = $this->books->getLastUpdate();
			echo json_encode($response);
		}

	}

?>