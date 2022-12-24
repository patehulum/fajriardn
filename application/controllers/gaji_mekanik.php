<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class gaji_mekanik extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
			//checkAksesModule();
    		$this->load->library('fpdf.php');
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

	// 	function print()
	// 	{
	// 		$pdf = new FPDF('l','mm','A5');
	// 		// membuat halaman baru
	// 		$pdf->AddPage();
	// 		// setting jenis font yang akan digunakan
	// 		$pdf->SetFont('Arial','B',16,'C');
	// 		// mencetak string 
	// 		$pdf->Cell(190,7,'BENGKEL MOTOR ZICSPEED',0,1,'C');
	// 		$pdf->SetFont('Arial','B',12);
	// 		$pdf->Cell(190,20,'Cetak Slip Gaji',0,1,'C');
	// 		// Memberikan space kebawah agar tidak terlalu rapat
	// 		$pdf->Cell(10,7,'',0,3);
	// 		$pdf->SetFont('Arial','B',10);
	// 		$pdf->Cell(35,6,'no invoice',1,0);
	// 		$pdf->Cell(27,6,'no plat',1,0);
	// 		$pdf->Cell(25,6,'TANGGAL',1,0);
	// 		$pdf->Cell(25,6,'kd barang',1,0);
	// 		$pdf->Cell(25,6,'qty',1,0);
	// 		$pdf->Cell(35,6,'nama barang',1,0);
	// 		$pdf->Cell(25,6,'total harga',1,1);
	// 		$pdf->SetFont('Arial','',10);
	// 		$tbl_service = $this->db->get('tbl_service')->result();
	// 		foreach ($tbl_service as $row){
	// 			$pdf->Cell(35,6,$row->no_invoice,1,0);
	// 			$pdf->Cell(27,6,$row->no_plat,1,0);
	// 			$pdf->Cell(25,6,$row->tanggal,1,0);
	// 			$pdf->Cell(25,6,$row->kd_barang,1,0); 
	// 			$pdf->Cell(25,6,$row->qty,1,0); 
	// 			$pdf->Cell(35,6,$row->nama_barang,1,0); 
	// 			$pdf->Cell(25,6,$row->total,1,1);
	// 		}
	// 		$pdf->Output();
		
	}
?>