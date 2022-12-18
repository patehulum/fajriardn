<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Transaksi service</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

            <!-- button add -->
            <?php
                echo anchor('income/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
            ?>

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>N0. INVOICE</th>
                        <th>NAMA PELANGAN</th>
                        <th>TANGGAL SERVICE</th>
                        <th>NAMA BARANG</th>
                        <th>QTY</th>
                        <th>TOTAL HARGA</th>
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
                "ajax": '<?php echo site_url('income/data'); ?>',
                "order": [[ 1, 'asc' ]],
                "columns": [
                    {
                        data: null,
                        width: '50px',
                        class: 'text-center',
                        orderable: false,
                    },
                    {
                        data: 'no_invoice',
                        width: '150px',
                        class: 'text-center'
                    },
                    {
                        data: 'nama_customer',
                    },
                    { 
                        data: 'tanggal',
                        width: '150px',
                        class: 'text-center'
                    },
                    { 
                        data: 'nama_barang',
                        width: '200px',
                        class: 'text-center'
                    },
                    { 
                        data: 'qty',
                        width: '20px',
                        class: 'text-center'
                    },
                    {
                        data: "total",
                        width: '150px',
                        class: 'text-center',
                        render: function ( data, type, row ) {
                            return 'Rp. '+ data;
                        }
                    },
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