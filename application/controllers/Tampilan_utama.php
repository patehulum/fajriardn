<?php
	class Tampilan_utama extends CI_Controller
	{
		function __construct(){
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
		}

		function index()
		{
			$quser = 'SELECT COUNT(*) AS hasil FROM tbl_user';
			$data['user'] = $this->db->query($quser)->row_array();

			$qsiswa = 'SELECT COUNT(*) AS hasil FROM tbl_siswa';
			$data['siswa'] = $this->db->query($qsiswa)->row_array();

			$qguru = 'SELECT COUNT(*) AS hasil FROM tbl_guru';
			$data['guru'] = $this->db->query($qguru)->row_array();

			$qruangan = 'SELECT COUNT(*) AS hasil FROM tbl_ruangan';
			$data['ruangan'] = $this->db->query($qruangan)->row_array();

			$this->template->load('template', 'dashboard', $data);
		}
	}
?>