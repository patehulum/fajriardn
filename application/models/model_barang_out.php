<?php

	class Model_master_barang extends CI_Model
	{

		public $table ="tbl_barang_out";

		function save($foto)
		{
			$data = array(
				//tabel di database => name di form
				'kd_barang'		=> $this->input->post('kd_barang', TRUE),
				'nama_barang'	=> $this->input->post('nama_barang', TRUE),
				'tanggal_out'	=> $this->input->post('tanggal_out', TRUE),
				'invoice_out' 	=> $this->input->post('invoice_out', TRUE),
				'qty_awal' 	=> $this->input->post('qty_awal', TRUE),
				'qty_out' 	=> $this->input->post('qty_out', TRUE),
				'last_qty' 	=> $this->input->post('last_qty', TRUE),
				// 'kuantitas' 	=> $this->input->post('kuantitas', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

        function search_barang($title){
			$this->db->like('nama_barang', $title , 'both');
			$this->db->order_by('nama_barang', 'ASC');
			$this->db->limit(10);
			return $this->db->get('barang')->result();
		}
		function update($foto)
		{
			if (empty($foto)) {
				$data = array(
					'nama_barang' 	=> $this->input->post('nama_barang', TRUE),
					'harga_barang' 	=> $this->input->post('harga_barang', TRUE),
					'harga_jual' 	=> $this->input->post('harga_jual', TRUE),
				);
			} else {
				$data = array(
					'nama_barang' 	=> $this->input->post('nama_barang', TRUE),
					'harga_barang' 	=> $this->input->post('harga_barang', TRUE),
					'harga_jual' 	=> $this->input->post('harga_jual', TRUE),
					'foto'			=> $foto
				);
			}
			$kode_barang	= $this->input->post('kd_barang', TRUE);
			$this->db->where('kd_barang', $kode_barang);
			$this->db->update($this->table, $data);
		}
	}
?>
