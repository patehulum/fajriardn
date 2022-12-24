<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('fpdf.php');
  }
  
  function servicekeluar(){
    $invoicena = $this->uri->segment(3);
    
    $this->db->select('*');
    $this->db->from('tbl_service');
    $this->db->where('no_invoice', $invoicena);
    $query = $this->db->get();

    $platna = $query->row()->no_plat;
    $tanggal = $query->row()->tanggal;
    $id_mekanikna = $query->row()->id_mekanik;
    $catatan = $query->row()->keterangan;
    
    $this->db->select('*');
    $this->db->from('tbl_mekanik');
    $this->db->where('id_mekanik', $id_mekanikna);
    $mekanik = $this->db->get();

    $nama_mekanik = $mekanik->row()->nama_mekanik;

    // var_dump($mekanik);

    $this->db->select('*');
    $this->db->from('tbl_customer');
    $this->db->where('no_plat', $platna);
    $cust = $this->db->get();
    $nama = $cust->row()->nama_customer;

    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16,'C');
    // mencetak string 
    $pdf->Cell(190,7,'BENGKEL MOTOR ZICSPEED',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,10,'INVOICE SERVICE',0,1,'C');

    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,3);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,6,'Nama Customer',0,0);
    $pdf->Cell(35,6,": $nama",0,1);

    $pdf->Cell(35,6,'No. Polisi',0,0);
    $pdf->Cell(35,6,": $platna",0,1);
    
    $pdf->Cell(35,6,'No. Invoice',0,0);
    $pdf->Cell(35,6,": $invoicena",0,1);
    
    $pdf->Cell(35,6,'Tanggal Service',0,0);
    $pdf->Cell(35,6,": $tanggal",0,1);
    
    $pdf->Cell(35,6,'Mekanik',0,0);
    $pdf->Cell(35,6,": $nama_mekanik",0,1);
    
    $pdf->Cell(35,6,'Catatan',0,0);
    $pdf->Cell(35,6,": $catatan",0,1);
    $pdf->Cell(10,7,'',0,1);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(25,6,'Kode',1,0,'C');
    $pdf->Cell(110,6,'Nama Barang',1,0,'C');
    $pdf->Cell(15,6,'Jumlah',1,0,'C');
    $pdf->Cell(30,6,'Biaya',1,1,'C');
    
    $pdf->SetFont('Arial','',10);
    $sum =0;
    foreach($query->result() as $row){
        $biayana = $row->total;
        $pdf->Cell(25,6,$row->kd_barang,1,0);
        $pdf->Cell(110,6,$row->nama_barang,1,0);
        $pdf->Cell(15,6,$row->qty,1,0,'C');
        $pdf->Cell(30,6,"Rp. $biayana",1,1);
        $sum += $biayana;
    }

    $pdf->Cell(150,6,'Total Biaya',0,0,'R');
    $pdf->Cell(30,6,"Rp. $sum",1,1,'L');

    $pdf->Output();
  }
  
  function gajipdf(){
    $id_mekanik = $this->input->post('id_mekanik');
    $tanggal    = $this->input->post('tanggal_service');

    $array = array('id_mekanik' => $id_mekanik, 'tanggal_service' => $tanggal);
    
    $this->db->select('*');
    $this->db->from('tbl_gaji_mekanik');
    $this->db->where('id_mekanik', $id_mekanik);
    $this->db->where('tanggal_service', $tanggal);
    $query = $this->db->get();

    $this->db->select('*');
    $this->db->from('tbl_mekanik');
    $this->db->where('id_mekanik', $id_mekanik);
    $mekanik = $this->db->get();
    $nama = $mekanik->row()->nama_mekanik;
    
    $pdf = new FPDF('l','mm','A5');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16,'C');
    // mencetak string 
    $pdf->Cell(190,7,'BENGKEL MOTOR ZICSPEED',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,10,'SLIP GAJI',0,1,'C');
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,6,'Nama Mekanik',0,0);
    $pdf->Cell(35,6,": $nama",0,1);

    $pdf->Cell(35,6,'Tanggal Service',0,0);
    $pdf->Cell(35,6,": $tanggal",0,1);
    $pdf->Cell(10,7,'',0,1);

    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(35,6,'No Invoice',1,0,'C');
    $pdf->Cell(120,6,'Nama Customer',1,0,'C');
    $pdf->Cell(35,6,'Jumlah Gaji',1,1,'C');

    // var_dump($query);

    $pdf->SetFont('Arial','',10);
    $sum =0;
    foreach($query->result() as $row){
        $gajinya = $row->jumlah_gaji;
        $pdf->Cell(35,6,$row->no_invoice,1,0);
        $pdf->Cell(120,6,$row->nama_cust,1,0);
        $pdf->Cell(35,6,"Rp. $row->jumlah_gaji",1,1);
        $sum += $gajinya;
    }
    
    $pdf->Cell(35,6,'',1,0);
    $pdf->Cell(120,6,'',1,0);
    $pdf->Cell(35,6,'',1,1);

    $pdf->Cell(35,6,'',1,0);
    $pdf->Cell(120,6,'',1,0);
    $pdf->Cell(35,6,'',1,1);

    $pdf->Cell(155,6,'Total Gaji',0,0,'R');
    $pdf->Cell(35,6,"Rp. $sum",1,1,'L');

    $pdf->Output();
  }
}
?>
