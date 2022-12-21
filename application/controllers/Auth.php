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
				// elseif (!empty($loginGuru)) {
				// 	$sessionGuru = array(
				// 			'nama_lengkap'   => $loginGuru['nama_guru'],
				// 			'id_level_user'  => 3,
				// 			'id_guru'		 => $loginGuru['id_guru'],
				// 			'status'		 => $loginGuru['status']
				// 	);
				// 	$this->session->set_userdata($sessionGuru);

				// 	if ($loginGuru['status'] == "Aktif")
				// 	{
				// 		redirect('tampilan_utama');
				// 	} else {
				// 		echo "<script>
				// 		alert('Tidak dapat Log In, Anda sudah tidak Aktif!')
				// 		window.location ='".base_url('Auth')."'
				// 		</script>";
				// 	}
					
				// } 
				// elseif (!empty($loginSiswa)) {
				// 	$sessionSiswa = array(
				// 			'nama_lengkap'   => $loginSiswa['nama'],
				// 			'id_level_user'  => 5,
				// 			'nis'			 => $loginSiswa['nis'], 
				// 			'kd_kelas'		 => $loginSiswa['kd_kelas']
				// 	);
				// 	$this->session->set_userdata($sessionSiswa);
				// 	redirect('tampilan_utama');
				// }
				else {
					redirect('auth');
				}
			} else {
				redirect('auth');
			}
		}

		function logout()
		{
			$this->session->sess_destroy();
			redirect('auth/login');
		}

	}

?>