<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('fpdf.php');
    
  }

//   public function barangKeluarManual()
//   {

//     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//     // document informasi
//     $pdf->SetCreator('Bengkel Motor Zicspeed');
//     $pdf->SetTitle('Laporan Data Service');
//     $pdf->SetSubject('Barang Keluar');

//     //header Data
//     $pdf->SetHeaderData('pancasila.png',30,'Laporan Data','Barang Keluar',array(203, 58, 44),array(0, 0, 0));
//     $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));


//     $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
//     $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));

//     $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//     //set margin
//     $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP + 10,PDF_MARGIN_RIGHT);
//     $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//     $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//     $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);

//     //SET Scaling ImagickPixel
//     $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//     //FONT Subsetting
//     $pdf->setFontSubsetting(true);

//     $pdf->SetFont('helvetica','',14,'',true);

//     $pdf->AddPage('L');

//     $html=
//       '<div>
//         <h1 align="center">Invoice Bukti Pengeluaran Barang</h1>
//         <p>No Id Transaksi  :</p>
//         <p>Ditunjukan Untuk :</p>
//         <p>Tanggal          :</p>
//         <p>Po.Customer      :</p>


//         <table border="1">
//           <tr>
//             <th style="width:40px" align="center">No</th>
//             <th style="width:110px" align="center">ID Transaksi</th>
//             <th style="width:110px" align="center">Tanggal Masuk</th>
//             <th style="width:110px" align="center">Tanggal Keluar</th>
//             <th style="width:130px" align="center">Lokasi</th>
//             <th style="width:140px" align="center">Kode Barang</th>
//             <th style="width:140px" align="center">Nama Barang</th>
//             <th style="width:80px" align="center">Satuan</th>
//             <th style="width:80px" align="center">Jumlah</th>
//           </tr>';

//         $html .= '<tr>
//                     <td style="height:180px"></td>
//                     <td  style="height:180px"></td>
//                     <td style="height:180px"></td>
//                     <td style="height:180px"></td>
//                     <td style="height:180px"></td>
//                     <td style="height:180px"></td>
//                     <td style="height:180px"></td>
//                     <td style="height:180px"></td>
//                     <td style="height:180px"></td>
//                  </tr>
//                  <tr>
//                   <td align="center" colspan="8">Jumlah</td>
//                   <td></td>
//                  </tr>';



//         $html .='
//             </table>
//             <h6>Mengetahui</h6><br>
//             <h6>Admin</h6>
//           </div>';

//     $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);

//     $pdf->Output('contoh_report.pdf','I');
//   }

  // public function servicekeluar()
  // {
  //   // $id_service = $this->uri->segment(3);
  //   // $no_invoice = $this->uri->segment(4);
  //   // $no_plat = $this->uri->segment(5);
  //   // $tgl1 = $this->uri->segment(4);
  //   // $tgl2 = $this->uri->segment(5);
  //   // $tgl3 = $this->uri->segment(6);
  //   // $ls   = array('id_invoice' => $id ,'tanggal' => $tgl1.'/'.$tgl2.'/'.$tgl3);
  //   // $data = $this->service->get_data('view',$ls);

  //   function index(){
  //       $pdf = new FPDF('l','mm','A5');
  //       // membuat halaman baru
  //       $pdf->AddPage();
  //       // setting jenis font yang akan digunakan
  //       $pdf->SetFont('Arial','B',16);
  //       // mencetak string 
  //       $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUSAN NEEGRI 2 LANGSA',0,1,'C');
  //       $pdf->SetFont('Arial','B',12);
  //       $pdf->Cell(190,7,'DAFTAR SISWA KELAS IX JURUSAN REKAYASA PERANGKAT LUNAK',0,1,'C');
  //       // Memberikan space kebawah agar tidak terlalu rapat
  //       $pdf->Cell(10,7,'',0,1);
  //       $pdf->SetFont('Arial','B',10);
  //       $pdf->Cell(20,6,'NIM',1,0);
  //       $pdf->Cell(85,6,'NAMA MAHASISWA',1,0);
  //       $pdf->Cell(27,6,'NO HP',1,0);
  //       $pdf->Cell(25,6,'TANGGAL LHR',1,1);
  //       $pdf->SetFont('Arial','',10);
  //       $mahasiswa = $this->db->get('mahasiswa')->result();
  //       foreach ($mahasiswa as $row){
  //           $pdf->Cell(20,6,$row->nim,1,0);
  //           $pdf->Cell(85,6,$row->nama_lengkap,1,0);
  //           $pdf->Cell(27,6,$row->no_hp,1,0);
  //           $pdf->Cell(25,6,$row->tanggal_lahir,1,1); 
  //       }
  //       $pdf->Output();
  //   }
  // }
  function servicekeluar(){
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
    $pdf->Cell(35,6,'no_invoice',1,0);
    $pdf->Cell(27,6,'no plat',1,0);
    $pdf->Cell(25,6,'TANGGAL',1,0);
    $pdf->Cell(25,6,'kd barang',1,0);
    $pdf->Cell(25,6,'qty',1,1);
    $pdf->SetFont('Arial','',10);
    $tbl_service = $this->db->get('tbl_service')->result();
    foreach ($tbl_service as $row){
        $pdf->Cell(35,6,$row->no_invoice,1,0);
        $pdf->Cell(27,6,$row->no_plat,1,0);
        $pdf->Cell(25,6,$row->tanggal,1,0);
         $pdf->Cell(25,6,$row->kd_barang,1,0); 
         $pdf->Cell(25,6,$row->qty,1,1); 
  
}
    $pdf->Output();
}
}
?>
