<?php

class Pelapor extends Controller
{

    public function index()
    {
        if (!isset($_SESSION['user'])) {
            $data['pelapor'] = $this->model('Pelapor_model')->getALLPelapor();
            $data['judul'] = 'Pelapor';
            $this->view('templates/header', $data);
            $this->view('pelapor/index', $data);
            $this->view('templates/footer');
        }
        $data['pelapor'] = $this->model('Pelapor_model')->getPelaporByUser($_SESSION['user']);
        $data['judul'] = 'Pelapor';
        $this->view('templates/header', $data);
        $this->view('pelapor/edit', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Pelapor_model')->tambahDataPelapor($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Pelapor';
        $data['pelapor'] = $this->model('Pelapor_model')->getPelaporById($id);
        $this->view('templates/header', $data);
        $this->view('pelapor/edit', $data);
        $this->view('templates/footer');
    }

    public function getedit()
    {
        if ($_POST['id_user'] > 0) {
            if ($this->model('Pelapor_model')->editDataPelapor($_POST) > 0) {
                flasher::setFlash('Berhasil', 'Diubah', 'success');
                header('Location: ' . BASEURL . '/Pelapor');
                exit;
            } else {
                flasher::setFlash('Gagal', 'Diubah', 'danger');
                header('Location: ' . BASEURL . '/Pelapor');
                exit;
            }
        } else {
            if ($this->model('Pelapor_model')->tambahDataPelapor($_POST) > 0) {
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

    public function hapus($id)
    {
        if ($this->model('Pelapor_model')->hapusDataPelapor($id) > 0) {
            flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/Pelapor');
            exit;
        }
    }
}
