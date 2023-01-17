<?php

	class Model_paket_service extends CI_Model
	{

		public $table ="tbl_paket_service";

		function save()
		{
			$data = array(
				//tabel di database => name di form
				'id_paket_service'		=> $this->input->post('id_paket_service', TRUE),
				'nama_paket_service'		=> $this->input->post('nama_paket_service', TRUE),
				'harga_paket_service' 			=> $this->input->post('harga_paket_service', TRUE),
				// 'jenis_kendaraan' 	=> $this->input->post('jenis_kendaraan', TRUE),
				// 'th_kendaraan' 		=> $this->input->post('th_kendaraan', TRUE),
				// 'alamat' 			=> $this->input->post('alamat', TRUE),
				// 'handphone' 		=> $this->input->post('handphone', TRUE),
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
            $data = array(
                'nama_paket_service' 	=> $this->input->post('nama_paket_service', TRUE),
                'harga_paket_service' 			=> $this->input->post('harga_paket_service', TRUE),
				// 'jenis_kendaraan' 	=> $this->input->post('jenis_kendaraan', TRUE),
				// 'th_kendaraan' 		=> $this->input->post('th_kendaraan', TRUE),
                // 'alamat' 			=> $this->input->post('alamat', TRUE),
                // 'handphone' 		=> $this->input->post('handphone', TRUE),
            );
			$id_pkt	= $this->input->post('id_paket_service', TRUE);
			$this->db->where('id_paket_service', $id_pkt);
			$this->db->update($this->table, $data);
		}
	}
?>
