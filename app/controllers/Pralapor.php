<?php

class Pralapor extends Controller
{

    public function index()
    {
        $data['pralapor'] = $this->model('Pralapor_model')->getALLPralapor();
        $data['judul'] = 'Pralapor';
        $this->view('templates/header', $data);
        $this->view('pralapor/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Pralapor_model')->tambahDataPralapor($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Pralapor');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Pralapor');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Pralapor';
        $data['pralapor'] = $this->model('Pralapor_model')->getPralaporById($id);
        $this->view('templates/header', $data);
        $this->view('pralapor/edit', $data);
        $this->view('templates/footer');
    }

    public function getedit()
    {
        if ($this->model('Pralapor_model')->editDataPralapor($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/Pralapor');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/Pralapor');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Pralapor_model')->hapusDataPralapor($id) > 0) {
            flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/Pralapor');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/Pralapor');
            exit;
        }
    }
}
