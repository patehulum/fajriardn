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
                echo form_open('master_barang/add', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kode Barang</label>

                      <div class="col-sm-9">
                        <input type="text" name="kd_barang" class="form-control" placeholder="Masukkan Kode Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Barang</label>

                      <div class="col-sm-9">
                        <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Harga Barang</label>

                      <div class="col-sm-9">
                        <input type="text" name="harga_barang" class="form-control" placeholder="Masukkan Harga Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Harga Jual</label>

                      <div class="col-sm-9">
                        <input type="text" name="harga_jual" class="form-control" placeholder="Masukkan Harga Jual Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('master_barang', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
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