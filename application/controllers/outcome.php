<?php
	class Outcome extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
			//checkAksesModule();
			$this->load->library('ssp');
		}
		
		function data()
		{
			// nama table
			$table      = 'tbl_outcome';
			// nama PK
			$primaryKey = 'id_outcome';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'tanggal_outcome', 'dt' => 'tanggal_outcome'),
				array('db' => 'keperluan', 'dt' => 'keperluan'),
				array('db' => 'outcome_amount', 'dt' => 'outcome_amount'),
				array('db' => 'saldo_awal', 'dt' => 'saldo_awal'),
		        array('db' => 'saldo_akhir', 'dt' => 'saldo_akhir'),
		    );
			$sql_details = array(
				'user' => $this->db->username,
				'pass' => $this->db->password,
				'db'   => $this->db->database,
				'host' => $this->db->hostname
		    );
		    echo json_encode(
		     	SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		     );
		}

		function index()
		{
			$this->template->load('template', 'outcome/view');
		}
	}
?>