<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Mekanik</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open_multipart('mekanik/edit', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">

                  <input type="text" value="<?php echo $mekanik['id_mekanik']; ?>" name="id_mekanik" class="form-control" hidden>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Mekanik</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $mekanik['nama_mekanik']; ?>" name="nama_mekanik" class="form-control" placeholder="Masukkan Nama Mekanik">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $mekanik['bod']; ?>" name="bod" class="form-control" placeholder="Masukkan Tempat, Tanggal Lahir">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Telp</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $mekanik['telp']; ?>" name="telp" class="form-control" placeholder="Masukkan No. Telp">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $mekanik['alamat']; ?>" name="alamat" class="form-control" placeholder="Masukkan Alamat">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>

                      <div class="col-sm-5">
                        <input type="file" name="userfile">
                        <img src="<?php echo base_url()."/uploads/user/mekanik/".$mekanik['foto']; ?>" width="150px">
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