<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Paket Service</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- button add -->
            <?php
                echo anchor('paket_service/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
            ?>

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <!-- <th>ID PAKET SERVICE</th> -->
                        <th>NAMA PAKET SERVICE</th>
                        <th>HARGA PAKET SERVICE</th>
                        <!-- <th>No. TELP</th>
                        <th>ALAMAT</th> -->
                        <th>AKSI</th>
                    </tr>
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

<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script>
        $(document).ready(function() {
            var t = $('#mytable').DataTable( {
                "ajax": '<?php echo site_url('paket_service/data'); ?>',
                "order": [[ 1, 'asc' ]],
                "columns": [
                    {
                        data: null,
                        width: '5px',
                        class: 'text-center',
                        orderable: false,
                    },
                    // { 
                    //     "data": "foto",
                    //     "class": "text-center"
                    // },
                    // { 
                    //     data: 'id_paket_service',
                    // },
                    {
                        data: "nama_paket_service",
                        width: '150px',
                        class: 'text-center',
                    },
                    {
                        data: "harga_paket_service",
                        width: '150px',
                        class: 'text-center'
                    },
                    // {
                    //     data: "alamat",
                    //     width: '150px',
                    //     class: 'text-center',
                    // },
                    { 
                        data: 'aksi',
                        width: '80px',
                        class: 'text-center'
                    },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
</script>