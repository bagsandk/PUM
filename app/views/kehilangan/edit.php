<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ubah Data kehilangan</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/kehilangan/getedit" method="post">
                            <input type="hidden" class="form-control" id="id_kehilangan" name="id_kehilangan" value="<?= $data['kehilangan']['id_kehilangan']; ?>">
                            <?php if (isset($_SESSION['user']) || isset($_SESSION['lvladmin']) == 10) : ?>
                                <input type="hidden" class="form-control" id="id_pelapor" name="id_pelapor" value="<?= $data['kehilangan']['id_pelapor']; ?>">
                            <?php else : ?>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pelapor</label>
                                            <select class="form-control" id="id_pelapor" name="id_pelapor" placeholder="Data Pelapor">
                                                <option value="<?= $data['kehilangan']['id_pelapor'] ?>" selected="selected"><?= $data['kehilangan']['nama'] ?></option>
                                                <?php foreach ($data['kehilangan'] as $row) {
                                                        echo '<option value="' . $row['id_pelapor'] . '">ID : ' . $row['id_pelapor'] . ' => Nama Pelapor : ' . $row['nama'] . '</option>';
                                                    } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="nm_brg_doc" name="nm_brg_doc" value="<?= $data['kehilangan']['nm_brg_doc'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Keterangan Barang</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="ket" name="ket" placeholder="Ex: IMEI, No Simcard, NIK , Warna" value="<?= $data['kehilangan']['ket'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Tanggal Hilang</label>
                                        <input type="date" class="form-control" id="tgl_hilang" name="tgl_hilang" value="<?= $data['kehilangan']['tgl_hilang'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Waktu Hilang</label>
                                        <input type="time" class="form-control" id="pukul" name="pukul" value="<?= $data['kehilangan']['pukul'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Perkiraan Tempat Hilang</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="tempat" name="tempat" value="<?= $data['kehilangan']['tempat'] ?>">
                                    </div>
                                </div>
                            </div>
                            <?php if (!isset($_SESSION['user'])) : ?>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control" id="st_lap" name="st_lap">
                                                <option value="0" <?php if ($data['kehilangan']['st_lap'] == '0') echo 'selected="selected"'; ?>>Belum Verifikasi</option>
                                                <option value="1" <?php if ($data['kehilangan']['st_lap'] == '1') echo 'selected="selected"'; ?>>Di Verifikasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <button type="submit" class="btn btn-info btn-fill btn-sm ">Update</button>
                            <a href="<?= BASEURL; ?>/kehilangan" class="btn btn-warning btn-fill btn-sm ">Batal</button></a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>