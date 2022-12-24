<section class="content">
    <div class="row">
        <div class="col-xs-12">

          <div class="box box-primary">
            <div class="box-header  with-border">
              <h3 class="box-title">Data Table Master Barang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"> 
            
            <!-- button add -->
            <?php
                echo anchor('master_barang/add', '<button class="btn bg-navy btn-flat margin">Tambah Data</button>');
            ?>

              <table id="mytable" class="table table-striped table-bordered table-hover table-full-width dataTable" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>FOTO</th>
                        <th>KODE BARANG</th>
                        <th>NAMA BARANG</th>
                        <th>HARGA BARANG</th>
                        <th>HARGA JUAL</th>
                        <th>KUANTITAS</th>
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
                "ajax": '<?php echo site_url('master_barang/data'); ?>',
                "order": [[ 1, 'asc' ]],
                "columns": [
                    {
                        data: null,
                        width: '50px',
                        class: 'text-center',
                        orderable: false,
                    },
                    { 
                        "data": "foto",
                        "class": "text-center"
                    },
                    {
                        data: 'kd_barang',
                        width: '150px',
                        class: 'text-center'
                    },
                    { 
                        data: 'nama_barang',
                    },
                    {
                        data: "harga_barang",
                        width: '150px',
                        class: 'text-center',
                        render: function ( data, type, row ) {
                            return 'Rp. '+ data;
                        }
                    },
                    {
                        data: "harga_jual",
                        width: '150px',
                        class: 'text-center',
                        render: function ( data, type, row ) {
                            return 'Rp. '+ data;
                        }
                    },
                    {
                        data: "kuantitas",
                        width: '150px',
                        class: 'text-center',
                        render: function ( data, type, row ) {
                            // return data;
                            return '<input type="text" value="'+data+'" style="text-align:center;width:50px" disabled/>';
                        }
                        // }
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