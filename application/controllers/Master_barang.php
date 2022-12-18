<?php
	class Master_barang extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			//checkAksesModule();
			$this->load->library('ssp');
			$this->load->model('model_master_barang');
		}

		function data()
		{
			// nama table
			$table      = 'tbl_master_barang';
			// nama PK
			$primaryKey = 'kd_barang';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'kd_barang', 'dt' => 'kd_barang'),
		        array('db' => 'nama_barang', 'dt' => 'nama_barang'),
		        array('db' => 'harga_barang', 'dt' => 'harga_barang'),
		        array('db' => 'harga_jual', 'dt' => 'harga_jual'),
		        array('db' => 'kuantitas', 'dt' => 'kuantitas'),
		        //untuk menampilkan aksi(edit/delete dengan parameter kode master_barang)
		        array(
						'db' => 'kd_barang',
						'dt' => 'aksi',
						'formatter' => function($d) {
							return anchor('master_barang/plus/'.$d, '<i class="fa fa-plus" style="color:blue;margin-right:15px"></i> |').
                            anchor('master_barang/edit/'.$d, '<i class="fa fa-edit" style="margin-right:5px; margin-left:15px"></i>').' 
							'.anchor('master_barang/delete/'.$d,'<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
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
			$this->template->load('template', 'master_barang/view');
		}

		function add()
		{
			if (isset($_POST['submit'])) {
				$this->model_master_barang->save();
				redirect('master_barang');
			} else {
				$this->template->load('template', 'master_barang/add');
			}
		}

		function edit()
		{
			if (isset($_POST['submit'])) {
				$this->model_master_barang->update();
				redirect('master_barang');
			} else {
				$kd_barang 		= $this->uri->segment(3);
				$data['master_barang'] 	= $this->db->get_where('tbl_master_barang', array('kd_barang' => $kd_barang))->row_array();
				$this->template->load('template', 'master_barang/edit', $data);
			}
		}

		function delete()
		{
			$kode_barang = $this->uri->segment(3);
			if (!empty($kode_barang)) {
				$this->db->where('kd_barang', $kode_barang);
				$this->db->delete('tbl_master_barang');
			}
			redirect('master_barang');
		}
	}
?>