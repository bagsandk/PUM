<?php

class Pelapor extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        if (isset($_SESSION['lvladmin']) && $_SESSION['lvladmin'] == 12) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $data['pelapor'] = $this->model('Pelapor_model')->getALLPelapor();
            $data['judul'] = 'Pelapor';
            $this->view('templates/header', $data);
            $this->view('pelapor/index', $data);
            $this->view('templates/footer');
        } else {
            $data['pelapor'] = $this->model('Pelapor_model')->getPelaporByUser($_SESSION['user']);
            $data['judul'] = 'Pelapor';
            $this->view('templates/header', $data);
            $this->view('pelapor/edit', $data);
            $this->view('templates/footer');
        }
    }

    public function tambah()
    {
        if (isset($_SESSION['admin'])) {
            $data['user'] = $this->model('User_model')->getUserNotIn();
            $data['judul'] = 'Tambah Pelapor';
            $this->view('templates/header', $data);
            $this->view('pelapor/tambah', $data);
            $this->view('templates/footer');
        }
    }
    public function tambahdata()
    {
        if (!isset($_POST['id_user'])) {
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        }
        if ($this->model('Pelapor_model')->cekNik($_POST['nik']) > 0) {
            flasher::setFlash('Gagal', 'Ditambahkan, NIK sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        } else {
            if ($this->model('Pelapor_model')->tambahDataPelaporByAdmin($_POST) > 0) {
                flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
                header('Location: ' . BASEURL . '/Pelapor');
                exit;
            } else {
                flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/Pelapor');
                exit;
            }
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['admin'])) {
            $data['judul'] = 'Ubah Data Pelapor';
            $data['pelapor'] = $this->model('Pelapor_model')->getPelaporById($id);
            $this->view('templates/header', $data);
            $this->view('pelapor/edit', $data);
            $this->view('templates/footer');
        }
    }
    //SELECT * FROM `user` as x INNER JOIN pelapor as z ON x.id_user = z.id_user WHERE z.id_user = 22
    public function getedit()
    {
        if (!isset($_POST['id_user'])) {
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        }
        if ($_POST['id_user'] > 0) {
            if ($this->model('Pelapor_model')->cekNik2($_POST) > 0) {
                flasher::setFlash('Gagal', 'Update, NIK sudah terdaftar', 'danger');
                header('Location: ' . BASEURL . '/Pelapor');
                exit;
            } else {
                if ($this->model('Pelapor_model')->editDataPelapor($_POST) > 0) {
                    flasher::setFlash('Berhasil', 'Diubah', 'success');
                    header('Location: ' . BASEURL . '/Pelapor');
                    exit;
                } else {
                    flasher::setFlash('Gagal', 'Diubah', 'danger');
                    header('Location: ' . BASEURL . '/Pelapor');
                    exit;
                }
            }
        } else {
            if ($this->model('Pelapor_model')->cekNik($_POST['nik']) > 0) {
                flasher::setFlash('Gagal', 'Ditambahkan, NIK sudah terdaftar', 'danger');
                header('Location: ' . BASEURL . '/Pelapor');
                exit;
            } else {
                if ($this->model('Pelapor_model')->tambahDataPelapor($_POST) > 0) {
                    flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
                    $data['pelapor'] = $this->model('Pelapor_model')->getPelaporByUser($_SESSION['user']);
                    $_SESSION['pelapor'] = $data['pelapor']['id_pelapor'];
                    $_SESSION['nama'] = $data['pelapor']['nama'];
                    header('Location: ' . BASEURL . '/Pelapor');
                    exit;
                } else {
                    flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
                    header('Location: ' . BASEURL . '/Pelapor');
                    exit;
                }
            }
        }
    }

    public function hapus($id)
    {
        if ($this->model('Pelapor_model')->hapusDataPelapor($id) > 0) {
            flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        } else if ($this->model('Pelapor_model')->hapusDataPelapor($id) == 'id digunakan') {
            flasher::setFlash('Gagal', 'Dihapus karena id Pelapor digunakan', 'danger');
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        }
    }
}
