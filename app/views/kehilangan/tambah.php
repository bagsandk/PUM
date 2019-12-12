<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Data kehilangan</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/kehilangan/tambahdata" method="post">
                            <?php if (isset($_SESSION['user'])) : ?>
                                <input type="hidden" class="form-control" id="id_pelapor" name="id_pelapor" value="<?= $data['pelaporbyu']['id_pelapor']; ?>">
                            <?php else : ?>
                                <div class="row">
                                    <div class="col-md-6 pr-1">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Pelapor</label>
                                            <select type="hidden" class="form-control" id="id_pelapor" name="id_pelapor" placeholder="Data Pelapor">
                                                <option value="" type="hidden">Data Pelapor</option>
                                                <?php foreach ($data['pelapor'] as $row) {
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
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="nm_brg_doc" name="nm_brg_doc">
                                    </div>
                                </div>
                                <div class="col-md-6 pl-1">
                                    <div class="form-group">
                                        <label>Keterangan Barang</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="ket" name="ket" placeholder="Ex: IMEI, No Simcard, NIK , Warna">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Tanggal Hilang</label>
                                        <input type="date" class="form-control" id="tgl_hilang" name="tgl_hilang">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Waktu Hilang</label>
                                        <input type="time" class="form-control" id="pukul" name="pukul">
                                    </div>
                                </div>
                                <div class="col-md-4 pl-1">
                                    <div class="form-group">
                                        <label>Perkiraan Tempat Hilang</label>
                                        <input type="text" style="text-transform: capitalize;" class="form-control" id="tempat" name="tempat">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-sm ">Tambah</button>
                            <a href="<?= BASEURL; ?>/kehilangan" class="btn btn-warning btn-fill btn-sm ">Batal</button></a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>