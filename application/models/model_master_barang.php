<?php

	class Model_master_barang extends CI_Model
	{

		public $table ="tbl_master_barang";

		function save()
		{
			$data = array(
				//tabel di database => name di form
				'kd_barang'		=> $this->input->post('kd_barang', TRUE),
				'nama_barang'	=> $this->input->post('nama_barang', TRUE),
				'harga_barang' 	=> $this->input->post('harga_barang', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				'nama_barang' 	=> $this->input->post('nama_barang', TRUE),
				'harga_barang' 	=> $this->input->post('harga_barang', TRUE),
			);

			$kode_barang	= $this->input->post('kd_barang');
			$this->db->where('kd_barang', $kode_barang);
			$this->db->update($this->table, $data);
		}
		
	}

?>
