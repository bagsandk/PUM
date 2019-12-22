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

        header('Location: ' . BASEURL);
    }
    public function daftar()
    {
        if ($this->model('Login_model')->cekuser($_POST['email']) > 0) {
            if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
                $data['user'] = $this->model('Login_model')->auth_user($_POST);
                $_SESSION['user'] = $data['user']['id_user'];
                $_SESSION['id'] = 'user';
                $_SESSION['foto'] = $data['user']['foto'];
                $data['pelapor'] = $this->model('Pelapor_model')->getPelaporByUser($_SESSION['user']);
                $_SESSION['pelapor'] = $data['pelapor']['id_pelapor'];
                flasher::setFlash('Berhasil', 'Daftar', 'success');
                header('Location: ' . BASEURL . '/User');
                exit;
            }
        } else {
            flasher::setFlash('Memasukan Email', 'Yang Telah Terdaftar', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
    // public function auth()
    // {

    //     if ($this->model('Login_model')->auth_admin($_POST) > 0) { //jika login sebagai dosen
    //         $data = $cek_dosen->row_array();
    //         $this->session->set_userdata('masuk', TRUE);
    //         if ($data['level'] == '1') { //Akses admin
    //             $this->session->set_userdata('akses', '1');
    //             $this->session->set_userdata('ses_id', $data['nip']);
    //             $this->session->set_userdata('ses_nama', $data['nama']);
    //             redirect('page');
    //         } else { //akses dosen
    //             $this->session->set_userdata('akses', '2');
    //             $this->session->set_userdata('ses_id', $data['nip']);
    //             $this->session->set_userdata('ses_nama', $data['nama']);
    //             redirect('page');
    //         }
    //     } else { //jika login sebagai mahasiswa
    //         $cek_mahasiswa = $this->login_model->auth_mahasiswa($username, $password);
    //         if ($cek_mahasiswa->num_rows() > 0) {
    //             $data = $cek_mahasiswa->row_array();
    //             $this->session->set_userdata('masuk', TRUE);
    //             $this->session->set_userdata('akses', '3');
    //             $this->session->set_userdata('ses_id', $data['nim']);
    //             $this->session->set_userdata('ses_nama', $data['nama']);
    //             redirect('page');
    //         } else {  // jika username dan password tidak ditemukan atau salah
    //             $url = base_url();
    //             echo $this->session->set_flashdata('msg', 'Username Atau Password Salah');
    //             redirect($url);
    //         }
    //     }
    // }

    // function logout()
    // {
    //     $this->session->sess_destroy();
    //     $url = base_url('');
    //     redirect($url);
    // }
}
