<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Barang <?php echo $master_barang['nama_barang']; ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('master_barang/plus_data', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Gambar Barang</label>

                      <div class="col-sm-5">
                        <img src="<?php echo base_url()."/uploads/user/barang/".$master_barang['foto']; ?>" width="150px">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kode Barang</label>

                      <div class="col-sm-4">
                        <input type="text" value="<?php echo $master_barang['kd_barang']; ?>" readonly="true" name="kd_barang" class="form-control" placeholder="Masukkan Kode barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama barang</label>

                      <div class="col-sm-4">
                        <input type="text" value="<?php echo $master_barang['nama_barang']; ?>" readonly="true" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Masukkan Jumlah Barang</label>

                      <div class="col-sm-4">
                        <input type="text" value="" name="qty_in" class="form-control" placeholder="Masukkan Jumlah">
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