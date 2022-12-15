<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Detail Siswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-sm-12" >
                  <img src="<?php echo base_url()."/uploads/".$siswa['foto']; ?>" width="500px" class="img-responsive center-block">
                </div>
                <div class="col-sm-1"></div>
                <div class="col-xs-10" style="object-position: center;">
                <br>
                  <table class="table">
                    <tbody>
                      <tr>
                        <th scope="row">NIS</th>
                        <td><?php echo $siswa['nis']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">NAMA</th>
                        <td><?php echo $siswa['nama']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Tempat, Tgl Lahir</th>
                        <td><?php echo $siswa['tempat_lahir']; ?>, <?php echo $siswa['tanggal_lahir']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Jenis Kelamin</th>
                        <td><?php echo $siswa['jenis_kelamin']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Agama</th>
                        <td>
                          <?php
                           $aVar = mysqli_connect('localhost','root','','skr_nita');
                           $query ="SELECT nama_agama FROM tbl_agama WHERE kd_agama =".$siswa['kd_agama'];
                           $result = mysqli_query($aVar, $query);
                           while($row = mysqli_fetch_array($result)) {
                           echo $row['nama_agama'];}
                          ?>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">Alamat Siswa</th>
                        <td><?php echo $siswa['alamat_siswa']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telpon Siswa</th>
                        <td><?php echo $siswa['no_telp_siswa']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Nama Sekolah Asal</th>
                        <td><?php echo $siswa['sekolah_asal']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Nomor Ijazah</th>
                        <td><?php echo $siswa['no_ijazah']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Nama Ayah</th>
                        <td><?php echo $siswa['nama_ayah']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Nama Ibu</th>
                        <td><?php echo $siswa['nama_ibu']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Alamat Orang Tua</th>
                        <td><?php echo $siswa['alamat_ortu']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">No. Telpon Orang Tua</th>
                        <td><?php echo $siswa['no_telp_ortu']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Kelas</th>
                        <td>
                          <?php
                          $kelas=$siswa['kd_kelas'];
                           $aVar = mysqli_connect('localhost','root','','skr_nita');
                           $query ="SELECT nama_kelas FROM tbl_kelas WHERE kd_kelas = '$kelas' ";
                           $result = mysqli_query($aVar, $query);
                           while($row = mysqli_fetch_assoc($result)) {
                           echo $row['nama_kelas'];}
                          ?>
                        </td>
                      </tr>

                      <tr>
                        <th scope="row">Status Siswa</th>
                        <td><?php echo $siswa['status_siswa']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Username</th>
                        <td><?php echo $siswa['username']; ?></td>
                      </tr>

                      <tr>
                        <th scope="row">Password</th>
                        <td> <?php echo $siswa['password']; ?></td>
                      </tr>

                    </tbody>
                  </table>
                </div>
                <!--div class="col-sm-12">
                  <?php
                    echo anchor('siswa', 'Kembali', array('class'=>'btn btn-danger btn-flat'));
                  ?>
                </div> 
              </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>