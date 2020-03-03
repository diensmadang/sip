<?php
$ses_id = $this->session->userdata('ses_id');
$ses_nama = $this->session->userdata('ses_nama');
$ses_email = $this->session->userdata('ses_email');
$ses_foto = $this->session->userdata('ses_foto');
$ses_level = $this->session->userdata('ses_level');
?>
<div id="data-tambah" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Form Laporan Akhir</h4>
            </div>
            <form action="<?php echo site_url('laporan_akhir/simpan_data')?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tanggal Laporan</label>
                        <input type="date" name="tgl_laporan"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Judul | Ketua Penelitian</label>
                        <select name="usulan_id" class="form-control" required >
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_ketua as $data) { $no++ ?>
                            <option value="<?php echo $data['id_usulan'];?>"><?php echo $data['judul'];?> | <?php echo $data['ketua'];?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ringkasan Penelitian</label>
                        <input type="text" name="ringkasan_penelitian"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Upload Program</label>
                        <input type="file" name="file_program">
                    </div>
                    <div class="form-group">
                        <label>Upload SPTB</label>
                        <input type="file" name="file_sptb">
                    </div>

                    <div class="form-group">
                        <label>Tahun Penelitian</label>
                        <select name="tahun_penelitian" class="form-control" required >
                            <option value="">Pilih</option>
                            <?php $no = 1; foreach ($data_years as $data) { $no++ ?>
                            <option value="<?php echo $data['code_years'];?>"><?php echo $data['years_name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Link Luaran Jurnal</label>
                        <input type="text" name="link_luaranjurnal"  class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>File Surat Pernyataan</label>
                        <input type="file" name="file_pernyataan">
                    </div>
                    <div class="form-group">
                        <label>Verifikasi</label>
                        <select name="verifikasi" class="form-control" required >
                            <option value="BERJALAN">BERJALAN</option>
                            <option value="SEMINAR">SEMINAR</option>
                            <option value="SELESAI">SELESAI</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger">Reset</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#datetimepicker').datetimepicker({
            format: 'DD MMMM YYYY HH:mm'
        });

        $('#datepicker').datetimepicker({
            format: 'DD MMMM YYYY'
        });

        $('#timepicker').datetimepicker({
            format: 'HH:mm'
        });
    });
</script>