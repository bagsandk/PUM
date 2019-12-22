<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Tabel Pelapor</h4>
                        <a href="<?= BASEURL; ?>/pelapor/tambah"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus "></i> </button></a>
                        <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped ">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>Status</th>
                                    <th>Pekerjaan</th>
                                    <th>KWN</th>
                                    <!-- <th>Tanggal Lapor</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data['pelapor'] as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['nik']; ?></td>
                                        <td><?= $row['tmp_lahir']; ?></td>
                                        <td><?= $row['tgl_lahir']; ?></td>
                                        <td><?php if ($row['jk'] == 'L') {
                                                echo 'Laki-laki';
                                            } else {
                                                echo 'Perempuan';
                                            } ?></td>
                                        <td><?= $row['agama']; ?></td>
                                        <td><?= $row['alamat']; ?></td>
                                        <td><?= $row['status']; ?></td>
                                        <td><?= $row['pekerjaan']; ?></td>
                                        <td><?= $row['kwn']; ?></td>
                                        <!-- <td><?= $row['tgl_data']; ?></td> -->
                                        <td class="td-actions text-right">
                                            <a href="<?= BASEURL; ?>/pelapor/edit/<?= $row['id_pelapor']; ?>" class="btn btn-info btn-sm mr-1"> <i class="fa fa-edit"></i></a>
                                            <a href="<?= BASEURL; ?>/pelapor/hapus/<?= $row['id_pelapor']; ?>" class="btn btn-sm btn-danger " onclick="return confirm('yakin?');"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="modal fade modal-primary" id="exampleModalLong">
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
            </div> -->
        </div>
    </div>
</div>