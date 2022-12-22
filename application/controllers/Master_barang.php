<?php
	class Master_barang extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
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
				array('db' => 'foto', 
					  'dt' => 'foto',
					  'formatter' => function($d) {
					  		return "<img width='20px' src='".base_url()."uploads/user/barang/".$d."'>";
					  }
				),
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
							if ($d !== '000'){
								return anchor('master_barang/plus/'.$d, '<i class="fa fa-plus" style="color:blue;margin-right:15px"></i> |').
								anchor('master_barang/edit/'.$d, '<i class="fa fa-edit" style="margin-right:5px; margin-left:15px"></i>').' 
								'.anchor('master_barang/delete/'.$d,'<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
							}
							else{
								return anchor('master_barang/edit/'.$d, '<i class="fa fa-edit" style="margin-right:5px; margin-left:15px"></i>').' 
								'.anchor('master_barang/delete/'.$d,'<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
							}
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
				$uploadFoto = $this->upload_foto_barang();
				$this->model_master_barang->save($uploadFoto);
				redirect('master_barang');
			} else {
				$this->template->load('template', 'master_barang/add');
			}
		}
		
		function out_data(){
			
			// nama table
			$table      = 'tbl_barang_out';
			// nama PK
			$primaryKey = 'id_out';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'kd_barang', 'dt' => 'kd_barang'),
				array('db' => 'nama_barang', 'dt' => 'nama_barang'),
		        array('db' => 'tanggal_out', 'dt' => 'tanggal_out'),
		        array('db' => 'invoice_out', 'dt' => 'invoice_out'),
		        array('db' => 'qty_awal', 'dt' => 'qty_awal'),
		        array('db' => 'qty_out', 'dt' => 'qty_out'),
		        array('db' => 'last_qty', 'dt' => 'last_qty'),
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

		function in_data(){
			
			// nama table
			$table      = 'tbl_barang_in';
			// nama PK
			$primaryKey = 'id_in';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'kd_barang', 'dt' => 'kd_barang'),
				array('db' => 'nama_barang', 'dt' => 'nama_barang'),
		        array('db' => 'tanggal_in', 'dt' => 'tanggal_in'),
		        array('db' => 'qty_awal', 'dt' => 'qty_awal'),
		        array('db' => 'qty_in', 'dt' => 'qty_in'),
		        array('db' => 'last_qty', 'dt' => 'last_qty'),
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

		function out()
		{
			$this->template->load('template', 'master_barang/out');
		}

		function in()
		{
			$this->template->load('template', 'master_barang/in');
		}

		function edit()
		{
			if (isset($_POST['submit'])) {
				$uploadFoto = $this->upload_foto_barang();
				$this->model_master_barang->update($uploadFoto);
				redirect('master_barang');
			} else {
				$kd_barang 		= $this->uri->segment(3);
				$data['master_barang'] 	= $this->db->get_where('tbl_master_barang', array('kd_barang' => $kd_barang))->row_array();
				$this->template->load('template', 'master_barang/edit', $data);
			}
		}

		function upload_foto_barang()
		{
			//validasi foto yang di upload
			$config['upload_path']          = './uploads/user/barang/';
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
				$this->db->where('kd_barang', $kode_barang);
				$this->db->delete('tbl_master_barang');
			}
			redirect('master_barang');
		}
		

		function plus()
		{
			$kd_barang = $this->uri->segment(3);
			$data['master_barang'] 	= $this->db->get_where('tbl_master_barang', array('kd_barang' => $kd_barang))->row_array();
			$this->template->load('template', 'master_barang/plus', $data);

		}

		function plus_data()
		{
			$kode_barang = $this->input->post('kd_barang');
			$barangna = $this->input->post('nama_barang');
			$jumlahna = $this->input->post('qty_in');
			$tanggalna = date('y-m-d');

			$this->db->select('*');
			$this->db->from('tbl_master_barang');
			$this->db->where('kd_barang', $kode_barang);
			$query = $this->db->get();

			$hargana = $query->row()->harga_barang;
			$stockna = $query->row()->kuantitas;

			$lastqty = $stockna + $jumlahna;
			$pitih = $jumlahna * $hargana;
			
			$this->db->select('*');
			$this->db->from('tbl_info');
			$query = $this->db->get();
			$saldokarang = $query->row()->saldo;

			$siso = $saldokarang - $pitih;

			$data = array(
				//tabel di database => name di form
				'kd_barang'		=> $kode_barang,
				'nama_barang'	=> $barangna,
				'tanggal_in'	=> $tanggalna,
				'qty_awal' 		=> $stockna,
				'qty_in' 	  	=> $jumlahna,
				'last_qty' 	    => $lastqty,
			);
			$this->db->insert("tbl_barang_in",$data);
			
			$this->db->set('kuantitas', $lastqty);
			$this->db->where('kd_barang', $kode_barang);
			$this->db->update('tbl_master_barang');

			$outcome = array (
				'tanggal_outcome'	=> $tanggalna,
				'keperluan'			=> "Beli $barangna $jumlahna Pcs",
				'outcome_amount'	=> $pitih,
				'saldo_awal' 		=> $saldokarang,
				'saldo_akhir' 	  	=> $siso,
			);
			$this->db->insert("tbl_outcome",$outcome);
			
			$this->db->set('saldo', $siso);
			$this->db->where('nama_bengkel', 'ZicSpeed');
			$this->db->update('tbl_info');

			redirect('master_barang');
		}

		public function getqty() 
		{
			$id = $this->input->post('id',true);
			$data	= $this->db->get_where('tbl_master_barang', array('kd_barang' => $id))->row();
			// var_dump($data->kuantitas);
			
			// $kuantitas = $data->kuantitas;
			// echo "<input type='text' name='kuantitas' value='$kuantitas' class='form-control col-md-7 col-xs-12'>";
			if ($data){
				$kuantitas = $data->kuantitas;
				echo "<input type='text' name='kuantitas' value='$kuantitas' class='form-control col-md-7 col-xs-12'>";
			}
			else{
				echo "<input type='text' name='kuantitas' value='Kode barang tidak ditemukan' class='form-control col-md-7 col-xs-12' style='color:red'>";
			}
			// exit;
		}
	}
?>