<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Username','trim|required');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->user_model->admin_userpass($username,$password);

			if($user)
			{
				$user_data = array(
					'id' => $user->id,
					'username' => $user->username,
					'password' => $user->password,
					'logged_in'=> TRUE
				);

				$this->session->set_userdata($user_data);

			
				redirect('dashboard/dashboard');
			}
			else
			{
				$this->session->set_flashdata('login_failed', 'Incorrect Username & Password.');
				redirect('user/index');
			}
		}
	}

	public function logout()
	{
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('password');
   	$this->session->sess_destroy();

    redirect('user/index');
 	}	
}