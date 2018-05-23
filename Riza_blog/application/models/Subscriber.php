<?php


class Subscriber extends CI_Model{

	public function new_sub()
	{
		$data = array(
			'email' => $this->input->post('email')
		);
		$this->db->insert('subscriber', $data);
	}

}