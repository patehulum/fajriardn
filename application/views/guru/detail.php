<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Guru</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open('guru/edit', 'role="form" class="form-horizontal"');
                echo form_hidden('id_guru', $guru['id_guru']);
            ?>

                <div class="box-body">

                  <div class="form-group">
                      <label class="col-sm-2 control-label">NUPTK</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $guru['nuptk']; ?>" name="nuptk" class="form-control" readonly>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Guru</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $guru['nama_guru']; ?>" name="nama_guru" class="form-control" readonly>
                      </div>
                  </div>


                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Kelamin</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $guru['jenis_kelamin']; ?>" name="nama_guru" class="form-control" readonly>
                      </div>
                  </div>


                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tempat, Tgl Lahir</label>

                      <div class="col-sm-5">
                        <input type="text" value="<?php echo $guru['tempat_lahir']; ?>" name="tempat_lahir" class="form-control" readonly>
                      </div>

                      <div class="col-sm-4">
                        <input type="date" value="<?php echo $guru['tanggal_lahir']; ?>" name="tanggal_lahir" class="form-control"  readonly>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat Rumah</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $guru['alamat_guru']; ?>" name="alamat_guru" class="form-control"  readonly>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Pendidikan Terakhir</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $guru['pendidikan_terakhir']; ?>" name="pendidikan_terakhir" class="form-control"  readonly>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nomor Telp</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $guru['no_telp']; ?>" name="no_telp" class="form-control"  readonly>
                      </div>
                  </div>

                   <div class="form-group">
                      <label class="col-sm-2 control-label">Foto</label>

                      <div class="col-sm-5">
                        <img src="<?php echo base_url()."/uploads/".$guru['foto']; ?>" width="150px" class="img-responsive center-block">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>

                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $guru['status']; ?>" name="alamat_guru" class="form-control" readonly>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label"></label>

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
