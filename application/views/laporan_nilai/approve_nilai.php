<section class="content">
    <div class="row">

        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header  with-border">
                <table class="table table-bordered">
                <tr>
                    <td width="200">Tahun Akademik</td>
                    <td> : <?php echo get_tahun_akademik('tahun_akademik'); ?></td>
                </tr>
                <tr>
                    <td>Semester</td>
                    <td> : <?php echo get_tahun_akademik('semester'); ?></td>
                </tr>
                <!--tr>
                    <td>Jurusan &amp; Tingkatan</td>
                    <td> : </?php echo "Jurusan".' '.$kelas['nama_jurusan'].' '.$kelas['nama_tingkatan']; ?> (</?php echo $kelas['nama_kelas']; ?>)</td>
                </tr--> 
                <tr>
                    <td>Jurusan</td>
                    <td>
                        <?php echo cmb_dinamis('jurusan', 'tbl_jurusan', 'nama_jurusan', 'kd_jurusan', null, "id='filter_jurusan' onChange='loadKelas()'") 
                        ?>        
                    </td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>    
                        <div id="kelas"></div>
                    </td>
                    </tr>
                </table>
            </div>
            </div>
        </div>
 
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Cetak Raport Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <div id="approve"></div>

              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>   


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
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url() ?>Laporan_nilai/kepsek',
            data    : 'kd_kelas='+kelas,
            success : function(html) {
                $("#approve").html(html);
            }
        })
    }
</script>