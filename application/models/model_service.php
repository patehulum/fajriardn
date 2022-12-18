<?php

	class Model_service extends CI_Model
	{

		public $table ="tbl_service";

		function save()
		{
			$data = array(
				//tabel di database => name di form
				'id_service'    => $this->input->post('id_service', TRUE),
				'no_plat'	    => $this->input->post('no_plat', TRUE),
				'tanggal' 	    => $this->input->post('tanggal', TRUE),
				'kd_barang' 	=> $this->input->post('kd_barang', TRUE),
				'qty' 	        => $this->input->post('qty', TRUE),
				'total' 	    => $this->input->post('total', TRUE),
				'keterangan' 	=> $this->input->post('keterangan', TRUE),
				// 'kuantitas' 	=> $this->input->post('kuantitas', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		// function update()
		// {
        //     $data = array(
        //         'no_plat' 	=> $this->input->post('no_plat', TRUE),
        //         'tanggal' 	=> $this->input->post('tanggal', TRUE),
        //         'telp' 	=> $this->input->post('telp', TRUE),
        //         'alamat' 	=> $this->input->post('alamat', TRUE),
        //     );
		// 	$kode_barang	= $this->input->post('kd_barang', TRUE);
		// 	$this->db->where('kd_barang', $kode_barang);
		// 	$this->db->update($this->table, $data);
		// }
	}
?>
