<?php
	class Outcome extends CI_Controller
	{
		function __construct()
		{
			parent::__construct();
			//checkAksesModule();
			$this->load->library('ssp');
			$this->load->model('model_gaji_mekanik');
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
							return anchor('income/detail/'.$d, '<i class="fa fa-eye" style="margin-right:5px; margin-left:15px"></i>').' 
							'.anchor('income/delete/'.$d,'<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
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
			$this->template->load('template', 'gaji_mekanik/view');
		}
		
        function detail()
		{
			$this->template->load('template', 'gaji_mekanik/detail');
		}

		function add()
		{
			if (isset($_POST['submit'])) {
				$this->model_service->save();
				redirect('outcome');
			} else {
                $data_id['hellow'] = date('dmy-hms') ;
                // var_dump($data_id);
				$this->template->load('template', 'gaji_mekanik/add', $data_id);
			}
		}
        
        public function simpan()
        {
			$data = array(
				//tabel di database => name di form
				'no_invoice'	=> $this->input->post('no_invoice'),
				'no_plat'		=> $this->input->post('no_plat'),
				'tanggal'	    => $this->input->post('tanggal'),
				'kd_barang' 	=> $this->input->post('kd_service'),
				'qty' 	        => 1,
				'total' 	    => $this->input->post('biaya_service'),
				'keterangan' 	=> $this->input->post('keterangan'),
			);
			$this->db->insert("tbl_service",$data);
            
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

                // var_dump($datana->harga_jual);
                $data = $datana * $qty;
                // var_dump($data);
                // $total = 10000;
                $data = array(
                        'no_invoice'	=> $this->input->post('no_invoice'),
                        'no_plat'		=> $this->input->post('no_plat'),
                        'tanggal'	    => $this->input->post('tanggal'),
                        'kd_barang' 	=> $this->input->post('kd_barang')[$i],
                        'qty' 	        => $this->input->post('qty')[$i],
                        'total' 	    => $data,
                    );
                $this->db->insert("tbl_service",$data);
            }
            redirect('outcome');
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
			redirect('outcome');
		}
	}
?>