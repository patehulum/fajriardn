<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gajipdf extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('fpdf.php');
  }
  
  function index(){
    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16,'C');
    // mencetak string 
    $pdf->Cell(190,7,'BENGKEL MOTOR ZICSPEED',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,20,'DAFTAR SERVICE',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,3);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,6,'no invoice',1,0);
    $pdf->Cell(27,6,'no plat',1,0);
    $pdf->Cell(25,6,'TANGGAL',1,0);
    $pdf->Cell(25,6,'kd barang',1,0);
    $pdf->Cell(25,6,'qty',1,0);
    $pdf->Cell(35,6,'nama barang',1,0);
    $pdf->Cell(25,6,'total harga',1,1);
    $pdf->SetFont('Arial','',10);
    $tbl_service = $this->db->get('tbl_service')->result();
    foreach ($tbl_service as $row){
      $pdf->Cell(35,6,$row->no_invoice,1,0);
      $pdf->Cell(27,6,$row->no_plat,1,0);
      $pdf->Cell(25,6,$row->tanggal,1,0);
      $pdf->Cell(25,6,$row->kd_barang,1,0); 
      $pdf->Cell(25,6,$row->qty,1,0); 
      $pdf->Cell(35,6,$row->nama_barang,1,0); 
      $pdf->Cell(25,6,$row->total,1,1);
    }
    $pdf->Output();
  }
}
?>
