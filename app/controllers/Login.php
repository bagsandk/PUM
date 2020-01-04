<?php
class Login extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        if (isset($_SESSION['id'])) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } else {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }

    public function masuk()
    {
        $data['user'] = $this->model('Login_model')->auth_user($_POST);
        $data['admin'] = $this->model('Login_model')->auth_admin($_POST);
        if ($data['user'] > 0) {
            $_SESSION['id'] = 'User';
            $_SESSION['idu'] = 'User';
            $_SESSION['user'] = $data['user']['id_user'];
            $_SESSION['foto'] = $data['user']['foto'];
            $data['pelapor'] = $this->model('Pelapor_model')->getPelaporByUser($_SESSION['user']);
            $_SESSION['pelapor'] = $data['pelapor']['id_pelapor'];
            $_SESSION['nama'] = $data['pelapor']['nama'];;
            flasher::setFlash('Berhasil', 'Login', 'success');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } elseif ($data['admin'] > 0) {
            $_SESSION['id'] = 'Admin';
            $_SESSION['idu'] = 'User';
            $_SESSION['admin'] = $data['admin']['id_admin'];
            $_SESSION['nama'] = $data['admin']['nm_admin'];
            $_SESSION['lvladmin'] = $data['admin']['lvl'];
            $_SESSION['unadmin'] = $data['admin']['username'];
            flasher::setFlash('Berhasil', 'Login', 'success');
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
        flasher::setFlash('Salah', 'Memasukan Username/Password', 'danger');
        header('Location: ' . BASEURL . '/Dashboard');
        exit;
    }
    public function keluar()
    {
        unset($_SESSION['user']);
        unset($_SESSION['nama']);
        unset($_SESSION['id']);
        unset($_SESSION['admin']);
        unset($_SESSION['lvladmin']);
        unset($_SESSION['unadmin']);
        unset($_SESSION['pelapor']);
        unset($_SESSION['foto']);
        unset($_SESSION['idu']);
        unset($_SESSION['unadmin']);

        header('Location: ' . BASEURL);
    }
    public function daftar()
    {
        if ($this->model('Login_model')->cekuser($_POST['email']) < 1) {
            if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
                $data['user'] = $this->model('Login_model')->auth_user($_POST);
                $_SESSION['user'] = $data['user']['id_user'];
                $_SESSION['id'] = 'user';
                $_SESSION['idu'] = 'user';
                $_SESSION['foto'] = $data['user']['foto'];
                $data['pelapor'] = $this->model('Pelapor_model')->getPelaporByUser($_SESSION['user']);
                $_SESSION['pelapor'] = $data['pelapor']['id_pelapor'];
                flasher::setFlash('Berhasil', 'Daftar', 'success');
                header('Location: ' . BASEURL . '/Pelapor');
                exit;
            }
        } else {
            flasher::setFlash('Memasukan Email', 'Yang Telah Terdaftar', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
}
