<?php
 
	class Model_jadwal extends CI_Model
	{
		
		function jamPelajaran() {
	 		 $jam_pelajaran	= array(
	 		 	'Pilih waktu'	=> 'Pilih waktu',
            	'06.30 - 07.15' => '06.30 - 07.15',
            	'07.15 - 08.00' => '07.15 - 08.00',
            	'08.00 - 08.45' => '08.00 - 08.45',
            	'08.45 - 09.30' => '08.45 - 09.30',
            	'09.45 - 10.30' => '09.45 - 10.30',
            	'10.30 - 11.15' => '10.30 - 11.15',
            	'11.15 - 12.00' => '11.15 - 12.00',
            	'12.30 - 13.15' => '12.30 - 13.15',
            	'13.15 - 14.00' => '13.15 - 14.00',
            	'14.00 - 14.30' => '14.00 - 14.30'
            );
	 		 return $jam_pelajaran;
	 	}

	 	function generateJadwal()
	 	{
	 		$idkurikulum	 = $this->input->post('kurikulum');
			$semester		 = $this->input->post('semester');

			// Mengambil detail data dari kurikulum yang dipilih (tbl_kurikulum_detail)
			$kurikulumDetail = $this->db->get_where('tbl_kurikulum_detail', array('id_kurikulum' => $idkurikulum));

			// Ambil tahun akademik yang aktif
			$tahunakademik 	 = $this->db->get_where('tbl_tahun_akademik', array('is_aktif' => 'Y'))->row_array();

			foreach ($kurikulumDetail->result() as $row) {

				// ambil kelas berdasarkan tingkatan dan jurusan
				$kelasnya = $this->db->get_where('tbl_kelas', array('kd_jurusan' => $row->kd_jurusan, 'kd_tingkatan' => $row->kd_tingkatan));

				foreach ($kelasnya->result() as $row_kelas) {
					$data = array(
						'id_tahun_akademik' => $tahunakademik['id_tahun_akademik'], 
						'semester'			=> $semester,
						'kd_jurusan'		=> $row->kd_jurusan, 
						'kd_tingkatan'		=> $row->kd_tingkatan, //sama seperti kelas di akademik
						'kd_kelas'			=> $row_kelas->kd_kelas, //sama seperti rombel di akademik
						'kd_mapel'			=> $row->kd_mapel, 
						'id_guru'			=> '0', 
						'jam'				=> '', 
						'kd_ruangan'		=> '000', 
						'hari'				=> ''
					);
					$this->db->insert('tbl_jadwal', $data);
				}

			}
	 	}

	}

?>