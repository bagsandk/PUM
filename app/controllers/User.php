<?php

class User extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        if (isset($_SESSION['lvladmin']) && ($_SESSION['lvladmin']) != 11) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function index()
    {
        $data['nama'] = 'Lengkapi Profil';
        if (!isset($_SESSION['user'])) {
            $data['user'] = $this->model('User_model')->getALLUser();
            $data['judul'] = 'User';
            $this->view('templates/header', $data);
            $this->view('user/index', $data);
            $this->view('templates/footer');
        } else {

            $data['user'] = $this->model('User_model')->getUserById($_SESSION['user']);
            $data['judul'] = 'User';
            if (isset($_SESSION['nama'])) {
                $data['nama'] = $_SESSION['nama'];
            } else {
                $data['nama'];
            }
            $this->view('templates/header', $data);
            $this->view('user/edit', $data);
            $this->view('templates/footer');
        }
    }


    public function tambah()
    {
        if (!isset($_POST)) {
            header('Location: ' . BASEURL . '/User');
            exit;
        }
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/User');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/User');
            exit;
        }
    }

    public function edit($id)
    {
        if (isset($_SESSION['admin'])) {
            $data['judul'] = 'Ubah Data User';
            $data['user'] = $this->model('User_model')->getUserById($id);
            $data['pelapor'] = $this->model('pelapor_model')->getPelaporByUser($id);
            $data['nama'] = $data['pelapor']['nama'];
            $this->view('templates/header', $data);
            $this->view('user/edit', $data);
            $this->view('templates/footer');
        }
    }

    public function getedit()
    {
        if (!isset($_POST)) {
            header('Location: ' . BASEURL . '/User');
            exit;
        }
        if ($this->model('User_model')->editDataUser($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/User');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/User');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('User_model')->hapusDataUser($id) > 0) {
            flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/User');
            exit;
        } else if ($this->model('User_model')->hapusDataUser($id) == 'id digunakan') {
            flasher::setFlash('Gagal', 'Dihapus karena id user digunakan', 'danger');
            header('Location: ' . BASEURL . '/User');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/User');
            exit;
        }
    }
}
