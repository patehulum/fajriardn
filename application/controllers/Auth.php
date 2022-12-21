<?php

	class Auth extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			if( !empty($this->session->userdata('username'))){
				redirect(base_url("tampilan_utama"));
			}
			$this->load->library('session');
			$this->load->model('model_user');
			// $this->load->model('model_guru');
			// $this->load->model('model_siswa');
		}
		
		function index()
		{
			$this->load->view('auth/login');
		}

		function check_login()
		{
			if (isset($_POST['submit'])) {
				$username	= $this->input->post('username');
				$password 	= $this->input->post('password');
				$loginUser		= $this->model_user->login($username, $password);
				// $loginGuru  	= $this->model_guru->login($username, $password);
				// $loginSiswa  	= $this->model_siswa->login($username, $password);
				if (!empty($loginUser)) {
					$this->session->set_userdata($loginUser);
					redirect('tampilan_utama');

				}
				else {
					redirect('auth');
				}
			} else {
				redirect('auth');
			}
		}

		function logout()
		{
			$this->session->unset_userdata($loginUser);
			$this->session->sess_destroy();
			// unset($loginUser);
			redirect('auth');
		}

	}

?>