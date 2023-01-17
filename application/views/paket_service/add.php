<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Tambah Paket Service</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('paket_service/add', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Paket Service</label>

                      <div class="col-sm-9">
                        <input type="text" name="nama_paket_service" class="form-control" placeholder="Masukkan Nama Paket Service" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Harga Paket Service</label>

                      <div class="col-sm-9">
                        <input type="text" name="harga_paket_service" class="form-control" placeholder="Masukkan Harga Paket Service" required>
                      </div>
                  </div>

                  <!-- <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Kendaraan</label>

                      <div class="col-sm-9">
                        <input type="text" name="jenis_kendaraan" class="form-control" placeholder="Masukkan Jenis Kendaraan" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tahun Kendaraan</label>

                      <div class="col-sm-9">
                        <input type="text" name="th_kendaraan" class="form-control" placeholder="Masukkan Tahun Kendaraan" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat</label>

                      <div class="col-sm-9">
                        <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Handphone</label>

                      <div class="col-sm-9">
                        <input type="text" name="handphone" class="form-control" placeholder="Masukkan Nomer Handphone" required>
                      </div>
                  </div> -->

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('paket_service', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
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