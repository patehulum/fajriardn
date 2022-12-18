/*====================== file crud.php =======================*/
<div class="">
    <div class="page-title">
        <div class="title_right">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                <h3>
                    <?php echo (!empty($title)?$title:'');?>
                </h3>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    <br>
                    <form id="demo" data-parsley-validate="" class="form-horizontal form-label-left" method="POST"
                        action="<?php echo base_url('datapegawai/simpan');?>">
                        <div class="form-group rec-element">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="nama[]" id="nama1" alt="1" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pekerjaan <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="pekerjaan[]" id="pekerjaan1" alt="1" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="alamat[]" id="alamat1" alt="1" required="required"
                                    class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div id="nextkolom" name="nextkolom"></div>
                        <button type="button" id="jumlahkolom" value="1" style="display:none"></button>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="button" class="btn btn-info tambah-form">Tambah Form</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        var i = 2;
        $(".tambah-form").on('click', function () {
            row = '<div class="rec-element">' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Nama ' + i + ' <span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-6 col-sm-6 col-xs-12">' +
                '<input type="text" name="nama[]" id="nama' + i + '" alt="' + i + '" required="required" class="form-control col-md-7 col-xs-12">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Pekerjaan ' + i + '<span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-6 col-sm-6 col-xs-12">' +
                '<input type="text" name="pekerjaan[]" id="pekerjaan' + i + '" alt="' + i + '" required="required" class="form-control col-md-7 col-xs-12">' +
                '</div>' +
                '</div>' +
                '<div class="form-group">' +
                '<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Alamat ' + i + ' <span class="required">*</span>' +
                '</label>' +
                '<div class="col-md-6 col-sm-6 col-xs-12"> ' +
                '<div class="input-group">' +
                '<input type="text" name="alamat" id="alamat' + i + '" alt="' + i + '" class="form-control">' +
                '<span class="input-group-btn">' +
                '<button type="button" class="btn btn-warning del-element"><i class="fa fa-minus-square"></i> Hapus</button>' +
                '</span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="ln_solid"></div>' +

                '</div>';
            $(row).insertBefore("#nextkolom");
            $('#jumlahkolom').val(i + 1);
            i++;
        });
        $(document).on('click', '.del-element', function (e) {
            e.preventDefault()
            i--;
            //$(this).parents('.rec-element').fadeOut(400);
            $(this).parents('.rec-element').remove();
            $('#jumlahkolom').val(i - 1);
        });
    });
</script>