<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Form Buat Invoice</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
                echo form_open('income/add', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Plat kendaraan</label>

                      <div class="col-sm-9">
                        <?php
                          echo cmb_dinamis('no_plat', 'tbl_customer', 'no_plat', 'id_customer');
                        ?>
                      </div>
                  </div>

                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal Service</label>

                      <div class="col-sm-9">
                        <!-- <input type="date" name="date1" max=
                        <?php echo date('Y-m-d', strtotime(2006));
                        ?>
                        > -->
                        <input type='text' class="form-control" name='tanggal ' placeholder='Tanggal / Bulan / Tahun' name="tanggal_lahir">
                      </div>
                  </div>

                  <div class="form-group rec-element">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama <span
                              class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="nama[]" id="nama1" alt="1" required="required"
                              class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pekerjaan <span
                              class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="pekerjaan[]" id="pekerjaan1" alt="1" required="required"
                              class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat <span
                              class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" name="alamat[]" id="alamat1" alt="1" required="required"
                              class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  <div class="ln_solid"></div>
                  <div id="nextkolom" name="nextkolom"></div>
                  <button type="button" id="jumlahkolom" value="1" style="display:none"></button>
                  <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <button type="button" class="btn btn-info tambah-form">Tambah Form</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                      </div>
                  </div>


                  <!-- <div class="form-group">
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
                      <label class="col-sm-2 control-label">Gambar Barang</label>

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
                          echo anchor('master_barang', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
                        ?>
                      </div>
                  </div> -->

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

<script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var i = 2;
        $(".tambah-form").on('click', function () {
            row = '<div class="rec-element">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama ' + i + ' <span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-9 col-sm-9 col-xs-12">' +
                '<input type="text" name="nama[]" id="nama' + i + '" alt="' + i + '" required="required" class="form-control col-md-7 col-xs-12">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pekerjaan ' + i + '<span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-9 col-sm-9 col-xs-12">' +
                '<input type="text" name="pekerjaan[]" id="pekerjaan' + i + '" alt="' + i + '" required="required" class="form-control col-md-7 col-xs-12">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat ' + i + ' <span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-9 col-sm-9 col-xs-12"> ' +
                '<div class="input-group">' +
                '<input type="text" name="alamat" id="alamat' + i + '" alt="' + i + '" class="form-control">' +
                '<span class="input-group-btn">' +
                '<button type="button" class="btn btn-warning del-element"><i class="fa fa-minus-square"></i> Hapus</button>' +
                '</span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="ln_solid"></div>' +

                '</div>';
            $(row).insertBefore("#nextkolom");
            $('#jumlahkolom').val(i + 1);
            i++;
        });
        $(document).on('click', '.del-element', function (e) {
            e.preventDefault()
            i--;
            //$(this).parents('.rec-element').fadeOut(400);
            $(this).parents('.rec-element').remove();
            $('#jumlahkolom').val(i - 1);
        });
    });
</script>