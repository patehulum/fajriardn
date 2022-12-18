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

			$qinfo = 'SELECT * FROM tbl_info';
			$data['info'] = $this->db->query($qinfo)->row_array();

			$this->template->load('template', 'dashboard', $data);
		}
	}
?>