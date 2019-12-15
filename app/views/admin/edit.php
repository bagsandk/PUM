<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 float-right">
                <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= BASEURL; ?>/Admin/getedit" method="post">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_admin" name="id_admin" value="<?= $data['admin']['id_admin']; ?>">
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" id="nm_admin" name="nm_admin" value="<?= $data['admin']['nm_admin']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $data['admin']['username']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" value="<?= $data['admin']['password']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 pr-1">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Level</label>
                                        <select class="form-control" id="lvl" name="lvl">
                                            <option value="10" <?php if ($data['admin']['lvl'] == '10') echo 'selected="selected"'; ?>>Admin</option>
                                            <option value="11" <?php if ($data['admin']['lvl'] == '11') echo 'selected="selected"'; ?>>Super Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill btn-sm ">Update</button>
                            <a href="<?= BASEURL; ?>/admin" class="btn btn-warning btn-fill btn-sm ">Batal</button></a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>