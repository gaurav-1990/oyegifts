<?php
Class Register_model extends CI_Model
{
	public function register($array)
	{
		$this->db->set($array);
		$this->db->insert('tbl_user_reg',$array);
	}
}
?>