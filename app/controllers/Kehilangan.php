<?php

class Kehilangan extends Controller
{

    public function index()
    {
        $data['kehilangan'] = $this->model('Kehilangan_model')->getALLKehilangan();
        $data['judul'] = 'Kehilangan';
        $this->view('templates/header', $data);
        $this->view('kehilangan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Kehilangan_model')->tambahDataKehilangan($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Kehilangan';
        $data['kehilangan'] = $this->model('Kehilangan_model')->getKehilanganById($id);
        $this->view('templates/header', $data);
        $this->view('kehilangan/edit', $data);
        $this->view('templates/footer');
    }

    public function getedit()
    {
        if ($this->model('Kehilangan_model')->editDataKehilangan($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Kehilangan_model')->hapusDataKehilangan($id) > 0) {
            flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
    }
}
