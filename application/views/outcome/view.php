<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Pengeluaran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL PENGELUARAN</th>
                        <th>KEPERLUAN</th>
                        <th>JUMLAH</th>
                        <th>SALDO AWAL</th>
                        <th>SALDO AKHIR</th>
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
                "ajax": '<?php echo site_url('outcome/data'); ?>',
                "order": [[ 1, 'asc' ]],
                "columns": [
                    {
                        data: null,
                        width: '50px',
                        class: 'text-center',
                        orderable: false,
                    },
                    {
                        data: 'tanggal_outcome',
                        width: '200px',
                        class: 'text-center'
                    },
                    { 
                        data: 'keperluan',
                        class: 'text-center'
                    },
                    { 
                        data: 'outcome_amount',
                        width: '100px',
                        class: 'text-center',
                        render: function ( data, type, row ) {
                            return 'Rp. '+ data;
                        }
                    },
                    { 
                        data: 'saldo_awal',
                        width: '100px',
                        class: 'text-center',
                        render: function ( data, type, row ) {
                            return 'Rp. '+ data;
                        }
                    },
                    { 
                        data: 'saldo_akhir',
                        width: '100px',
                        class: 'text-center',
                        render: function ( data, type, row ) {
                            return 'Rp. '+ data;
                        }
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