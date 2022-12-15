<?php
 
	class Laporan_nilai extends CI_Controller
	{
		
		function index()
		{
			$walikelas 		= $this->db->get_where('tbl_walikelas', array('id_guru' => $this->session->userdata('id_guru') ))->row_array();
			$kelas 			= "SELECT tk.nama_kelas, tju.nama_jurusan, tm.nama_mapel, ttk.nama_tingkatan 
							  FROM tbl_jadwal AS tj, tbl_jurusan AS tju,  tbl_kelas AS tk, tbl_mapel AS tm, tbl_tingkatan_kelas AS ttk
							  WHERE tj.kd_jurusan = tju.kd_jurusan AND tj.kd_kelas = tk.kd_kelas AND tj.kd_mapel = tm.kd_mapel AND tj.kd_tingkatan = ttk.kd_tingkatan AND tj.kd_kelas= '".$walikelas['kd_kelas']."'";
			$siswa 			= "SELECT ts.nis, ts.nama, ts.status_siswa
							  FROM tbl_riwayat_kelas AS trk, tbl_siswa AS ts
							  WHERE trk.nis = ts.nis AND trk.kd_kelas = '".$walikelas['kd_kelas']."' 
							  AND trk.id_tahun_akademik = ".get_tahun_akademik('id_tahun_akademik');

			$data['kelas']  = $this->db->query($kelas)->row_array();
			$data['siswa'] 	= $this->db->query($siswa);
			$this->template->load('template', 'Laporan_nilai/list_siswa', $data);
		}

		function kepsek_lihat()
		{
			$this->template->load('template', 'Laporan_nilai/approve_nilai');
		}

		function kepsek()
		{
			$kelas 	= $_GET['kd_kelas'];

			//$walikelas 		= $this->db->get_where('tbl_walikelas', array('id_guru' => $this->session->userdata('id_guru')))->row_array();
			//$approve		= $this->db->get('tbl_walikelas', array('kd_kelas' => ('kd_kelas')))->row_array();
			//$kelas 			= "SELECT tk.nama_kelas, tju.nama_jurusan, tm.nama_mapel, ttk.nama_tingkatan 
							//  FROM tbl_jadwal AS tj, tbl_jurusan AS tju,  tbl_kelas AS tk, tbl_mapel AS tm, tbl_tingkatan_kelas AS ttk
							//  WHERE tj.kd_jurusan = tju.kd_jurusan AND tj.kd_kelas = tk.kd_kelas AND tj.kd_mapel = tm.kd_mapel AND tj.kd_tingkatan = ttk.kd_tingkatan";

			echo "<table class='table table-striped table-bordered table-hover table-full-width dataTable'>
					<tr>
						<th width=200 class='text-center'>NIS</th>
						<th class='text-center'>NAMA</th>
						<th width=180 class='text-center'>Lihat Nilai</th>
						<th width=150 class='text-center'>Status</th>
						<th width=150 class='text-center'>Aksi</th>
					</tr>";
			
			$this->db->select('ts.nis, ts.nama, tn.status');
			$this->db->from('tbl_siswa AS ts');
			$this->db->join('tbl_nilai AS tn', 'ts.nis = tn.nis');
			$this->db->where('kd_kelas', $kelas);
			$this->db->group_by('nis');
			$query = $this->db->get();
			
			foreach ($query->result() as $row) {
				echo "<tr>
						<td class='text-center'>$row->nis</td>
						<td>$row->nama</td>
                        <td class='text-center'>".anchor('siswa/nilai_siswa/'.$row->nis, '<i class="fa fa-eye" aria-hidden="true"></i>')."</td>
						<td class='text-center'>$row->status</td>
						<td class='text-center'>
							".anchor('Laporan_nilai/approve/'.$row->nis, 'Setujui', 'class="btn btn-xs bg-orange" data-placement="top"')."
						</td>
					 </tr>";
			}
			echo "</table>";
		}

		function approve()
		{
			$nis 	= $this->uri->segment(3);
			$sql = " UPDATE `tbl_nilai` SET `status` = 'approve' WHERE `nis` = $nis ";
			$this->db->query($sql);

			//$id_tahunakademik = $this->uri->segment(3);
			//$aktif = $this->db->query($query)->result();
			//$off_all = "UPDATE tbl_tahun_akademik SET is_aktif = 'N' WHERE is_aktif = 'Y'";
			//$off 	 = $this->db->query($off_all);
			//$on 	 = "UPDATE tbl_tahun_akademik SET is_aktif = 'Y' WHERE id_tahun_akademik = '$id_tahunakademik'";
			//$active	 = $this->db->query($on);
			
			redirect('Laporan_nilai/kepsek_lihat');
		}

		function nilai_semester(){
       		// blok query info siswa
	       	$nis = $this->uri->segment(3);
	    	$sqlSiswa = "SELECT ts.nama as nama_siswa, ts.nis, tj.nama_jurusan, tk.nama_kelas, tk.kd_tingkatan
	                    FROM tbl_riwayat_kelas as trk, tbl_siswa as ts, tbl_kelas as tk, tbl_jurusan as tj
	                    WHERE ts.nis=trk.nis and tk.kd_kelas = ts.kd_kelas and tk.kd_jurusan = tj.kd_jurusan 
	                    and trk.nis='$nis' and trk.id_tahun_akademik=".get_tahun_akademik('id_tahun_akademik');
	       	$siswa = $this->db->query($sqlSiswa)->row_array();
			
	        $this->load->library('CFPDF');
	        $pdf = new FPDF('P','mm','A4');
	        $pdf->AddPage();

	        $pdf->Image('assets/dist/img/logos.png',10,10,-300);
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(190,5,'SEKOLAH MENENGAH ATAS',0,1,'C');

	        $pdf->SetFont('Arial','B',14);
	        $pdf->Cell(190,7,'SMA ADI LUHUR JAKARTA',0,1,'C');

	        $pdf->SetFont('Arial','',8);
	        $pdf->Cell(190,5,'Jl. Raya Condet No.4 RT.005 RW.003 Kel. Balekambang, Kec. Kramatjati',0,1,'C');
	        $pdf->Line(10,28,200,28);
	        
	        $pdf->Cell(190,5,'',0,1);
	        
	        $pdf->SetFont('Arial','B',9);
	        // BLOCK INFO SISWA
	        $pdf->Cell(30,5,'NIS',0,0,'L');
	        $pdf->Cell(88,5,': '.$siswa['nis'],0,0,'L');
	        $pdf->Cell(30,5,'KELAS',0,0,'L');
	        $pdf->Cell(40,5,': '.$siswa['nama_kelas'],0,1,'L');
	        
	        $pdf->Cell(30,5,'NAMA',0,0,'L');
	        $pdf->Cell(88,5,': '.$siswa['nama_siswa'],0,0,'L');
	        $pdf->Cell(30,5,'TAHUN AJARAN',0,0,'L');
	        $pdf->Cell(40,5,': '.  get_tahun_akademik('tahun_akademik'),0,1,'L');
	        
	        $pdf->Cell(30,5,'JURUSAN',0,0,'L');
	        $pdf->Cell(88,5,': '.$siswa['nama_jurusan'],0,0,'L');
	        $pdf->Cell(30,5,'SEMESTER',0,0,'L');
	        $pdf->Cell(40,5,': '.  get_tahun_akademik('semester'),0,1,'L');
	        
	        // END BLOCK INFO SISWA
	        
	        
	        // BLOCK NILAI SISWA ------------------------
	        $pdf->Cell(1,10,'',0,1);
	        $pdf->Cell(8,5,'NO',1,0,'C');
	        $pdf->Cell(50,5,'Mata Pelajaran',1,0,'C');
	        $pdf->Cell(10,5,'KKM',1,0,'C');
	        $pdf->Cell(12,5,'Angka',1,0,'C');
	        $pdf->Cell(65,5,'Huruf',1,0,'C');
	        $pdf->Cell(23,5,'Ketercapaian',1,0,'C');
	        $pdf->Cell(20,5,'Rata Kelas',1,1,'C');
	        $pdf->SetFont('Arial','',9);
	        $sqlMapel = "SELECT tj.id_jadwal, tm.nama_mapel, tn.nis
	                FROM tbl_jadwal as tj,tbl_mapel as tm, tbl_nilai as tn
	                WHERE tj.kd_mapel=tm.kd_mapel and tj.id_jadwal=tn.id_jadwal and tn.nis = $nis";
	        $mapel = $this->db->query($sqlMapel)->result();
	        $no=1;
	        foreach ($mapel as $m){
	            $pdf->Cell(8,5,$no,1,0,'L');
	            $pdf->Cell(50,5,$m->nama_mapel,1,0,'L');
	            $pdf->Cell(10,5,75,1,0,'L');
	            $nilai = check_nilai($siswa['nis'], $m->id_jadwal);
	            $pdf->Cell(12,5,  $nilai,1,0,'L');
	            $pdf->Cell(65,5,  Terbilang($nilai),1,0,'L');
	            $pdf->Cell(23,5,  $this->ketercapaian_kopetensi($nilai),1,0,'L');
	            $pdf->Cell(20,5,  ceil($this->rata_rata_nilai($m->id_jadwal)),1,1,'L');
	            $no++;
	    }
	    // END BLOCK NILAI SISWA --------------------------------
	        
			$pdf->Cell(190,5,'',0,1);
			
	        $pdf->Cell(190,5,'',0,1);
	        $pdf->Cell(190, 5, 'Mengetahui,', 0,1,'C');
	        $pdf->Cell(45, 5, 'Wali Kelas', 0,0,'C');
	        $pdf->Cell(100, 5, '', 0,0,'C');
			$pdf->Cell(35, 5, 'Kepala Sekolah', 0,1,'C');

			$image = "assets/dist/img/walkel.png";
			$pdf->Cell( 100, 1, $pdf->Image($image, $pdf->GetX()+5, $pdf->GetY(), 33.78), 0, 1, 'C' );

			$image1 = "assets/dist/img/moch.png";
			$pdf->Cell( 100, 1, $pdf->Image($image1, $pdf->GetX()+145, $pdf->GetY(), 33.78), 0, 1, 'C' );			
			
	        $pdf->Cell(45, 35, 'Nani Suryani. S.Pd', 0,0,'C');
	        $pdf->Cell(100, 35, '', 0,0,'C');
			$pdf->Cell(35, 35, 'Moch Iksan. S.Pd', 0,0,'C');

	       // $pdf->Image('assets/dist/img/moch.png',155,90,-300);

	        $pdf->Output();
	    }

		function nilai_siswa(){
		// blok query info siswa
			//$kd_kelas = $this->session->userdata('kd_kelas');
	       //$nis = $this->uri->segment(3);
			$nis = $this->session->userdata('nis');
	       	$sqlSiswa = "SELECT ts.nama as nama_siswa, ts.nis, tj.nama_jurusan, tk.nama_kelas, tk.kd_tingkatan
	                    FROM tbl_riwayat_kelas as trk, tbl_siswa as ts, tbl_kelas as tk, tbl_jurusan as tj
	                    WHERE ts.nis=trk.nis and tk.kd_kelas = ts.kd_kelas and tk.kd_jurusan = tj.kd_jurusan 
	                    and trk.nis='$nis' and trk.id_tahun_akademik=".get_tahun_akademik('id_tahun_akademik');
	       	$siswa = $this->db->query($sqlSiswa)->row_array();
	       
	        $this->load->library('CFPDF');
	        $pdf = new FPDF('P','mm','A4');
	        $pdf->AddPage();

	        $pdf->Image('assets/dist/img/logos.png',10,10,-300);
	        $pdf->SetFont('Arial','B',12);
	        $pdf->Cell(190,5,'SEKOLAH MENENGAH ATAS',0,1,'C');

	        $pdf->SetFont('Arial','B',14);
	        $pdf->Cell(190,7,'SMA ADI LUHUR JAKARTA',0,1,'C');

	        $pdf->SetFont('Arial','',8);
	        $pdf->Cell(190,5,'Jl. Raya Condet No.4 RT.005 RW.003 Kel. Balekambang, Kec. Kramatjati',0,1,'C');
	        $pdf->Line(10,28,200,28);
	         
	        $pdf->Cell(190,5,'',0,1);
	        
	        $pdf->SetFont('Arial','B',9);
	        // BLOCK INFO SISWA
	        $pdf->Cell(30,5,'NIS',0,0,'L');
	        $pdf->Cell(88,5,': '.$siswa['nis'],0,0,'L');
	        $pdf->Cell(30,5,'KELAS',0,0,'L');
	        $pdf->Cell(40,5,': '.$siswa['nama_kelas'],0,1,'L');
	        
	        $pdf->Cell(30,5,'NAMA',0,0,'L');
	        $pdf->Cell(88,5,': '.$siswa['nama_siswa'],0,0,'L');
	        $pdf->Cell(30,5,'TAHUN AJARAN',0,0,'L');
	        $pdf->Cell(40,5,': '.  get_tahun_akademik('tahun_akademik'),0,1,'L');
	        
	        $pdf->Cell(30,5,'JURUSAN',0,0,'L');
	        $pdf->Cell(88,5,': '.$siswa['nama_jurusan'],0,0,'L');
	        $pdf->Cell(30,5,'SEMESTER',0,0,'L');
	        $pdf->Cell(40,5,': '.  get_tahun_akademik('semester'),0,1,'L');
	        
	        // END BLOCK INFO SISWA
	        
	        
	        // BLOCK NILAI SISWA ------------------------
	        $pdf->Cell(1,10,'',0,1);
	        $pdf->Cell(8,5,'NO',1,0,'C');
	        $pdf->Cell(50,5,'Mata Pelajaran',1,0,'C');
	        $pdf->Cell(10,5,'KKM',1,0,'C');
	        $pdf->Cell(12,5,'Angka',1,0,'C');
	        $pdf->Cell(65,5,'Huruf',1,0,'C');
	        $pdf->Cell(23,5,'Ketercapaian',1,0,'C');
	        $pdf->Cell(20,5,'Rata Kelas',1,1,'C');
	        $pdf->SetFont('Arial','',9);

	       // $sqlMapel = "SELECT ts.nama, tm.nama_mapel, tn.nilai
			//			FROM tbl_nilai AS tn, tbl_jadwal AS tj, tbl_mapel AS tm, tbl_siswa AS ts
			//			WHERE tn.id_jadwal = tj.id_jadwal AND tj.kd_mapel = tm.kd_mapel AND tn.nis = ts.nis AND tn.nis = '$nis'";
	        $sqlMapel = "SELECT tj.id_jadwal, tm.nama_mapel, tn.nis
	                FROM tbl_jadwal as tj,tbl_mapel as tm, tbl_nilai as tn
	                WHERE tj.kd_mapel=tm.kd_mapel and tj.id_jadwal=tn.id_jadwal and tn.nis = $nis";
	        $mapel = $this->db->query($sqlMapel)->result();
	        $no=1;
	        foreach ($mapel as $m){
	            $pdf->Cell(8,5,$no,1,0,'L');
	            $pdf->Cell(50,5,$m->nama_mapel,1,0,'L');
	            $pdf->Cell(10,5,75,1,0,'L');
	            $nilai = approve_nilai($siswa['nis'], $m->id_jadwal);
	            $pdf->Cell(12,5,  $nilai,1,0,'L');
	            $pdf->Cell(65,5,  Terbilang($nilai),1,0,'L');
	            $pdf->Cell(23,5,  $this->ketercapaian_kopetensi($nilai),1,0,'L');
	            $pdf->Cell(20,5,  ceil($this->rata_rata_nilai($m->id_jadwal)),1,1,'L');
	            $no++;
	    }
	    // END BLOCK NILAI SISWA --------------------------------
	        
	        //$pdf->Cell(190,5,'',0,1);
	        //$pdf->Cell(8, 5, 'No', 1,0);
	        //$pdf->Cell(50, 5, 'Pengembangan Diri', 1,0);
	        //$pdf->Cell(10, 5, 'Nilai', 1,0);
	        //$pdf->Cell(66, 5, 'Kepribadian', 1,0);
	        //$pdf->Cell(20, 5, 'Niilai', 1,0);
	        //$pdf->Cell(36, 5, 'Catatan Khusus', 1,1);
	        
	        $pdf->Cell(190,5,'',0,1);
	        $pdf->Cell(190, 5, 'Mengetahui,', 0,1,'C');
	        $pdf->Cell(45, 5, 'Wali Kelas', 0,0,'C');
	        $pdf->Cell(100, 5, '', 0,0,'C');
			$pdf->Cell(35, 5, 'Kepala Sekolah', 0,1,'C');
			
			$image = "assets/dist/img/walkel.png";
			$pdf->Cell( 100, 1, $pdf->Image($image, $pdf->GetX()+5, $pdf->GetY(), 33.78), 0, 1, 'C' );

			$image1 = "assets/dist/img/moch.png";
			$pdf->Cell( 100, 1, $pdf->Image($image1, $pdf->GetX()+145, $pdf->GetY(), 33.78), 0, 1, 'C' );			
			
	        $pdf->Cell(45, 35, 'Nani Suryani. S.Pd', 0,0,'C');
	        $pdf->Cell(100, 35, '', 0,0,'C');
			$pdf->Cell(35, 35, 'Moch Iksan. S.Pd', 0,0,'C');
			
	        $pdf->Output();
	    }
    
	    function rata_rata_nilai($id_jadwal){
	        $sql   =  "SELECT sum(nilai)/count(nis) as nilai_rata_rata FROM tbl_nilai WHERE id_jadwal=$id_jadwal";
	        $nilai = $this->db->query($sql)->row_array();
	        return $nilai['nilai_rata_rata'];
	    }
	    
	    
	    function ketercapaian_kopetensi($nilai){
	        if($nilai>90){
	            return 'Sangat baik';
	        }elseif($nilai>80 and $nilai<=90){
	            return 'Baik';
	        }elseif($nilai>75 and $nilai<=80){
	            return 'Cukup';
	        }else{
	            return "Kurang";
	        }
	    }

	}

?>