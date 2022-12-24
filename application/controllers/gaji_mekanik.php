<?php
	class gaji_mekanik extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
			//checkAksesModule();
			$this->load->library('ssp');
			$this->load->model('model_mekanik');
		}

		function data()
		{
			// nama table
			$date = date("Y-m-d");
			$table      = 'tbl_gaji_mekanik';
			// nama PK
			$primaryKey = 'id_gaji';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'id_mekanik', 'dt' => 'id_mekanik'),
		        array('db' => 'nama_mekanik', 'dt' => 'nama_mekanik'),
		        array('db' => 'tanggal_service', 'dt' => 'tanggal_service'),
		        array('db' => 'no_invoice', 'dt' => 'no_invoice'),
		        array('db' => 'nama_cust', 'dt' => 'nama_cust'),
		        array('db' => 'jumlah_gaji', 'dt' => 'jumlah_gaji'),
		        array(
					'db' => 'tanggal_service',
					'dt' => 'aksi',
					'formatter' => function($d) {
						return anchor('gaji_mekanik/getwhere/'.$d, '<i class="fa fa-print" style="color:blue;margin-right:15px"></i>Cetak slip');
					}
		        )
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
			$this->template->load('template', 'gaji_mekanik/view');
		}

		function slip_gaji()
		{
			$this->template->load('template', 'gaji_mekanik/slip');
		}
	}
?>