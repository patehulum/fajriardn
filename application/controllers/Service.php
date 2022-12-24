<?php
	class Service extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			if( empty($this->session->userdata('username'))){
				redirect(base_url("auth"));
			}
			//checkAksesModule();
			$this->load->library('ssp');
			$this->load->model('model_service');
			$this->load->model('model_master_barang');
		}

		function data()
		{
			// nama table
			$table      = 'view_service';
			// nama PK
			$primaryKey = 'id_service';
			// list field yang mau ditampilkan
			$columns    = array(
				//tabel db(kolom di database) => dt(nama datatable di view)
				array('db' => 'no_invoice', 'dt' => 'no_invoice'),
				array('db' => 'id_service', 'dt' => 'id_service'),
				array('db' => 'nama_customer', 'dt' => 'nama_customer'),
		        array('db' => 'no_plat', 'dt' => 'no_plat'),
		        array('db' => 'tanggal', 'dt' => 'tanggal'),
		        array('db' => 'kd_barang', 'dt' => 'kd_barang'),
		        array('db' => 'qty', 'dt' => 'qty'),
		        array('db' => 'total', 'dt' => 'total'),
		        array('db' => 'keterangan', 'dt' => 'keterangan'),
		        array('db' => 'nama_barang', 'dt' => 'nama_barang'),
		        //untuk menampilkan aksi(edit/delete dengan parameter kode mekanik)
		        array(
						'db' => 'no_invoice',
						'dt' => 'aksi',
						'formatter' => function($d) {
							return anchor('service/detail/'.$d, '<i class="fa fa-eye" style="margin-right:5px; margin-left:15px"></i>').' 
							'.anchor('service/delete/'.$d,'<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
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
			$this->template->load('template', 'service/view');
		}

        function detail()
		{
			$this->template->load('template', 'service/detail');
		}

		function add()
		{
			if (isset($_POST['submit'])) {
				$this->model_service->save();
				redirect('service');
			} else {
                $data_id['hellow'] = date('dmy-hms') ;
                // var_dump($data_id);
				$this->template->load('template', 'service/add', $data_id);
			}
		}
        
        public function simpan()
        {
			$invoicena = $this->input->post('no_invoice');
			$platna = $this->input->post('no_plat');
			$tanggalna = $this->input->post('tanggal');
			$biaya_service = $this->input->post('biaya_service');
			$id_mekanikna = $this->input->post('id_mekanik');
			$nama_barangna = $this->input->post('kd_barang');

               

			$data = array(
				//tabel di database => name di form
				'no_invoice'	=> $invoicena,
				'no_plat'		=> $platna,
				'tanggal'	    => $tanggalna,
				'kd_barang' 	=> "000",
				'qty' 	        => 1,
				'total' 	    => $biaya_service,
				'keterangan' 	=> $this->input->post('keterangan'),
				'id_mekanik' 	=> $id_mekanikna,
				'nama_barang' 	=> "Barang Lain | Jasa Service",
			);
			$this->db->insert("tbl_service",$data);

			//get nama mekanik bu id_mekanik
			$this->db->select('*');
			$this->db->from('tbl_mekanik');
			$this->db->where('id_mekanik', $id_mekanikna);
			$query = $this->db->get();
			$namamekanikna = $query->row()->nama_mekanik;

			//get nama customer
			$this->db->select('*');
			$this->db->from('tbl_customer');
			$this->db->where('no_plat', $platna);
			$query = $this->db->get();
			$namaorang = $query->row()->nama_customer;

			$persenan_gaji = 60 * $biaya_service / 100;

			//add table gaji mekanik
			$gaji_mekanik = array(
				'id_mekanik'		=> $id_mekanikna,
				'nama_mekanik'		=> $namamekanikna,
				'tanggal_service'	=> $tanggalna,
				'no_invoice'		=> $invoicena,
				'nama_cust'			=> $namaorang,
				'jumlah_gaji'		=> $persenan_gaji,
			);
			$this->db->insert("tbl_gaji_mekanik",$gaji_mekanik);

			$income = $biaya_service;
            $jumlah = count($this->input->post('kd_barang'));
            //print_r($jumlah);die();
            for($i=0;$i<$jumlah;$i++){
                $where = $this->input->post('kd_barang')[$i];
                $qty = $this->input->post('qty')[$i];

                $this->db->select('*');
                $this->db->from('tbl_master_barang');
                $this->db->where('kd_barang', $where);
                $query = $this->db->get();
                $datana = $query->row()->harga_jual;
                $barangna = $query->row()->nama_barang;

                $totalna = $datana * $qty;
				
                $data = array(
                        'no_invoice'	=> $invoicena,
                        'no_plat'		=> $platna,
                        'tanggal'	    => $tanggalna,
                        'kd_barang' 	=> $this->input->post('kd_barang')[$i],
                        'qty' 	        => $this->input->post('qty')[$i],
                        'total' 	    => $totalna,
						'nama_barang' 	  => $barangna,
                    );
                $this->db->insert("tbl_service",$data);

                $stockna = $query->row()->kuantitas;
				$kurangi = $this->input->post('qty')[$i];
				$jumlahna = $stockna -$kurangi;
				$income = $income + $totalna;

				$this->db->set('kuantitas', $jumlahna);
				$this->db->where('kd_barang', $where);
				$this->db->update('tbl_master_barang');

                $barang_out = array(
                        'kd_barang' 	=> $this->input->post('kd_barang')[$i],
                        'nama_barang'	=> $barangna,
                        'tanggal_out'	=> $tanggalna,
                        'invoice_out'	=> $invoicena,
                        'qty_awal'		=> $stockna,
                        'qty_out'		=> $kurangi,
                        'last_qty'		=> $jumlahna,
                    );
                $this->db->insert("tbl_barang_out",$barang_out);
            }

			$this->db->select('*');
			$this->db->from('tbl_info');
			$query = $this->db->get();
			$saldokarang = $query->row()->saldo;

			$saldo = $income + $saldokarang;

			$pemasukan = array(
					'invoice_income' 	=> $invoicena,
					'customer'	=> $namaorang,
					'income_amount'	=> $income,
					'saldo_awal'	=> $saldokarang,
					'saldo_akhir'		=> $saldo,
					'tanggal_income'		=> $tanggalna,
				);
			$this->db->insert("tbl_income",$pemasukan);
		
			$this->db->set('saldo', $saldo);
			$this->db->where('nama_bengkel', 'ZicSpeed');
			$this->db->update('tbl_info');

			$this->db->select('*');
			$this->db->from('tbl_info');
			$query = $this->db->get();
			$saldo_baru = $query->row()->saldo;

			$saldo_terakhir = $saldo_baru - $persenan_gaji;

			//tambah data pengeluaran
			$outcome = array (
				'tanggal_outcome'	=> $tanggalna,
				'keperluan'			=> "Bayar Jasa Service ke $namamekanikna sejumlah RP.$persenan_gaji",
				'outcome_amount'	=> $persenan_gaji,
				'saldo_awal' 		=> $saldo_baru,
				'saldo_akhir' 	  	=> $saldo_terakhir,
			);
			$this->db->insert("tbl_outcome",$outcome);
			
			//set saldo setelah pengeluaran
			$this->db->set('saldo', $saldo_terakhir);
			$this->db->where('nama_bengkel', 'ZicSpeed');
			$this->db->update('tbl_info');

            redirect('service');
        } 

		// function edit()
		// {
		// 	if (isset($_POST['submit'])) {
		// 		$this->model_mekanik->update();
		// 		redirect('mekanik');
		// 	} else {
		// 		$id_mekanik 		= $this->uri->segment(3);
		// 		$data['mekanik'] 	= $this->db->get_where('tbl_mekanik', array('id_mekanik' => $id_mekanik))->row_array();
		// 		$this->template->load('template', 'mekanik/edit', $data);
		// 	}
		// }

        function get_autocomplete(){
            if (isset($_GET['term'])) {
                $result = $this->model_master_barang->search_barang($_GET['term']);
                if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->nama_barang;
                    echo json_encode($arr_result);
                }
            }
        }

		function delete()
		{
			$no_invoice = $this->uri->segment(3);
			if (!empty($no_invoice)) {
                $this->db->where('no_invoice', $no_invoice);
                $this->db->delete('tbl_service');
                // $query = $this->db->get();
			}
			redirect('service');
		}
	}
?>