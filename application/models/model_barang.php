<?php

	class Model_barang extends CI_Model
	{

		public $table ="tbl_barang";

		function save()
		{
			$data = array(
				//tabel di database => name di form
				'id_barang'		=> $this->input->post('id_barang', TRUE),
				'kode_barang'		=> $this->input->post('kode_barang', TRUE),
				'nama_barang'	=> $this->input->post('nama_barang', TRUE),
				'jumlah_barang' 	=> $this->input->post('jumlah_barang', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
			$data = array(
				'nama_barang' 	=> $this->input->post('nama_barang', TRUE),
				'jumlah_barang' 	=> $this->input->post('jumlah_barang', TRUE),
			);

			$id_barang	= $this->input->post('id_barang');
			$this->db->where('id_barang', $id_barang);
			$this->db->update($this->table, $data);
		}
		
	}

?>
