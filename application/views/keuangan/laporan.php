<section class="content">
    <div class="row">
    
        <div class="col-xs-5">

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Filter Data</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php echo form_open('siswa/export_excel'); ?>
                        <table class="table table-bordered">
                            <tr>
                                <td>Jurusan</td>
                                <td><?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan', null, "id='filter_jurusan' onChange='loadKelas()'") ?> </td>
                            </tr>
                            
                            <tr>
                                <td>Kelas</td>
                                <td><div id="kelas"></div></td>
                            </tr>
                            
                            <tr>
                                <td>Jenis Pembayaran</td>
                                <td><?php echo cmb_dinamis('jenis_pembayaran', 'tbl_jenis_pembayaran', 'nama_jenis_pembayaran', 'id_jenis_pembayaran',null,"id='jenis_bayar' onchange='loadSiswa()'")?></td>
                            </tr>
                            
                            <!--tr>
                                <td><button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Data</button></td>
                            </!--tr-->
                        </table>
                    </form>
                </div>
            </div>
            <!-- end: DYNAMIC TABLE PANEL -->
        </div>

        <div class="col-md-7">
            <!-- start: DYNAMIC TABLE PANEL -->

            <div class="box box-primary">
                <div class="box-header  with-border">
                    <h3 class="box-title">Data Table Siswa</h3>
                </div>
            <!-- /.box-header -->
                <div class="box-body">
                    <div id="dataSiswa"></div>
                </div>
            </div>
        </div>

    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        loadKelas();
    });
</script>

<script type="text/javascript">
    function loadKelas()
    {
        //var tingkatan_kelas = $("#filter_tingkatan").val();
        var jurusan         = $("#filter_jurusan").val();
        
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url() ?>kelas/combobox_kelas',
            data    : 'kd_jurusan='+jurusan,
            success : function(html) {
                $("#kelas").html(html);
                var kelas   = $("#cbkelas").val();
                loadSiswa(kelas);
            }
        })
    }

    function loadSiswa(kelas)
    {   
        var kelas   = $("#cbkelas").val();
        var jenis_bayar = $("#jenis_bayar").val();
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url() ?>keuangan/load_data_siswa_by_kelas',
            data    :'kelas='+kelas+'&jenis_pembayaran='+jenis_bayar,
            success : function(html) {
                $("#dataSiswa").html(html);
            }
        })
    }
</script>
