<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Form_m extends CI_Model {

	public function insert($data)
	{
		// $post = $this->input->post(null, TRUE);
		$this->db->insert('tb_permohonan', $data);
	}

}
