<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">
                <div class="box-header  with-border">
                <h3 class="box-title">Ubah Data Jenis Pembayaran</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <?php
                    echo form_open('jenis_pembayaran/edit', 'role="form" class="form-horizontal"');
                    echo form_hidden('id_jenis_pembayaran', $jenis_pembayaran['id_jenis_pembayaran']);
                    ?>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">
                                MATA JENIS
                            </label>
                            <div class="col-sm-9">
                                <input type="text" value="<?php echo $jenis_pembayaran['nama_jenis_pembayaran'];?>" name="nama_jenis_pembayaran" placeholder="MASUKAN NAMA MAPEL" id="form-field-1" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="form-field-1">

                            </label>
                            <div class="col-sm-1">
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN</button>
                            </div>
                            <div class="col-sm-1">
                                <?php echo anchor('jenis_pembayaran', 'Kembali', array('class' => 'btn btn-info btn-sm')); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>