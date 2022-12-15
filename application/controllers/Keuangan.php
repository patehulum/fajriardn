<?php
class Keuangan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_keuangan');
    }
    
    
    function index(){
        $this->template->load('template','keuangan/laporan');
    }
    
    function setup(){
        if(isset($_POST['submit'])){
            // proses simpan
            $this->model_keuangan->setup();
            redirect('keuangan/setup');
        }else{
            $data['jenis_pembayaran'] = $this->db->get('tbl_jenis_pembayaran');
            $this->template->load('template','keuangan/setup',$data);
        }
    }
    
    function form(){
        if(isset($_POST['submit'])){
            $this->model_keuangan->pembayaran();
            redirect('keuangan/form');
        }else{

            $this->template->load('template','keuangan/form');
        }
    }
    
    function form_siswa_autocomplate(){
        $nis = $_GET['nis'];
        $sqlSiswa = "SELECT ts.nama as nama_siswa,ts.nis,tj.nama_jurusan,tk.nama_kelas
                    FROM tbl_riwayat_kelas as hk, tbl_siswa as ts, tbl_kelas as tk,tbl_jurusan as tj
                    WHERE ts.nis=hk.nis and tk.kd_kelas=ts.kd_kelas and tk.kd_jurusan=tj.kd_jurusan 
                    and hk.nis='$nis' and hk.id_tahun_akademik=".  get_tahun_akademik_aktif('id_tahun_akademik');
       $siswa = $this->db->query($sqlSiswa)->row_array();
        $data = array(
                    'nama'      =>  $siswa['nama_siswa'],
                    'jurusan'   =>  $siswa['nama_jurusan'],
                    'kelas'     =>  $siswa['nama_kelas']);
         echo json_encode($data);
    }
    
    function load_data_siswa_by_kelas(){
        $kelas = $_GET['kelas'];
        $id_jenis_pembayaran = $_GET['jenis_pembayaran'];
        echo "<table class='table table-striped table-bordered table-hover table-full-width dataTable'>
					<tr>
						<th width=100 class='text-center'>NIS</th>
						<th class='text-center'>NAMA</th>
						<th class='text-center'>Sudah Dibayarkan</th>
					</tr>";
        
        $this->db->where('kd_kelas',$kelas);
        $siswa = $this->db->get('tbl_siswa');
        foreach ($siswa->result() as $row){
            echo "<tr>
                <td class='text-center'>$row->nis</td>
                <td>$row->nama</td>
                <td>Rp. ".$this->__chek_jumlah_yang_sudah_dibayar($row->nis, $id_jenis_pembayaran)."</td></tr>";
        }
        echo"</table>";
    }
    
    function __chek_jumlah_yang_sudah_dibayar($nis,$id_jenis_pembayaran){
        $pembayaran = $this->db->get_where('tbl_pembayaran',array('nis'=>$nis,'id_jenis_pembayaran'=>$id_jenis_pembayaran));
        if($pembayaran->num_rows()>0){
            $row = $pembayaran->row_array();
            return $row['jumlah'];
        }else{
            return 0;
        }
    }
}