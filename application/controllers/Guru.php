<?php

  class Guru extends CI_Controller
  {
    
    function __construct()
    {
      parent::__construct();
      //checkAksesModule();
      $this->load->library('ssp');
      $this->load->model('model_guru');
    }

    function data()
    {

      // nama table
      $table      = 'tbl_guru';
      // nama PK
      $primaryKey = 'id_guru';
      // list field yang mau ditampilkan
      $columns    = array(
            //tabel db(kolom di database) => dt(nama datatable di view)
            array('db' => 'id_guru', 'dt' => 'id_guru'),
            array('db' => 'nuptk', 'dt' => 'nuptk'),
            array('db' => 'nama_guru', 'dt' => 'nama_guru'),
            array('db' => 'foto', 
                  'dt' => 'foto',
                  'formatter' => function($d) {
                  return "<img width='20px' src='".base_url()."/uploads/".$d."'>";}
            ),
            array(
                'db' => 'jenis_kelamin',
                'dt' => 'jenis_kelamin',
                'formatter' => function($d) {
                  //Apabila $d bernilai P maka akan menampilkan 'Pria' apabila bernilai selain P akan menampilkan 'Wanita'
                  return $d == 'P' ? 'Pria' : 'Wanita';
                }
              ),
            //untuk menampilkan aksi(edit/delete dengan parameter id guru)
            array(
                  'db' => 'id_guru',
                  'dt' => 'aksi',
                  'formatter' => function($d) {
                      return anchor('guru/detail/'.$d, '<i class="fa fa-eye" style="margin-right:5px"></i>').'
                      '.anchor('guru/edit/'.$d, '<i class="fa fa-edit" style="margin-right:5px"></i>').' 
                      '.anchor('guru/delete/'.$d, '<i class="fa fa-times" style="color:red"></i>',array('onclick' => "return confirm('Do you want delete this record')") );
                }
              ),            
              array('db' => 'status', 'dt' => 'status')
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
      $this->template->load('template', 'guru/view');
    }

    function add()
    {
      if (isset($_POST['submit'])) {
        $uploadFoto = $this->upload_foto_guru();
        $this->model_guru->save($uploadFoto);
        redirect('guru');
      } else {
        $this->template->load('template', 'guru/add');
      }
    }

    function edit()
    {
      if (isset($_POST['submit'])) {
        $uploadFoto = $this->upload_foto_guru();
        $this->model_guru->update($uploadFoto);
        redirect('guru');
      } else {
        $id_guru     = $this->uri->segment(3);
        $data['guru']  = $this->db->get_where('tbl_guru', array('id_guru' => $id_guru))->row_array();
        $this->template->load('template', 'guru/edit', $data);
      }
    }

    function delete()
    {
      $id_guru = $this->uri->segment(3);
      if (!empty($id_guru)) {
        $this->db->where('id_guru', $id_guru);
        $this->db->delete('tbl_guru');
      }
      redirect('guru');
    }

    function detail()
    {
      $id_guru       = $this->uri->segment(3);
      $data['guru'] = $this->db->get_where('tbl_guru', array('id_guru' => $id_guru))->row_array();
      $this->template->load('template', 'guru/detail', $data);
    }


    function upload_foto_guru()
    {
      //validasi foto yang di upload
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 1024;
      $this->load->library('upload', $config);

            //proses upload
            $this->upload->do_upload('userfile');
            $upload = $this->upload->data();
            return $upload['file_name'];
    }

  }

?>