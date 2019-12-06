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
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Tgl Daftar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data['pelapor'] as $row) :
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['password']; ?></td>
                                        <td><img class="avatar border-gray" src="<?= BASEURL; ?>/img/pelapor/<?= $row['foto']; ?>" alt=""></td>
                                        <td><?= $row['status']; ?></td>
                                        <td><?= $row['tgl_daftar']; ?></td>
                                        <td class="td-actions text-right">
                                            <a href="<?= BASEURL; ?>/pelapor/edit/<?= $row['id_pelapor']; ?>" class="btn btn-info btn-simple btn-link"> <i class="fa fa-edit"></i></a>
                                            <a href="<?= BASEURL; ?>/pelapor/hapus/<?= $row['id_pelapor']; ?>" class="btn btn-simple btn-danger btn-link" onclick="return confirm('yakin?');"><i class="fa fa-times"></i></a>
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
                            <form action="<?= BASEURL; ?>/Pelapor/tambah" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="example-text-input" class="col-form-label">Email</label>
                                    <input class="form-control" type="email" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Foto</label>
                                    <input type="file" class="form-control-file" name="foto" id="foto">
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