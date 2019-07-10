<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model { 

	// ADMIN //
	public function admin_userpass($username,$password)
	{
		$pass = md5($password);

		$this->db->where('username',$username);
		$this->db->where('password', $pass);

		$result = $this->db->get('admin');

		if($result->num_rows() == 1)
		{
			return $result->row();
		} 
		else
		{
			return FALSE;
		}
	}
}

