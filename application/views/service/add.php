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
                      <label class="col-sm-2 control-label">Pemilik kendaraan</label>

                      <div class="col-sm-9">
                        <?php
                          echo cmb_dinamis_khusus('no_plat', 'tbl_customer', 'nama_customer', 'no_plat', 'no_plat');
                        ?>
                      </div>
                  </div>
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tanggal Service</label>

                      <div class="col-sm-9">
                        <input type='date' name="tanggal" class="form-control" placeholder="Tahun / Bulan / Tanggal">
                      </div>
                  </div>
                  
                  <!-- <div class="form-group">
                      <label class="col-sm-2 control-label">Kode Jasa Service</label>

                      <div class="col-sm-9">
                        <input type="text" name="kd_service" class="form-control" placeholder="Masukkan kode jasa service">
                      </div>
                  </div> -->
                  
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Mekanik</label>

                      <div class="col-sm-9">
                        <?php
                          echo cmb_dinamis('id_mekanik', 'tbl_mekanik', 'nama_mekanik', 'id_mekanik');
                        ?>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Paket Service</label>

                      <div class="col-sm-9">
                        <select class="form-control" name="id_paket_service" id="category" required>
                          <?php $query = $this->db->get('tbl_paket_service'); ?>
                          <option value="">No Selected</option>
                          <?php foreach($query->result() as $row):?>
                          <option value="<?php echo $row->id_paket_service; ?>"><?php echo $row->nama_paket_service; ?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Biaya Jasa Service</label>

                      <div class="col-sm-9">
                        <div id="stock"></div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Keterangan Jasa Service</label>

                      <div class="col-sm-9">
                        <textarea rows="10" cols="30" name="keterangan" class="form-control" placeholder="keterangan jasa service"></textarea>
                      </div>
                  </div>

                  <div class="form-group rec-element">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Kode Barang</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="kd_barang[]" id="kd_barang1" alt="1" class="form-control col-md-7 col-xs-12" onchange="getqty(this)" placeholder="Masukkan kode barang">
                      </div>

                      <!-- <label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Stock<span
                              class="required">*</span>
                      </label>
                      <div class="col-md-3 col-sm-3 col-xs-12">
                            <div id="stock"></div>
                      </div> -->
                  </div>

                  <div class="form-group rec-element">
                      <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Jumlah Barang</label>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="qty[]" id="qty1" alt="1" class="form-control col-md-7 col-xs-12" placeholder="Masukkan jumlah barang">
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
                  '<div class="col-md-9 col-sm-9 col-xs-12">' +
                  '<div>' +
                  '<input type="text" name="kd_barang[]" id="kd_barang'+i+'" alt="' +i+'" required="required" class="form-control">' +
                  '</div>' +
                  '</div>' +

                  // '<label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Stock<span class="required">*</span></label>' +
                  // '<div class="col-md-3 col-sm-3 col-xs-12">' +
                  //   '<div class="stock-na"></div>' +
                  // '</div>' +
                  // '<label class="control-label col-md-1 col-sm-1 col-xs-12" for="first-name">Stock<span class="required">*</span></label>'+
                  //     '<div class="col-md-3 col-sm-3 col-xs-12">'+
                  //          ' <div id="stock"></div>'+
                  //    ' </div>'+

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
  // function getqty(obj)
  $("#category").change(function ()  
  {
    var end = $(this).val();
      $.ajax({
        type:'POST',
        url:"<?php echo site_url('service/get_price');?>",
        data:{'id':end},
        success : function(html) {
          $("#stock").html(html);
        }
      });
  });
</script>

<!-- <script>
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
                
            }
        });
  }
</script> -->