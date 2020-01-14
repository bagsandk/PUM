<?php

class Kehilangan extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['pelapor']) && !isset($_SESSION['admin'])) {
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
        if (isset($_SESSION['lvladmin']) && $_SESSION['lvladmin'] == 10) {
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
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
        $i = (int) $id;
        if (isset($_SESSION['user'])) {
            $get = $this->model('Kehilangan_model')->getKehilanganByIdP($_SESSION['user']);
            foreach ($get as $row) {
                $cek[] = $row['id_kehilangan'];
            }
            if (in_array($i, $cek, false)) {
                var_dump($id);
                $data['kehilangan'] = $this->model('Kehilangan_model')->getALLKehilanganById($id);
                $data['judul'] = 'Detail Kehilangan';
                $this->view('templates/header', $data);
                $this->view('kehilangan/detail', $data);
                $this->view('templates/footer');
            } else {
                header('Location: ' . BASEURL . '/Kehilangan');
                exit;
            }
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
        if (!isset($_POST['ket'])) {
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
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
        if (!isset($_POST['ket'])) {
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
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
        } else if ($this->model('Kehilangan_model')->hapusDataKehilangan($id) == 'id digunakan') {
            flasher::setFlash('Gagal', 'Dihapus karena id Kehilangan digunakan', 'danger');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Dihapus', 'danger');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
    }
}
