<?php

	class Auth extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			// if( !empty($this->session->userdata('username'))){
			// 	redirect(base_url("tampilan_utama"));
			// }
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
			$array_items = array('username' => '', 'email' => '');
			$this->session->unset_userdata($array_items);
			// $this->session->unset_userdata($loginUser);
			$this->session->sess_destroy();
			// unset($loginUser);
			redirect('auth');
			// $this->load->view('auth/login');
		}

	}

?>