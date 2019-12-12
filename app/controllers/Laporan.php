<?php

class Laporan extends Controller
{

    public function index()
    {
        $data['laporan'] = $this->model('Laporan_model')->getALLLaporan();
        $data['kel'] = $this->model('Kehilangan_model')->getALLKehilangan();
        $data['judul'] = 'Laporan';
        $this->view('templates/header', $data);
        $this->view('laporan/index', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Laporan_model')->tambahDataLaporan($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/Laporan');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/Laporan');
            exit;
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Laporan';
        $data['laporan'] = $this->model('Laporan_model')->getLaporanById($id);
        $this->view('templates/header', $data);
        $this->view('laporan/edit', $data);
        $this->view('templates/footer');
    }

    public function getedit()
    {
        if ($this->model('Laporan_model')->editDataLaporan($_POST) > 0) {
            flasher::setFlash('Berhasil', 'Diubah', 'success');
            header('Location: ' . BASEURL . '/Laporan');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Diubah', 'danger');
            header('Location: ' . BASEURL . '/Laporan');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Laporan_model')->hapusDataLaporan($id) > 0) {
            flasher::setFlash('Berhasil', 'Dihapus', 'success');
            header('Location: ' . BASEURL . '/Laporan');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/Laporan');
            exit;
        }
    }
}
