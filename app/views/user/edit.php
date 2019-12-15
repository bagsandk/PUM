<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data User</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/user/getedit" method="post" enctype="multipart/form-data" onsubmit="return cekedituser();">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_user" name="id_user" value="<?= $data['user']['id_user']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" id="emailu" name="email" value="<?= $data['user']['email']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>NO HP</label>
                                        <input type="number" class="form-control" id="no_hpu" name="no_hp" size="13" value="<?= $data['user']['no_hp']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <small id="emailHelp" class="form-text text-muted">biarkan kosong jika tidak di ubah</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <input type="file" class="form-control-file" id="foto" name="foto" value="<?= $data['user']['foto']; ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-sm ">Update</button>
                            <?php if (!isset($_SESSION['user'])) : ?>
                                <a href="<?= BASEURL; ?>/user" class="btn btn-warning btn-fill btn-sm ">Batal</button></a>
                            <?php endif ?>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-user">
                    <div class="card-image">
                        <img src="<?= BASEURL; ?>/img/wp-p.jpg" alt="...">
                    </div>
                    <div class="card-body">
                        <div class="author">
                            <a href="#">
                                <img class="avatar border-gray" src="<?= BASEURL; ?>/img/user/<?= $data['user']['foto']; ?>" alt="...">
                                <h5 class="title">Mike Andrew</h5>
                            </a>
                            <p class="description">
                                michael24
                            </p>
                        </div>
                        <p class="description text-center">
                            "Lamborghini Mercy
                            <br> Your chick she so thirsty
                            <br> I'm in that two seat Lambo"
                        </p>
                    </div>
                    <hr>
                    <div class="button-container mr-auto ml-auto">
                        <button href="#" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-facebook-square"></i>
                        </button>
                        <button href="#" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-twitter"></i>
                        </button>
                        <button href="#" class="btn btn-simple btn-link btn-icon">
                            <i class="fa fa-google-plus-square"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>