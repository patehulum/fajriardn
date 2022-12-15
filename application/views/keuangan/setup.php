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
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header  with-border">
                    <h3 class="box-title">Data Table Walikelas</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <?php
                    echo form_open('keuangan/setup');
                    ?>

                    <table class="table table-bordered">
                        <?php
                        foreach ($jenis_pembayaran->result() as $row) {
                            echo "<tr>
                                <td width='200'>" . strtoupper($row->nama_jenis_pembayaran) . "</td>
                                <td><input type='int' value='".  chek_komponen_biaya($row->id_jenis_pembayaran)."' class='form-control' name='$row->id_jenis_pembayaran' placeholder='Masukan Data $row->nama_jenis_pembayaran'></td></tr>";
                        }
                        ?>
                        <tr class="text-right">
                            <td colspan="2"><button type="submit" name="submit" class="btn btn-danger btn-sm">SIMPAN PERUBAHAN</button></td>
                        </tr>
                    </table>
                    </form>

                </div>
            </div>
            <!-- end: DYNAMIC TABLE PANEL -->
        </div>
    
    </div>
</section>