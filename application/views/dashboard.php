<!-- Main content -->
<section class="content">

      <!-- Small boxes (Stat box) -->
      <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo $user['hasil']; ?></h3>

                  <p>Pengguna Sistem</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-badge"></i>
                </div>
                <!--a href="<?php echo site_url('user') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a-->
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo $info['nama_bengkel']; ?></h3>

                  <p>Nama Bengkel</p>
                </div>
                <div class="icon">
                  <i class="fa fa-id-card"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3> <?php echo $info['alamat']; ?></h3>
                  <p>Alamat</p>
                </div>
                <div class="icon">
                  <i class="fa fa-location-arrow"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
               <?php
                  function rupiah($angka)
                  {
	
                    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                    return $hasil_rupiah;
                    
                  
                  }?>
              <div class="small-box bg-green">
                <div class="inner">
                 <h3> <?php echo rupiah($info['saldo']) ; ?></h3>
                  
                  <p>Saldo</p>
                </div>
                <div class="icon">
                  <i class="fa fa-usd"></i>
                </div>
              </div>
            <!-- ./col -->
            </div>

            <!-- ./col -->

      </div>
      <!-- /.row -->

</section>
<!-- /.content -->