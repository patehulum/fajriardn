<?php
	class Income extends CI_Controller
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
			$table      = 'tbl_income';
			// nama PK
			$primaryKey = 'id_income';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'invoice_income', 'dt' => 'invoice_income'),
				array('db' => 'customer', 'dt' => 'customer'),
				array('db' => 'income_amount', 'dt' => 'income_amount'),
				array('db' => 'saldo_awal', 'dt' => 'saldo_awal'),
		        array('db' => 'saldo_akhir', 'dt' => 'saldo_akhir'),
		        array('db' => 'tanggal_income', 'dt' => 'tanggal_income'),
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
			$this->template->load('template', 'income/view');
		}
	}
?>