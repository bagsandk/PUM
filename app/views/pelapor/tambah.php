<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data Pelapor</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/pelapor/tambahdata" method="post">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_pelapor" name="id_pelapor">
                                <input type="hidden" class="form-control" id="id_user" name="id_user">
                            </div>
                            <div class="row">
                                <div class="col-md-6 pm-1">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="text" onkeypress="return angka(event);" maxlength="16" minlength="16" class="form-control" id="nik" name="nik">
                                    </div>
                                </div>
                                <div class="col-md-6 pm-1">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" onkeypress="return huruf(event);" maxlength="19" style="text-transform: capitalize;" class="form-control" id="nama" name="nama">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" style="text-transform: capitalize;" maxlength="20" class="form-control" id="tmp_lahir" name="tmp_lahir">
                                    </div>
                                </div>
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                    </div>
                                </div>
                                <div class="col-md-4 pm-1">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" style="text-transform: capitalize;" maxlength="50" class="form-control" id="alamat" name="alamat">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <div class="form-check">
                                            <input class="form-control-sm" type="radio" name="jk" id="jk1" value="L">
                                            <label>
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-control-sm" type="radio" name="jk" id="jk2" value="P">
                                            <label>
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Agama</label>
                                        <select class="form-control" id="agama" name="agama">
                                            <option value="">---Pilih Agama---</option>
                                            <option value="ISLAM">Islam</option>
                                            <option value="KRISTEN">Keristen</option>
                                            <option value="HINDU">Hindu</option>
                                            <option value="KATOLIK">Katolik</option>
                                            <option value="BUDHA">Budha</option>
                                            <option value="KONGUCHU">Kongucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            <option value="">---Pilih Status---</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="single">Single</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label>Pekerjaan</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="pekerjaan" name="pekerjaan">
                                    </div>
                                </div>
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Kewarganegaraan</label>
                                        <select class="form-control" id="kwn" name="kwn">
                                            <option value="">---Pilih Kewarganegaraan---</option>
                                            <option value="wni">WNI</option>
                                            <option value="wna">WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2 pm-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">User</label>
                                        <select class="form-control" id="id_user" name="id_user">
                                            <option value="">User</option>
                                            <?php foreach ($data['user'] as $row) {
                                                echo '<option value="' . $row['id_user'] . '">' . $row['id_user'] . '</option>';
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-sm ">Tambah</button>
                            <a href="<?= BASEURL; ?>/pelapor" class="btn btn-warning btn-fill btn-sm ">Batal</button></a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>