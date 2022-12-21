<?php
	class Mekanik extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
			//checkAksesModule();
			$this->load->library('ssp');
			$this->load->model('model_mekanik');
		}

		function data()
		{
			// nama table
			$table      = 'tbl_mekanik';
			// nama PK
			$primaryKey = 'id_mekanik';
			// list field yang mau ditampilkan
			$columns    = array(
				array('db' => 'foto', 
					  'dt' => 'foto',
					  'formatter' => function($d) {
					  		return "<img width='20px' src='".base_url()."uploads/user/mekanik/".$d."'>";
					  }
				),
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'id_mekanik', 'dt' => 'id_mekanik'),
		        array('db' => 'nama_mekanik', 'dt' => 'nama_mekanik'),
		        array('db' => 'telp', 'dt' => 'telp'),
		        array('db' => 'bod', 'dt' => 'bod'),
		        array('db' => 'alamat', 'dt' => 'alamat'),
		        //untuk menampilkan aksi(edit/delete dengan parameter kode mekanik)
		        array(
						'db' => 'id_mekanik',
						'dt' => 'aksi',
						'formatter' => function($d) {
							return anchor('mekanik/edit/'.$d, '<i class="fa fa-edit" style="margin-right:5px; margin-left:15px"></i>').' 
							'.anchor('mekanik/delete/'.$d,'<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
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
			$this->template->load('template', 'mekanik/view');
		}

		function add()
		{
			if (isset($_POST['submit'])) {
				$uploadFoto = $this->upload_foto_mekanik();
				$this->model_mekanik->save($uploadFoto);
				redirect('mekanik');
			} else {
				$this->template->load('template', 'mekanik/add');
			}
		}

		function edit()
		{
			if (isset($_POST['submit'])) {
				$uploadFoto = $this->upload_foto_mekanik();
				$this->model_mekanik->update($uploadFoto);
				redirect('mekanik');
			} else {
				$id_mekanik 		= $this->uri->segment(3);
				$data['mekanik'] 	= $this->db->get_where('tbl_mekanik', array('id_mekanik' => $id_mekanik))->row_array();
				$this->template->load('template', 'mekanik/edit', $data);
			}
		}

		function upload_foto_mekanik()
		{
			//validasi foto yang di upload
			$config['upload_path']          = './uploads/user/mekanik/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1024;
            $this->load->library('upload', $config);

            //proses upload
            $this->upload->do_upload('userfile');
            $upload = $this->upload->data();
            return $upload['file_name'];
		}

		function delete()
		{
			$kode_barang = $this->uri->segment(3);
			if (!empty($kode_barang)) {
				$this->db->where('id_mekanik', $kode_barang);
				$this->db->delete('tbl_mekanik');
			}
			redirect('mekanik');
		}
	}
?>