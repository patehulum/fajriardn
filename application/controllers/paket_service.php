<?php
	class Paket_service extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
			//checkAksesModule();
			$this->load->library('ssp');
			$this->load->model('model_paket_service');
		}

		function data()
		{
			// nama table
			$table      = 'tbl_paket_service';
			// nama PK
			$primaryKey = 'id_paket_service';
			// list field yang mau ditampilkan
			$columns    = array(
				// array('db' => 'foto', 
				// 	  'dt' => 'foto',
				// 	  'formatter' => function($d) {
				// 	  		return "<img width='20px' src='".base_url()."uploads/user/mekanik/".$d."'>";
				// 	  }
				// ),
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'id_paket_service', 'dt' => 'id_paket_service'),
		        array('db' => 'nama_paket_service', 'dt' => 'nama_paket_service'),
		        array('db' => 'harga_paket_service', 'dt' => 'harga_paket_service'),
		        // array('db' => 'bod', 'dt' => 'bod'),
		        // array('db' => 'alamat', 'dt' => 'alamat'),
		        //untuk menampilkan aksi(edit/delete dengan parameter kode mekanik)
		        array(
						'db' => 'id_paket_service',
						'dt' => 'aksi',
						'formatter' => function($d) {
							return anchor('paket_service/edit/'.$d, '<i class="fa fa-edit" style="margin-right:5px; margin-left:15px"></i>').' 
							'.anchor('paket_service/delete/'.$d,'<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
					}
		        )
		    );
			$sql_details = array(
				'user' => $this->db->username,
				'pass' => $this->db->password,
				'db'   => $this->db->database,
				'host' => $this->db->hostname
		    );
		    echo json_encode(
		     	SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
		     );
		}

		function index()
		{
			$this->template->load('template', 'paket_service/view');
		}

		function add()
		{
			if (isset($_POST['submit'])) {
				$this->model_paket_service->save();
				redirect('paket_service');
			} else {
				$this->template->load('template', 'paket_service/add');
			}
		}

		function edit()
		{
			if (isset($_POST['submit'])) {
				$this->model_customer->update();
				redirect('paket_service');
			} else {
				$id_customer 		= $this->uri->segment(3);
				$data['paket_service'] 	= $this->db->get_where('tbl_paket_service', array('id_paket_service' => $id_paket_service))->row_array();
				$this->template->load('template', 'paket_service/edit', $data);
			}
		}

		function delete()
		{
			$id_paket_service = $this->uri->segment(3);
			if (!empty($id_paket_service)) {
				$this->db->where('id_paket_service', $id_paket_service);
				$this->db->delete('tbl_paket_service');
			}
			redirect('paket_service');
		}
	}
?>