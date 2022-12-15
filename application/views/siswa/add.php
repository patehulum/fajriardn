<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Siswa</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('siswa/add', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <!--div class="form-group">
                      <label class="col-sm-2 control-label">NIS</label>

                      <div class="col-sm-9">
                        <input type="text" id="number" name="nis" class="form-control" value="0" readonly>
                      </div>
                  </div-->

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama</label>

                      <div class="col-sm-9">
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tempat, Tgl Lahir</label>

                      <div class="col-sm-5">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                      </div>

                      <div class="col-sm-2">
                        <input type="date" name="tanggal_lahir" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Kelamin</label>

                      <div class="col-sm-5">
                        <?php
                          echo form_dropdown('jenis_kelamin', array('Pilih Jenis Kelamin', 'Laki-Laki'=>'Laki-Laki', 'Perempuan'=>'Perempuan'), null, "class='form-control'");
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Agama</label>

                      <div class="col-sm-5">
                        <?php
                          echo cmb_dinamis('agama', 'tbl_agama', 'nama_agama', 'kd_agama');
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat Siswa</label>

                    <div class="col-sm-9">
                        <input type="text" name="alamat_siswa" class="form-control" placeholder="Masukkan Alamat Siswa">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Telp Siswa</label>

                    <div class="col-sm-9">
                        <input type="text" name="no_telp_siswa" class="form-control" placeholder="Masukkan Nomor Telp Siswa">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Sekolah Asal</label>

                    <div class="col-sm-9">
                        <input type="text" name="sekolah_asal" class="form-control" placeholder="Masukkan Nama Sekolah Asal">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Ijazah</label>

                    <div class="col-sm-9">
                        <input type="text" name="no_ijazah" class="form-control" placeholder="Masukkan Nomor Ijazah">
                      </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Ayah</label>

                    <div class="col-sm-9">
                        <input type="text" name="nama_ayah" class="form-control" placeholder="Masukkan Nama Ayah Siswa">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Ibu</label>

                    <div class="col-sm-9">
                        <input type="text" name="nama_ibu" class="form-control" placeholder="Masukkan Nama Ibu Siswa">
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Alamat Orang Tua</label>

                    <div class="col-sm-9">
                        <input type="text" name="alamat_ortu" class="form-control" placeholder="Masukkan Alamat Orang Tua ">
                      </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label">Nomor Telp Orang Tua</label>

                    <div class="col-sm-9">
                        <input type="text" name="no_telp_ortu" class="form-control" placeholder="Masukkan Nomor Telp Orang Tua ">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>

                      <div class="col-sm-5">
                        <input type="file" name="userfile">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kelas Awal</label>

                      <div class="col-sm-5">
                        <?php
                          echo cmb_dinamis('kelas', 'tbl_kelas', 'nama_kelas', 'kd_kelas');
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Status Siswa</label>

                      <div class="col-sm-5">
                        <?php
                          echo form_dropdown('status_siswa', array('Pilih Status', 'Aktif'=>'Aktif', 'Keluar'=>'Keluar', 'Pindah'=>'Pindah', 'Lulus'=>'Lulus'), null, "class='form-control'");
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>

                    <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" placeholder="Masukkan Username">
                      </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" placeholder="Masukkan Password">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" onclick="incrementValue()" value="Increment Value" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('siswa', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
                        ?>
                      </div>
                  </div>

                </div>
                <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<script type="text/javascript">
  function incrementValue()
{
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 0 : value;
    value++;
    document.getElementById('number').value = value;
}
</script>