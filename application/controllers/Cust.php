<?php
	class Cust extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
			//checkAksesModule();
			$this->load->library('ssp');
			$this->load->model('model_customer');
		}

		function data()
		{
			// nama table
			$table      = 'tbl_customer';
			// nama PK
			$primaryKey = 'id_customer';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'id_customer', 'dt' => 'id_customer'),
		        array('db' => 'nama_customer', 'dt' => 'nama_customer'),
		        array('db' => 'no_plat', 'dt' => 'no_plat'),
		        array('db' => 'alamat', 'dt' => 'alamat'),
		        array('db' => 'handphone', 'dt' => 'handphone'),
		        //untuk menampilkan aksi(edit/delete dengan parameter kode mekanik)
		        array(
						'db' => 'id_customer',
						'dt' => 'aksi',
						'formatter' => function($d) {
							return anchor('cust/edit/'.$d, '<i class="fa fa-edit" style="margin-right:5px; margin-left:15px"></i>').' 
							'.anchor('cust/delete/'.$d,'<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
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
			$this->template->load('template', 'customer/view');
		}

		function add()
		{
			if (isset($_POST['submit'])) {
				$this->model_customer->save();
				redirect('cust');
			} else {
				$this->template->load('template', 'customer/add');
			}
		}

		function edit()
		{
			if (isset($_POST['submit'])) {
				$this->model_customer->update();
				redirect('cust');
			} else {
				$id_customer 		= $this->uri->segment(3);
				$data['customer'] 	= $this->db->get_where('tbl_customer', array('id_customer' => $id_customer))->row_array();
				$this->template->load('template', 'customer/edit', $data);
			}
		}

		function delete()
		{
			$id_customer = $this->uri->segment(3);
			if (!empty($id_customer)) {
				$this->db->where('id_customer', $id_customer);
				$this->db->delete('tbl_customer');
			}
			redirect('cust');
		}
	}
?>