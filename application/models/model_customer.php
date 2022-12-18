<?php

	class Model_customer extends CI_Model
	{

		public $table ="tbl_customer";

		function save()
		{
			$data = array(
				//tabel di database => name di form
				'id_customer'	=> $this->input->post('id_customer', TRUE),
				'nama_customer'	=> $this->input->post('nama_customer', TRUE),
				'no_plat' 	=> $this->input->post('no_plat', TRUE),
			);
			$this->db->insert($this->table, $data);
		}

		function update()
		{
            $data = array(
                'nama_customer' 	=> $this->input->post('nama_customer', TRUE),
                'no_plat' 	=> $this->input->post('no_plat', TRUE),
            );
			$id_cust	= $this->input->post('id_customer', TRUE);
			$this->db->where('id_customer', $id_cust);
			$this->db->update($this->table, $data);
		}
	}
?>
