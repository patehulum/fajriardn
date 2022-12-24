<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Table Gaji Mekanik</h3>
            </div>
            <!-- /.box-header -->                
            <div class="box-body">
              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th class="text-center">NAMA MEKANIK</th>
                        <th>TANGGAL SERVICE</th>
                        <th>No. INVOICE</th>
                        <th class="text-center">NAMA CUSTOMER</th>
                        <th>JUMLAH GAJI</th>
                        <!-- <th>AKSI</th> -->
                    </tr>
                </thead>
              </table>
            </div>
            <div class="text-center" style="">
                <a type="button" class="btn btn-success btn-report"  href="<?=base_url('gaji_mekanik/slip_gaji')?>" name="btn_report" style="margin:auto;"><i class="fa fa-file-text" aria-hidden="true"></i> Cetak Slip Gaji</a>
            </div>
            <br><br>
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
                 "ajax": '<?php echo site_url('gaji_mekanik/data'); ?>',
                "order": [[ 1, 'asc' ]],
                "columns": [
                    {
                        data: null,
                        width: '50px',
                        class: 'text-center',
                        orderable: false,
                    },
                    { 
                        data: 'nama_mekanik',
                        width: '150px',
                    },
                    {
                        data: "tanggal_service",
                        width: '150px',
                        class: 'text-center',
                    },
                    {
                        data: "no_invoice",
                        width: '150px',
                        class: 'text-center'
                    },
                    {
                        data: "nama_cust",
                        width: '150px',
                    },
                    { 
                        data: 'jumlah_gaji',
                        width: '100px',
                        class: 'text-center',
                        render: function ( data, type, row ) {
                            return 'Rp. '+$.fn.dataTable.render.number( '.', '.', 0 ).display(data);
                        }
                    },
                    // {
                    //     data: 'aksi',
                    //     width: '80px',
                    //     class: 'text-center'
                    // },
                ]
            } );
               
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
        } );
</script>