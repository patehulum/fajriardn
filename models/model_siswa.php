<?php

	class Model_siswa extends CI_Model
	{

		public $table ="tbl_siswa";

		function save($foto)
		{
			$data = array(
				//tabel di database => name di form
				//'nis'           => $this->input->post('nis', TRUE),
				'nama'          => $this->input->post('nama', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat_siswa'  => $this->input->post('alamat_siswa', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
				'nama_ayah' 	=> $this->input->post('nama_ayah', TRUE),
				'nama_ibu' 		=> $this->input->post('nama_ibu', TRUE),
				'alamat_ortu'  	=> $this->input->post('alamat_ortu', TRUE),
				'no_telp_ortu' 	=> $this->input->post('no_telp_ortu', TRUE),
				'no_telp_siswa' => $this->input->post('no_telp_siswa', TRUE),
				'no_ijazah'     => $this->input->post('no_ijazah', TRUE),
				'sekolah_asal'	=> $this->input->post('sekolah_asal', TRUE),
				'kd_agama'	    => $this->input->post('agama', TRUE),
				'foto'			=> $foto,
				'kd_kelas'	    => $this->input->post('kelas', TRUE),
				'status_siswa'	=> $this->input->post('status_siswa', TRUE),
				'username'		=> $this->input->post('username', TRUE),
				'password'		=> md5($this->input->post('password', TRUE))
			);
			$this->db->insert($this->table, $data);
   			$insertId = $this->db->insert_id();

			//$db->query('SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'skr_nita' AND TABLE_NAME = 'tbl_siswa'');
			//$query = $db->query('SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'skr_nita' AND TABLE_NAME = 'tbl_siswa';');
			//$sql = SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'skr_nita' AND TABLE_NAME = 'tbl_siswa';
			//$query = $this->db->query('SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'skr_nita' AND TABLE_NAME = 'tbl_siswa';');
			
			// ketika pengguna menginsert data siswa, maka data nis, kd_kelas dan tahun_akademik_aktif akan otomatis terinsert dengan sendirinya ke tbl_riwayat_kelas
			$tahun_akademik = $this->db->get_where('tbl_tahun_akademik', array('is_aktif' => 'Y'))->row_array();
			$riwayat = array(
							'nis' 				=> $insertId,
							'kd_kelas'			=> $this->input->post('kelas', TRUE),
							'id_tahun_akademik'	=> $tahun_akademik['id_tahun_akademik']
						); 
			$this->db->insert('tbl_riwayat_kelas', $riwayat);
		}

		function update($foto)
		{
			if (empty($foto)) {
				//update tanpa foto
				$data = array(
				'nis'           => $this->input->post('nis', TRUE),
				'nama'          => $this->input->post('nama', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat_siswa'  => $this->input->post('alamat_siswa', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
				'nama_ayah' 	=> $this->input->post('nama_ayah', TRUE),
				'nama_ibu' 		=> $this->input->post('nama_ibu', TRUE),
				'alamat_ortu'  	=> $this->input->post('alamat_ortu', TRUE),
				'no_telp_ortu' 	=> $this->input->post('no_telp_ortu', TRUE),
				'no_telp_siswa' => $this->input->post('no_telp_siswa', TRUE),
				'no_ijazah'     => $this->input->post('no_ijazah', TRUE),
				'sekolah_asal'	=> $this->input->post('sekolah_asal', TRUE),
				'kd_agama'	    => $this->input->post('agama', TRUE),
				'kd_kelas'	    => $this->input->post('kelas', TRUE),
				'status_siswa'	=> $this->input->post('status_siswa', TRUE),
				'username'		=> $this->input->post('username', TRUE),
				'password'		=> md5($this->input->post('password', TRUE)),
				);
			} else {
				//update dengan foto
				$data = array(
				'nis'           => $this->input->post('nis', TRUE),
				'nama'          => $this->input->post('nama', TRUE),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'alamat_siswa'  => $this->input->post('alamat_siswa', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
				'nama_ayah' 	=> $this->input->post('nama_ayah', TRUE),
				'nama_ibu' 		=> $this->input->post('nama_ibu', TRUE),
				'alamat_ortu'  	=> $this->input->post('alamat_ortu', TRUE),
				'no_telp_ortu' 	=> $this->input->post('no_telp_ortu', TRUE),
				'no_telp_siswa' => $this->input->post('no_telp_siswa', TRUE),
				'no_ijazah'     => $this->input->post('no_ijazah', TRUE),
				'sekolah_asal'	=> $this->input->post('sekolah_asal', TRUE),
				'kd_agama'	    => $this->input->post('agama', TRUE),
				'foto'			=> $foto,
				'kd_kelas'	    => $this->input->post('kelas', TRUE),
				'status_siswa'	=> $this->input->post('status_siswa', TRUE),
				'username'		=> $this->input->post('username', TRUE),
				'password'		=> md5($this->input->post('password', TRUE)),
				);
			}
			$nis	= $this->input->post('nis');
			$this->db->where('nis', $nis);
			$this->db->update($this->table, $data);
		}

		function login($username, $password)
	    {
		    $this->db->where('username', $username);
		    $this->db->where('password', md5($password));
		    $user = $this->db->get('tbl_siswa')->row_array();
		    return $user;
	    }

		// Fungsi untuk melakukan proses upload file
	  	public function upload_csv($filename){
		    $this->load->library('upload'); // Load librari upload
		    
		    $config['upload_path'] = './csv/';
		    $config['allowed_types'] = 'csv';
		    $config['max_size']  = '2048';
		    $config['overwrite'] = true;
		    $config['file_name'] = $filename;
		  
		    $this->upload->initialize($config); // Load konfigurasi uploadnya
		    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
		      // Jika berhasil :
		      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
		      return $return;
		    }else{
		      // Jika gagal :
		      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		      return $return;
		    }
		}
	  
		// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
		public function insert_multiple($data){
		    $this->db->insert_batch('tbl_siswa', $data);
		}

	}
	
?>
