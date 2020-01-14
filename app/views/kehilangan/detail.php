<div class="content">
    <div class="container-fluid">
        <div class="row">
            <?php $st = (int) $data['kehilangan']['st_lap'];
            if (isset($_SESSION['user'])) : ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Notif </h4>
                        </div>
                        <div class="card-body">
                            <div class="alert <?php if ($st == 2) {
                                                    echo 'alert-danger';
                                                } else if ($st == 1) {
                                                    echo 'alert-success';
                                                } else {
                                                    echo 'alert-warning';
                                                } ?>">
                                <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                    <i class="nc-icon nc-simple-remove"></i>
                                </button>
                                <span>
                                    <b>
                                        <?php if ($st == 2) {
                                            echo 'Maaf - </b> Surat Keterangan Tanda Lapor Kehilangan Anda Ditolak';
                                        } else if ($st == 1) {
                                            echo 'Selamat - </b> Surat Keterangan Tanda Lapor Kehilangan Anda telah diverifikasi';
                                        } else {
                                            echo ' Mohon Tunggu - </b> Surat Keterangan Tanda Lapor Kehilangan Anda Belum diverifikasi';
                                        }
                                        ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Diri</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/pelapor/getedit" method="post">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_pelapor" name="id_pelapor" value="<?= $data['kehilangan']['id_pelapor']; ?>">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $data['kehilangan']['id_user']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6 pm-1">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" readonly onkeypress="return angka;" maxlength="16" class="form-control" id="nik" name="nik" value="<?= $data['kehilangan']['nik']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 pm-1">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" readonly style="text-transform: capitalize;" class="form-control" id="nama" onkeypress="return huruf(event);" name="nama" value="<?= $data['kehilangan']['nama']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" readonly style="text-transform: capitalize;" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= $data['kehilangan']['tmp_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" readonly class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['kehilangan']['tgl_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" readonly style="text-transform: capitalize;" class="form-control" id="alamat" name="alamat" value="<?= $data['kehilangan']['alamat']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-control-sm" disabled type="radio" name="jk" id="jk1" value="L" <?php if ($data["kehilangan"]['jk'] == 'L') echo 'checked="checked"'; ?>>
                                            <label>
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-control-sm" disabled type="radio" name="jk" id="jk2" value="P" <?php if ($data["kehilangan"]['jk'] == 'P') echo "checked=\"checked\""; ?>>
                                            <label>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Agama</label>
                                        <select class="form-control" id="agama" disabled name="agama">
                                            <option value="ISLAM" <?php if ($data['kehilangan']['agama'] == 'ISLAM') echo 'selected="selected"'; ?>>Islam</option>
                                            <option value="KRISTEN" <?php if ($data['kehilangan']['agama'] == 'KRISTEN') echo 'selected="selected"'; ?>>Keristen</option>
                                            <option value="HINDU" <?php if ($data['kehilangan']['agama'] == 'HINDU') echo 'selected="selected"'; ?>>Hindu</option>
                                            <option value="KATOLIK" <?php if ($data['kehilangan']['agama'] == 'katolik') echo 'selected="selected"'; ?>>Katolik</option>
                                            <option value="BUDHA" <?php if ($data['kehilangan']['agama'] == 'BUDHA') echo 'selected="selected"'; ?>>Budha</option>
                                            <option value="KONGUCHU" <?php if ($data['kehilangan']['agama'] == 'KONGUCHU') echo 'selected="selected"'; ?>>Kongucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" disabled id="status" name="status">
                                            <option value="Menikah" <?php if ($data['kehilangan']['status'] == 'menikah') echo 'selected="selected"'; ?>>Menikah</option>
                                            <option value="single" <?php if ($data['kehilangan']['status'] == 'Single') echo 'selected="selected"'; ?>>Single</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 pm-1">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" readonly style="text-transform: capitalize;" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $data['kehilangan']['pekerjaan']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kewarganegaraan</label>
                                        <select class="form-control" id="kwn" disabled name="kwn">
                                            <option value="wni" <?php if ($data['kehilangan']['kwn'] == 'wni') echo 'selected="selected"'; ?>>WNI</option>
                                            <option value="wna" <?php if ($data['kehilangan']['kwn'] == 'wna') echo 'selected="selected"'; ?>>WNA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <?php if (isset($_SESSION['lvladmin']) && $_SESSION['lvladmin'] != 11) : ?>
                                <button type="submit" class="btn btn-info btn-fill btn-sm ">Update</button>
                            <?php endif ?> -->
                            <!-- <button href="<?= BASEURL; ?>/pelapor" class="btn btn-warning btn-fill btn-sm ">Batal</button></a> -->
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data kehilangan</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/kehilangan/getedit" method="post">
                            <input type="hidden" class="form-control" id="id_kehilangan" name="id_kehilangan" value="<?= $data['kehilangan']['id_kehilangan']; ?>">
                            <?php if (isset($_SESSION['user']) || isset($_SESSION['lvladmin']) == 10) : ?>
                                <input type="hidden" class="form-control" id="id_pelapor" name="id_pelapor" value="<?= $data['kehilangan']['id_pelapor']; ?>">
                            <?php else : ?>
                                <div class="row">
                                    <div class="col-md-6 pm-1">
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
                                <div class="col-md-6 pm-1">
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="nm_brg_doc" name="nm_brg_doc" <?php if ($data['kehilangan']['st_lap'] != 0) : ?> disabled <?php endif ?> value="<?= $data['kehilangan']['nm_brg_doc'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 pm-1">
                                    <div class="form-group">
                                        <label>Keterangan Barang</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="ket" name="ket" placeholder="Ex: IMEI, No Simcard, NIK , Warna" <?php if ($data['kehilangan']['st_lap'] != 0) : ?> disabled <?php endif ?> value="<?= $data['kehilangan']['ket'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Tanggal Hilang</label>
                                        <input type="date" class="form-control" id="tgl_hilang" name="tgl_hilang" <?php if ($data['kehilangan']['st_lap'] != 0) : ?> disabled <?php endif ?> value="<?= $data['kehilangan']['tgl_hilang'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Waktu Hilang</label>
                                        <input type="time" class="form-control" id="pukul" name="pukul" <?php if ($data['kehilangan']['st_lap'] != 0) : ?> disabled <?php endif ?> value="<?= $data['kehilangan']['pukul'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Perkiraan Tempat Hilang</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="tempat" name="tempat" <?php if ($data['kehilangan']['st_lap'] != 0) : ?> disabled <?php endif ?> value="<?= $data['kehilangan']['tempat'] ?>">
                                    </div>
                                </div>
                            </div>
                            <?php if (!isset($_SESSION['user'])) : ?>
                                <div class="row">
                                    <div class="col-md-4 pm-1">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control" id="st_lap" <?php if ($data['kehilangan']['st_lap'] != 0) : ?> disabled <?php endif ?>name="st_lap">
                                                <option value="0" <?php if ($data['kehilangan']['st_lap'] == '0') echo 'selected="selected"'; ?>>Belum Verifikasi</option>
                                                <option value="1" <?php if ($data['kehilangan']['st_lap'] == '1') echo 'selected="selected"'; ?>>Di Verifikasi</option>
                                                <option value="2" <?php if ($data['kehilangan']['st_lap'] == '2') echo 'selected="selected"'; ?>>Di Tolak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if ($data['kehilangan']['st_lap'] == 0) : ?>
                                <button type="submit" class="btn btn-info btn-fill btn-sm ">Update</button>
                            <?php endif ?>
                            <!-- <button href="<?= BASEURL; ?>/kehilangan" class="btn btn-warning btn-fill btn-sm ">Batal</button></a> -->
                            <a href="<?= BASEURL; ?>/kehilangan" class="btn btn-warning btn-fill btn-sm  ">Kembali</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if (!isset($_SESSION['user'])) : ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Verifikasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= BASEURL ?>/cetak/verif" method="post">
                                <input type="hidden" class="form-control" id="email" name="email" value="<?= $data['kehilangan']['email']; ?>">
                                <input type="hidden" class="form-control" id="id_kehilangan" name="id_kehilangan" value="<?= $data['kehilangan']['id_kehilangan']; ?>">
                                <?php if ($data['kehilangan']['st_lap'] == 1) : ?>
                                    <a href="<?= BASEURL ?>/cetak/<?= $data['kehilangan']['id_kehilangan'] ?>" target=" _blank" class="btn btn-info btn-fill btn-sm mb-2 >Cetak SKTLK">Cetak Laporan</a>
                                    <br>
                                <?php endif ?>
                                <!-- <?php if ($data['kehilangan']['st_lap'] == 0) : ?>
                                    <a href="<?= BASEURL ?>/cetak/tolak/<?= $data['kehilangan']['id_kehilangan'] ?>" class="btn btn-danger btn-fill btn-sm >Cetak SKTLK">Tolak</a>
                                <?php endif ?> -->
                                <button type="submit" class="btn btn-success btn-fill btn-sm ">Verifikasi</button>
                            </form>
                            <form action="<?= BASEURL ?>/cetak/tolak" method="post">
                                <input type="hidden" class="form-control" id="email" name="email" value="<?= $data['kehilangan']['email']; ?>">
                                <input type="hidden" class="form-control" id="id_kehilangan" name="id_kehilangan" value="<?= $data['kehilangan']['id_kehilangan']; ?>">
                                <button type="submit" class="btn btn-danger mt-2 btn-fill btn-sm ">Tolak</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif ?>
    </div>
</div>