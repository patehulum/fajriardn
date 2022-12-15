<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Guru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open('guru/add', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">NUPTK</label>

                      <div class="col-sm-9">
                        <input type="text" name="nuptk" class="form-control" placeholder="Masukkan NUPTK">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Guru</label>

                      <div class="col-sm-9">
                        <input type="text" name="nama_guru" class="form-control" placeholder="Masukkan Nama Lengkap Guru">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Kelamin</label>

                      <div class="col-sm-5">
                        <?php
                          echo form_dropdown('jenis_kelamin', array('Pilih Jenis Kelamin', 'P'=>'Pria', 'W'=>'Wanita'), null, "class='form-control'");
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tempat, Tgl Lahir</label>

                      <div class="col-sm-5">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                      </div>

                      <div class="col-sm-2">
                        <input type="date" name="tanggal_lahir" name="tanggal_lahir" class="form-control">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat Rumah</label>

                      <div class="col-sm-9">
                        <input type="text" name="alamat_guru" class="form-control" placeholder="Masukan Alamat Rumah">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Pendidikan Terakhir</label>

                      <div class="col-sm-9">
                        <input type="text" name="pendidikan_terakhir" class="form-control" placeholder="Masukan Pendidikan Terakhir">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nomor Telp</label>

                      <div class="col-sm-9">
                        <input type="text" name="no_telp" class="form-control" placeholder="Masukan Nomor Telp">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>

                      <div class="col-sm-5">
                        <input type="file" name="userfile">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>

                      <div class="col-sm-5">
                        <?php
                          echo form_dropdown('status', array('Pilih Status', 'Aktif' => 'Aktif', 'Keluar' => 'Keluar', 'Pensiun' => 'Pensiun'), null, "class='form-control'");
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Username</label>

                      <div class="col-sm-9">
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Password</label>

                      <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('guru', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
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
