<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Tabel Laporan Kehilangan</h4>
                        <button type="button" class="btn btn-primary fas fa-keyboard pull-right" data-toggle="modal" data-target="#exampleModalLong"></button>
                        <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>ID kehilangan</th>
                                    <th>No Surat</th>
                                    <th>Tanggal</th>
                                    <th>Waktu</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data['laporan'] as $row) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['id_kehilangan']; ?></td>
                                        <td><?= $row['no_surat']; ?></td>
                                        <td><?= $row['tgl_surat']; ?></td>
                                        <td><?= $row['waktu']; ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?= BASEURL; ?>/laporan/edit/<?= $row['id_lap']; ?>" class="btn btn-info btn-simple "> <i class="fa fa-edit"></i></a>
                                            <a href="<?= BASEURL; ?>/laporan/hapus/<?= $row['id_lap']; ?>" class="btn btn-simple btn-danger btn-link" onclick="return confirm('yakin?');"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal fade modal-primary" id="exampleModalLong">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Laporan Kehilangan</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/Laporan/tambah" method="post">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Data Kehilangan</label>
                                    <select class="form-control" id="id_kehilangan" name="id_kehilangan">
                                        <option value="">Data Kehilangan</option>
                                        <?php foreach ($data['kel'] as $row) {
                                            echo '<option value="' . $row['id_kehilangan'] . '"> ID : ' . $row['id_kehilangan'] . ' => Nama Pelapor : ' . $row['nama'] . '</option>';
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">No Surat</label>
                                    <input class="form-control" type="text" id="no_surat" name="no_surat" placeholder="No Surat">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Tanggal Pembuatan</label>
                                    <input class="form-control" type="date" id="tgl_surat" name="tgl_surat" placeholder="Tanggal Pembuatan">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Pukul</label>
                                    <input class="form-control" type="time" id="waktu" name="waktu" placeholder="Pukul">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>