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
                echo form_open('service/simpan', 'role="form" class="form-horizontal"');
            ?>

                <div class="box-body">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Invoice</label>

                      <div class="col-sm-9">
                        <input type='text' name="no_invoice" value="INV-<?php echo $hellow; ?>" class="form-control" readonly>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Plat kendaraan</label>

                      <div class="col-sm-9">
                        <?php
                          echo cmb_dinamis('no_plat', 'tbl_customer', 'no_plat', 'no_plat');
                        ?>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal Service</label>

                      <div class="col-sm-9">
                        <input type='text' name="tanggal" class="form-control" placeholder="Tahun / Bulan / Tanggal">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kode Jasa Service</label>

                      <div class="col-sm-9">
                        <input type="text" name="kd_service" class="form-control" placeholder="Masukkan kode jasa service">
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Keterangan Jasa Service</label>

                      <div class="col-sm-9">
                        <textarea rows="10" cols="30" name="keterangan" class="form-control" placeholder="keterangan jasa service"></textarea>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Biaya Jasa Service</label>

                      <div class="col-sm-9">
                        <input type="text" name="biaya_service" class="form-control" placeholder="Masukkan biaya jasa service">
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Mekanik</label>

                      <div class="col-sm-9">
                        <?php
                          echo cmb_dinamis('id_mekanik', 'tbl_mekanik', 'nama_mekanik', 'id_mekanik');
                        ?>
                      </div>
                  </div>

                  <div class="form-group rec-element">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kode Barang<span
                              class="required">*</span>
                      </label>
                      <div class="col-md-5 col-sm-5 col-xs-12">
                        <input type="text" name="kd_barang[]" id="kd_barang1" alt="1" required="required" class="form-control col-md-7 col-xs-12" onchange="getqty(this)">
                      </div>
                      
                      <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Stock<span
                              class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                            <div id="stock"></div>
                      </div>
                  </div>

                  <div class="form-group rec-element">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Jumlah Barang<span
                        class="required">*</span>
                      </label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="qty[]" id="qty1" alt="1" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                  </div>
                  
                  <div class="ln_solid"></div>
                  <div id="nextkolom" name="nextkolom"></div>
                  <button type="button" id="jumlahkolom" value="1" style="display:none"></button>
                  <div class="form-group">
                      <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2">
                          <button type="button" class="btn btn-info tambah-form">Tambah Data</button>

                          <?php
                            echo anchor('service', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
                          ?>
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
                  '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kode Barang ' + i + ' <span class="required">*</span>' +
                  '</label>' +
                  '<div class="col-md-5 col-sm-5 col-xs-12">' +
                  '<div>' +
                  '<input type="text" name="kd_barang[]" id="kd_barang'+i+'" alt="' +i+'" required="required" class="form-control" onchange="getqty(this)">' +
                  '</div>' +
                  '</div>' +

                  '<label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Stock<span class="required">*</span></label>' +
                  '<div class="col-md-3 col-sm-3 col-xs-12">' +
                    '<div id="stock"></div>' +
                  '</div>'

                '</div>' +

                '<div class="form-group">' +
                  '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Jumlah Barang ' + i + ' <span class="required">*</span>' +
                  '</label>' +
                  '<div class="col-md-9 col-sm-9 col-xs-12"> ' +
                  '<div class="input-group">' +
                  '<input type="text" name="qty[]" id="qty'+i+'" alt="'+i+'" class="form-control">' +
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

<script>
function getqty(obj) 
  {
    var id = $(obj).val();
    console.log(id);
    $.ajax({
            type:'POST',
            url:"<?php echo site_url('master_barang/getqty');?>",
            data:{'id':id},
            success : function(html) {
                $("#stock").html(html);
                // var kelas   = $("#cbkelas").val();
            }
        });
  }
</script>