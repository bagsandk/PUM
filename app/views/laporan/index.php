<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Tabel Admin</h4>
                        <button type="button" class="btn btn-primary nc-icon nc-simple-add pull-right" data-toggle="modal" data-target="#exampleModalLong"></button>
                        <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>ID kehilangan</th>
                                    <th>No Surat</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Tanggal</th>
                                    <th>Hari</th>
                                    <th>Waktu</th>
                                    <th>Pernyataan</th>
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
                                        <td><?= $row['bulan']; ?></td>
                                        <td><?= $row['tahun']; ?></td>
                                        <td><?= $row['tgl_surat']; ?></td>
                                        <td><?= $row['hari']; ?></td>
                                        <td><?= $row['waktu']; ?></td>
                                        <td><?= $row['pernyataan']; ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?= BASEURL; ?>/laporan/edit/<?= $row['id_lap']; ?>" class="btn btn-info btn-simple btn-link"> <i class="fa fa-edit"></i></a>
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
                            <h5 class="modal-title">Tambah Admin</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL; ?>/Admin/tambah" method="post">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Nama</label>
                                    <input class="form-control" type="text" id="nama" name="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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