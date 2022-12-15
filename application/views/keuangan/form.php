<section class="content">
    <div class="row">

        <div class="col-xs-5">

            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Biodata Siswa</h3>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    
                    <?php
                        echo form_open('Keuangan/form');
                    ?>

                    
                    <table class="table table-bordered">
                        <tr>
                            <td>NIS</td>
                            <td>
                                <input name="nis" onkeyup="isi_otomatis()" type="text" id="nis" placeholder="NIS Siswa" class="form-control">       
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td>    
                                <input type="text" id="nama" placeholder="Nama Siswa" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Jurusan</td>
                            <td>    
                                <input type="text" id="jurusan" placeholder="Jurusan" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>    
                                <input type="text" id="kelas" placeholder="Kelas" class="form-control">
                            </td>
                        </tr>
                    </table>

                </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-xs-7">

            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Form Transaksi</h3>
                </div>
                
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered">
                        <tr>
                            <td>Tanggal Pembayaran</td>
                            <td>
                                <input type="date" name="tanggal" placeholder="Tanggal" class="form-control">      
                            </td>
                        </tr>
                        <tr>
                            <td>Jenis Pembayaran</td>
                            <td>    
                                <?php echo cmb_dinamis('jenis_pembayaran', 'tbl_jenis_pembayaran', 'nama_jenis_pembayaran', 'id_jenis_pembayaran')?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Pembayaran</td>
                            <td>    
                                <input type="int" name="jumlah_pembayaran" placeholder="Jumlah" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>    
                                <input type="text" name="keterangan" placeholder="Keterangan Transaksi" class="form-control">
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">SIMPAN TRANSAKSI</button> </<td>
                        </tr>
                    </table>

                    </form>
                </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </div>
    <!-- /.row -->
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script type="text/javascript">
    function isi_otomatis(){
        var nis = $("#nis").val();
        $.ajax({
            url: '<?php echo base_url()?>index.php/keuangan/form_siswa_autocomplate',
            data:"nis="+nis ,
        }).success(function (data) {
            var json = data,
            obj = JSON.parse(json);
            $('#nama').val(obj.nama);
            $('#jurusan').val(obj.jurusan);
            $('#kelas').val(obj.kelas);
        });
    }
</script>

