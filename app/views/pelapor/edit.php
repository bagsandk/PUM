<div class="content">
    <div class="container-fluid">
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
                                <input type="hidden" class="form-control" id="id_pelapor" name="id_pelapor" value="<?= $data['pelapor']['id_pelapor']; ?>">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $data['pelapor']['id_user']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-1">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" maxlength="16" onkeypress="return angka(event);" class="form-control" id="nik" name="nik" value="<?= $data['pelapor']['nik']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="nama" name="nama" value="<?= $data['pelapor']['nama']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="tmp_lahir" name="tmp_lahir" value="<?= $data['pelapor']['tmp_lahir']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $data['pelapor']['tgl_lahir']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="alamat" name="alamat" value="<?= $data['pelapor']['alamat']; ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 pr-1">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-control-sm" type="radio" name="jk" id="jk1" value="L" <?php if ($data["pelapor"]['jk'] == 'L') echo 'checked="checked"'; ?>>
                                            <label>
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-control-sm" type="radio" name="jk" id="jk2" value="P" <?php if ($data["pelapor"]['jk'] == 'P') echo "checked=\"checked\""; ?>>
                                            <label>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 px-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Agama</label>
                                        <select class="form-control" id="agama" name="agama" required>
                                            <option value="ISLAM" <?php if ($data['pelapor']['agama'] == 'ISLAM') echo 'selected="selected"'; ?>>Islam</option>
                                            <option value="KRISTEN" <?php if ($data['pelapor']['agama'] == 'KRISTEN') echo 'selected="selected"'; ?>>Keristen</option>
                                            <option value="HINDU" <?php if ($data['pelapor']['agama'] == 'HINDU') echo 'selected="selected"'; ?>>Hindu</option>
                                            <option value="KATOLIK" <?php if ($data['pelapor']['agama'] == 'katolik') echo 'selected="selected"'; ?>>Katolik</option>
                                            <option value="BUDHA" <?php if ($data['pelapor']['agama'] == 'BUDHA') echo 'selected="selected"'; ?>>Budha</option>
                                            <option value="KONGUCHU" <?php if ($data['pelapor']['agama'] == 'KONGUCHU') echo 'selected="selected"'; ?>>Kongucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 px-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="Menikah" <?php if ($data['pelapor']['status'] == 'menikah') echo 'selected="selected"'; ?>>Menikah</option>
                                            <option value="single" <?php if ($data['pelapor']['status'] == 'Single') echo 'selected="selected"'; ?>>Single</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3 px-1">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="pekerjaan" name="pekerjaan" value="<?= $data['pelapor']['pekerjaan']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-2 pl-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kewarganegaraan</label>
                                        <select class="form-control" id="kwn" name="kwn" required>
                                            <option value="wni" <?php if ($data['pelapor']['kwn'] == 'wni') echo 'selected="selected"'; ?>>WNI</option>
                                            <option value="wna" <?php if ($data['pelapor']['kwn'] == 'wna') echo 'selected="selected"'; ?>>WNA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-sm ">Update</button>
                            <?php if (!isset($_SESSION['user'])) : ?>
                                <a href="<?= BASEURL; ?>/pelapor" class="btn btn-warning btn-fill btn-sm ">Batal</button></a>
                            <?php endif ?>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>