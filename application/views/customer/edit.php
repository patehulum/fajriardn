<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Data Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('cust/edit', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <input type="text" value="<?php echo $customer['id_customer']; ?>" name="id_customer" class="form-control" hidden>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Customer</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $customer['nama_customer']; ?>" name="nama_customer" class="form-control" placeholder="Masukkan Nama Customer">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Plat Kendaraan</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $customer['no_plat']; ?>" name="no_plat" class="form-control" placeholder="Masukkan Harga Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $customer['alamat']; ?>" name="alamat" class="form-control" placeholder="Masukkan Harga Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Handphone</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $customer['handphone']; ?>" name="handphone" class="form-control" placeholder="Masukkan Harga Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

                      <div class="col-sm-1">
                        <button type="submit" name="submit" class="btn btn-primary btn-flat">Simpan</button>
                      </div>

                      <div class="col-sm-1">
                        <?php
                          echo anchor('cust', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
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