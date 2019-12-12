<div class="content">
    <div class="container-fluid">
        <div class="row">
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
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" maxlength="16" class="form-control" id="nik" name="nik" value="<?= $data['kehilangan']['nik']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="nama" name="nama" value="<?= $data['kehilangan']['nama']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= $data['kehilangan']['tmp_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['kehilangan']['tgl_lahir']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="alamat" name="alamat" value="<?= $data['kehilangan']['alamat']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-control-sm" type="radio" name="jk" id="jk1" value="L" <?php if ($data["kehilangan"]['jk'] == 'L') echo 'checked="checked"'; ?>>
                                            <label>
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-control-sm" type="radio" name="jk" id="jk2" value="P" <?php if ($data["kehilangan"]['jk'] == 'P') echo "checked=\"checked\""; ?>>
                                            <label>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 px-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Agama</label>
                                        <select class="form-control" id="agama" name="agama">
                                            <option value="ISLAM" <?php if ($data['kehilangan']['agama'] == 'ISLAM') echo 'selected="selected"'; ?>>Islam</option>
                                            <option value="KRISTEN" <?php if ($data['kehilangan']['agama'] == 'KRISTEN') echo 'selected="selected"'; ?>>Keristen</option>
                                            <option value="HINDU" <?php if ($data['kehilangan']['agama'] == 'HINDU') echo 'selected="selected"'; ?>>Hindu</option>
                                            <option value="KATOLIK" <?php if ($data['kehilangan']['agama'] == 'katolik') echo 'selected="selected"'; ?>>Katolik</option>
                                            <option value="BUDHA" <?php if ($data['kehilangan']['agama'] == 'BUDHA') echo 'selected="selected"'; ?>>Budha</option>
                                            <option value="KONGUCHU" <?php if ($data['kehilangan']['agama'] == 'KONGUCHU') echo 'selected="selected"'; ?>>Kongucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 px-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="Menikah" <?php if ($data['kehilangan']['status'] == 'menikah') echo 'selected="selected"'; ?>>Menikah</option>
                                            <option value="single" <?php if ($data['kehilangan']['status'] == 'Single') echo 'selected="selected"'; ?>>Single</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $data['kehilangan']['pekerjaan']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-2 pl-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kewarganegaraan</label>
                                        <select class="form-control" id="kwn" name="kwn">
                                            <option value="wni" <?php if ($data['kehilangan']['kwn'] == 'wni') echo 'selected="selected"'; ?>>WNI</option>
                                            <option value="wna" <?php if ($data['kehilangan']['kwn'] == 'wna') echo 'selected="selected"'; ?>>WNA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-sm ">Update</button>
                            <a href="<?= BASEURL; ?>/pelapor" class="btn btn-warning btn-fill btn-sm ">Batal</button></a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ubah Data kehilangan</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/kehilangan/getedit" method="post">
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <input type="hidden" class="form-control" id="id_kehilangan" name="id_kehilangan" value="<?= $data['kehilangan']['id_kehilangan']; ?>">
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
                            <a href="<?= BASEURL ?>/cetak/<?= $data['kehilangan']['id_kehilangan'] ?>" class="btn btn-info btn-fill btn-sm >Cetak SKTLK">Cetak Laporan</a>
                            <button type="submit" class="btn btn-warning btn-fill btn-sm ">Verifikasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>