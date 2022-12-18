<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Master Barang</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('master_barang/edit', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kode Barang</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $master_barang['kd_barang']; ?>" readonly="true" name="kd_barang" class="form-control" placeholder="Masukkan Kode barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama barang</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $master_barang['nama_barang']; ?>" name="nama_barang" class="form-control" placeholder="Masukkan Nama Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Harga barang</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $master_barang['harga_barang']; ?>" name="harga_barang" class="form-control" placeholder="Masukkan Harga Barang">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Harga Jual</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $master_barang['harga_jual']; ?>" name="harga_jual" class="form-control" placeholder="Masukkan Harga Barang">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Gambar Barang</label>

                      <div class="col-sm-5">
                        <input type="file" name="userfile">
                        <img src="<?php echo base_url()."/uploads/user/barang/".$master_barang['foto']; ?>" width="150px">
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