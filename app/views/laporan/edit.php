<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Laporan</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/laporan/getedit" method="post">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_lap" name="id_lap" value="<?= $data['laporan']['id_lap']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Id Kehilangan</label>
                                        <input type="text" class="form-control" id="id_kehilangan" name="id_kehilangan" value="<?= $data['laporan']['id_kehilangan']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>No Surat</label>
                                        <input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $data['laporan']['no_surat']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Tanggal Pembuatan</label>
                                        <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= $data['laporan']['tgl_surat']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Pukul</label>
                                        <input type="time" class="form-control" id="waktu" name="waktu" value="<?= $data['laporan']['waktu']; ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-sm ">Update</button>
                            <a href="<?= BASEURL; ?>/laporan" class="btn btn-warning btn-fill btn-sm ">Batal</button></a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>