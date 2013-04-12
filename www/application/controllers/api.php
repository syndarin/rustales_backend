<?php

	class Api extends CI_Controller{

		public function books(){
			$books = $this->db->get("books")->result();
			echo json_encode($books);
		}

	}

?>