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
                <tr>
                    <td>Jurusan &amp; Tingkatan</td>
                    <td> : <?php echo "Jurusan".' '.$kelas['nama_jurusan'].' '.$kelas['nama_tingkatan']; ?> (<?php echo $kelas['nama_kelas']; ?>)</td>
                </tr>
                <tr>
                    <td>Mata Pelajaran</td>
                    <td><?php echo $kelas['nama_mapel']?></td>
                </tr>
                </table>
            </div>
            </div>
        </div>

        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Daftar Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="text-center" width="100">NIS</th>
                        <th class="text-center">NAMA SISWA</th>
                        <th class="text-center">Nilai Tugas</th>
                        <th class="text-center">Nilai UTS</th>
                        <th class="text-center">NIlai Uas</th>
                        <th class="text-center">Nilai Akhir</th>
                    </tr>
                    <?php
                        foreach ($siswa as $row) {
                            echo "<tr>
                                    <td class='text-center'>$row->nis</td>
                                    <td>$row->nama</td>
                                    <td width='100'><input type='int' onKeyUp='updateNilaiTugas(\"$row->nis\")' id='nilai_tugas".$row->nis."' value='".check_nilai_tugas($row->nis, $this->uri->segment(3))."' class='form-control'></input></td>
                                    <td width='100'><input type='int' onKeyUp='updateNilaiUts(\"$row->nis\")' id='nilai_uts".$row->nis."' value='".check_nilai_uts($row->nis, $this->uri->segment(3))."' class='form-control'></input></td>
                                    <td width='100'><input type='int' onKeyUp='updateNilaiUas(\"$row->nis\")' id='nilai_uas".$row->nis."' value='".check_nilai_uas($row->nis, $this->uri->segment(3))."' class='form-control'></input></td>
                                    <td width='100'>".check_nilai($row->nis, $this->uri->segment(3))."</td>
                                 </tr>";
                        }
                    ?>
                </thead>

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

<!-- onKeyUp='updateNilai(\"$row->nis\")' -->
<!-- untuk memberikan parameter string di javascript harus diikuti dengan \" \" -->

<script type="text/javascript">
    function updateNilaiTugas(nis)
    {
        var nilai_tugas = $("#nilai_tugas"+nis).val();
        var nilai_uts = $("#nilai_uts"+nis).val();
        var nilai_uas = $("#nilai_uas"+nis).val();
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url(); ?>nilai/update_nilai_tugas',
            data    : 'nis='+nis+'&id_jadwal='+<?php echo $this->uri->segment(3); ?>+'&nilai_tugas='+nilai_tugas+'&nilai_uts='+nilai_uts+'&nilai_uas='+nilai_uas,
            success : function(html) {
                
            }
        })
    }

    function updateNilaiUts(nis)
    {
        var nilai_tugas = $("#nilai_tugas"+nis).val();
        var nilai_uts = $("#nilai_uts"+nis).val();
        var nilai_uas = $("#nilai_uas"+nis).val();
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url(); ?>nilai/update_nilai_uts',
            data    : 'nis='+nis+'&id_jadwal='+<?php echo $this->uri->segment(3); ?>+'&nilai_tugas='+nilai_tugas+'&nilai_uts='+nilai_uts+'&nilai_uas='+nilai_uas,
            success : function(html) {
                
            }
        })
    }

    function updateNilaiUas(nis)
    {
        var nilai_tugas = $("#nilai_tugas"+nis).val();
        var nilai_uts = $("#nilai_uts"+nis).val();
        var nilai_uas = $("#nilai_uas"+nis).val();
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url(); ?>nilai/update_nilai_uas',
            data    : 'nis='+nis+'&id_jadwal='+<?php echo $this->uri->segment(3); ?>+'&nilai_tugas='+nilai_tugas+'&nilai_uts='+nilai_uts+'&nilai_uas='+nilai_uas,
            success : function(html) {
                
            }
        })
    }

   /* function updateNilai(nis)
    {
        var nilai = $("#nilai"+nis).val();
        $.ajax({
            type    : 'GET',
            url     : '<?php echo base_url(); ?>nilai/update_nilai',
            data    : 'nis='+nis+'&id_jadwal='+<?php echo $this->uri->segment(3); ?>+'&nilai='+nilai ,
            success : function(html) {
                
            }
        })
    }*/

</script>