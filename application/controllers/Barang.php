<?php

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //checkAksesModule();
        $this->load->library('ssp');
        $this->load->model('model_barang');
    }

    function data()
    {
        // nama table
        $table      = 'tbl_barang';
        // nama PK
        $primaryKey = 'id_barang';
        // list field yang mau ditampilkan
        $columns    = array(
            //tabel db(kolom di database) => dt(nama datatable di view)
            array('db' => 'id_barang', 'dt' => 'id_barang'),
            array('db' => 'kode_barang', 'dt' => 'kode_barang'),
            array('db' => 'nama_barang', 'dt' => 'nama_barang'),
            array('db' => 'jumlah_barang', 'dt' => 'jumlah_barang'),
            // array(
            //         'db' => 'id_barang',
            //         'dt' => 'aksi',
            //         'formatter' => function($d) {
            //             return anchor('barang/edit/'.$d, '<i class="fa fa-edit" style="margin-right:5px"></i>').' 
            //             '.anchor('barang/delete/'.$d, '<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
            //     }
            // ),
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
        $this->template->load('template', 'barang/view');
    }

    function add()
    {
        if (isset($_POST['submit'])) {
            $this->model_barang->save();
            redirect('barang');
        } else {
            $this->template->load('template', 'barang/add');
        }
    }

    function edit()
    {
        if (isset($_POST['submit'])) {
            $this->model_barang->update();
            redirect('barang');
        } else {
            $id_barang     = $this->uri->segment(3);
            $data['barang']  = $this->db->get_where('tbl_barang', array('id_barang' => $id_barang))->row_array();
            $this->template->load('template', 'barang/edit', $data);
        }
    }

    function delete()
    {
        $id_barang = $this->uri->segment(3);
        if (!empty($id_barang)) {
            $this->db->where('id_barang', $id_barang);
            $this->db->delete('tbl_barang');
        }
        redirect('barang');
    }
}
?>