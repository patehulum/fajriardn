<?php

  class Model_guru extends CI_Model
  {

    public $table = "tbl_guru";

    function save($foto)
    {
      $data = array(
        //tabel di database => name di form
        'nuptk'         => $this->input->post('nuptk', TRUE),
        'nama_guru'     => $this->input->post('nama_guru', TRUE),
        'jenis_kelamin '=> $this->input->post('jenis_kelamin', TRUE),
        'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
        'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
        'alamat_guru'   => $this->input->post('alamat_guru', TRUE),
        'status'        => $this->input->post('status', TRUE),
        'pendidikan_terakhir'=> $this->input->post('pendidikan_terakhir', TRUE),
        'no_telp'       => $this->input->post('no_telp', TRUE),
        'foto'          => $foto,
        'username'      => $this->input->post('username', TRUE),
        'password'      => md5($this->input->post('password', TRUE)
      ),
      );
      $this->db->insert($this->table, $data);
    }

    function update($foto)
    {
      $data = array(
        //tabel di database => name di form
        'nuptk'         => $this->input->post('nuptk', TRUE),
        'nama_guru'     => $this->input->post('nama_guru', TRUE),
        'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
        'tempat_lahir'  => $this->input->post('tempat_lahir', TRUE),
        'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
        'alamat_guru'   => $this->input->post('alamat_guru', TRUE),
        'status'        => $this->input->post('status', TRUE),
        'pendidikan_terakhir'=> $this->input->post('pendidikan_terakhir', TRUE),
        'no_telp'        => $this->input->post('no_telp', TRUE),
        'foto'      => $foto,
        'username'    => $this->input->post('username', TRUE),
        'password'    => md5($this->input->post('password', TRUE)),
        //'semester_aktif'  = $this->input->post('semester_aktif', TRUE)
      );
      $id_guru = $this->input->post('id_guru');
      $this->db->where('id_guru', $id_guru);
      $this->db->update($this->table, $data);
    }

    function login($username, $password)
    {
      $this->db->where('username', $username);
      $this->db->where('password', md5($password));
      $user = $this->db->get('tbl_guru')->row_array();
      return $user;
    }

  }

?>