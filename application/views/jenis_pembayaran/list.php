<section class="content">
    <div class="row">
        <div class="col-xs-12">

        <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Jenis Pembayaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

                <?php
                    echo anchor('jenis_pembayaran/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
                ?>
                
                <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                    <thead> 
                        <tr>
                            <th>NO</th>
                            <th>NAMA JENIS PEMBAYARAN</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                </table>
            
            </div>

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
                "ajax": '<?php echo site_url('jenis_pembayaran/data'); ?>',
                "order": [[ 2, 'asc' ]],
                "columns": [
                    {
                        "data": null,
                        "width": "50px",
                        "sClass": "text-center",
                        "orderable": false,
                    },
                    { "data": "nama_jenis_pembayaran" },
                    { "data": "aksi","width": "100px" },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
    </script>