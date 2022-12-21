<?php

	class Model_mekanik extends CI_Model
	{

		public $table ="tbl_mekanik";

		function save($foto)
		{
			$data = array(
				//tabel di database => name di form
				'id_mekanik'	=> $this->input->post('id_mekanik', TRUE),
				'nama_mekanik'	=> $this->input->post('nama_mekanik', TRUE),
				'bod' 	=> $this->input->post('bod', TRUE),
				'telp' 	=> $this->input->post('telp', TRUE),
				'alamat' 	=> $this->input->post('alamat', TRUE),
				'foto'			=> $foto
				// 'kuantitas' 	=> $this->input->post('kuantitas', TRUE)
			);
			$this->db->insert($this->table, $data);
		}

		function update($foto)
		{
			if (empty($foto)) {
				$data = array(
					'nama_mekanik' 	=> $this->input->post('nama_mekanik', TRUE),
					'bod' 	=> $this->input->post('bod', TRUE),
					'telp' 	=> $this->input->post('telp', TRUE),
				    'alamat' 	=> $this->input->post('alamat', TRUE),
				);
			} else {
				$data = array(
					'nama_mekanik' 	=> $this->input->post('nama_mekanik', TRUE),
					'bod' 	=> $this->input->post('bod', TRUE),
					'telp' 	=> $this->input->post('telp', TRUE),
				    'alamat' 	=> $this->input->post('alamat', TRUE),
					'foto'			=> $foto
				);
			}
			$id_mekanik	= $this->input->post('id_mekanik', TRUE);
			$this->db->where('id_mekanik', $id_mekanik);
			$this->db->update($this->table, $data);
		}
	}
?>
