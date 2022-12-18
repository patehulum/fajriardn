<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Master Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('mekanik/add', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Mekanik</label>

                      <div class="col-sm-9">
                        <input type="text" name="nama_mekanik" class="form-control" placeholder="Masukkan nama mekanik">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>

                      <div class="col-sm-9">
                        <input type="text" name="bod" class="form-control" placeholder="Masukkan Tempat, tanggal lahir">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Telp</label>

                      <div class="col-sm-9">
                        <input type="text" name="telp" class="form-control" placeholder="Masukkan No. Telp">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat</label>

                      <div class="col-sm-9">
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat Mekanik">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>

                      <div class="col-sm-5">
                        <input type="file" name="userfile">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('mekanik', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
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