<?php

class Kehilangan extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['pelapor']) && !isset($_SESSION['admin'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    public function index()
    {
        if (isset($_SESSION['user'])) {

            $data['kehilangan'] = $this->model('Kehilangan_model')->getKehilanganByIdP($_SESSION['user']);
            $data['judul'] = 'Kehilangan';
            $this->view('templates/header', $data);
            $this->view('kehilangan/index', $data);
            $this->view('templates/footer');
        } else {
            $data['kehilangan'] = $this->model('Kehilangan_model')->getALLKehilangan();
            $data['judul'] = 'Kehilangan';
            $this->view('templates/header', $data);
            $this->view('kehilangan/index', $data);
            $this->view('templates/footer');
        }
    }

    public function tambah()
    {
        $data['pelapor'] = $this->model('Pelapor_model')->getALLPelapor();
        if (isset($_SESSION['user'])) {
            $data['pelaporbyu'] = $this->model('Pelapor_model')->getPelaporByUser($_SESSION['user']);
        }
        $data['judul'] = 'Tambah Kehilangan';
        $this->view('templates/header', $data);
        $this->view('kehilangan/tambah', $data);
        $this->view('templates/footer');
    }
    public function detail($id)
    {
        if (isset($_SESSION['user'])) {
            $get['kehilangan'] = $this->model('Kehilangan_model')->getKehilanganByIdP($_SESSION['user']);
            foreach ($get['kehilangan'] as $row) {
                $cek = $row['id_kehilangan'];
            }
            if ($id != $cek) {
                header('Location: ' . BASEURL . '/Kehilangan');
                exit;
            }
            $data['kehilangan'] = $this->model('Kehilangan_model')->getALLKehilanganById($id);
            $data['judul'] = 'Detail Kehilangan';
            $this->view('templates/header', $data);
            $this->view('kehilangan/detail', $data);
            $this->view('templates/footer');
        } else {
            $data['kehilangan'] = $this->model('Kehilangan_model')->getALLKehilanganById($id);
            $data['judul'] = 'Detail Kehilangan';
            $this->view('templates/header', $data);
            $this->view('kehilangan/detail', $data);
            $this->view('templates/footer');
        }
    }
    public function tambahdata()
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
        if (isset($_SESSION['user'])) {
            $get['kehilangan'] = $this->model('Kehilangan_model')->getKehilanganByIdP($_SESSION['user']);
            foreach ($get['kehilangan'] as $row) {
                $cek = $row['id_kehilangan'];
            }
            if ($id != $cek) {
                header('Location: ' . BASEURL . '/Kehilangan');
                exit;
            }
            $data['judul'] = 'Ubah Data Kehilangan';
            $data['kehilangan'] = $this->model('Kehilangan_model')->getKehilanganById($id);
            $data['pelapor'] = $this->model('Pelapor_model')->getALLPelapor();
            $this->view('templates/header', $data);
            $this->view('kehilangan/edit', $data);
            $this->view('templates/footer');
        } else {
            $data['judul'] = 'Ubah Data Kehilangan';
            $data['kehilangan'] = $this->model('Kehilangan_model')->getKehilanganById($id);
            $data['pelapor'] = $this->model('Pelapor_model')->getALLPelapor();
            $this->view('templates/header', $data);
            $this->view('kehilangan/edit', $data);
            $this->view('templates/footer');
        }
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
        if (isset($_SESSION['user'])) {
            $get['kehilangan'] = $this->model('Kehilangan_model')->getKehilanganByIdP($_SESSION['user']);
            foreach ($get['kehilangan'] as $row) {
                $cek = $row['id_kehilangan'];
            }
            if ($id != $cek) {
                header('Location: ' . BASEURL . '/Kehilangan');
                exit;
            }
        }
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
