<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Tabel Kehilangan</h4>
                        <?php if (isset($_SESSION['user']) || (isset($_SESSION['lvladmin']) && $_SESSION['lvladmin'] == 11)) : ?>
                            <a href="<?= BASEURL ?>/kehilangan/tambah"><button type="button" class="btn btn-primary pull-right"><i class="fa fa-plus "></i> </button></a>
                        <?php endif ?>
                        <!-- <p class="card-category">Here is a subtitle for this table</p> -->
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="text-capitalize">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelapor</th>
                                    <th>Nama Barang / Dokumen</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Hilang</th>
                                    <th>Tempat</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($data['kehilangan'] as $row) :
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['nm_brg_doc']; ?></td>
                                        <td><?= $row['ket']; ?></td>
                                        <td><?= $row['tgl_hilang']; ?></td>
                                        <td><?= $row['tempat']; ?></td>
                                        <td><?php if ($row['st_lap'] == 1) {
                                                echo 'Terverifikasi';
                                            } elseif ($row['st_lap'] == 2) {
                                                echo 'Ditolak';
                                            } else {
                                                echo 'Belum Diverifikasi';
                                            } ?></td>
                                        <td class="td-actions text-right">
                                            <?php if (isset($_SESSION['lvladmin']) && $row['st_lap'] == 1) : ?><a href="<?= BASEURL; ?>/cetak/<?= $row['id_kehilangan']; ?> " target=" _blank" class="btn btn-success btn-sm ml-1 ">Cetak</a> <?php endif ?>
                                            <a href="<?= BASEURL; ?>/kehilangan/detail/<?= $row['id_kehilangan']; ?>" class="btn btn-info btn-sm ml-1"> <i class="fa fa-info"></i></a>
                                            <?php if (isset($_SESSION['lvladmin']) || (isset($_SESSION['user']) && $row['st_lap'] == 0)) : ?><a href="<?= BASEURL; ?>/kehilangan/edit/<?= $row['id_kehilangan']; ?>" class="btn btn-warning btn-sm ml-1 "> <i class="fa fa-edit"></i></a>
                                                <?php if (isset($_SESSION['lvladmin']) && $_SESSION['lvladmin'] == 11) : ?>
                                                    <a href="'<?= BASEURL ?>/kehilangan/hapus/<?= $row['id_kehilangan'] ?>" class="btn btn-sm btn-danger ml-1" onclick="return confirm('yakin?');"><i class="fa fa-times"></i></a>';
                                                <?php endif ?>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>