<?php
class Login extends Controller
{
    public function index()
    {
        $this->view('login/index');
    }

    public function masuk()
    {
        $data['user'] = $this->model('Login_model')->auth_user($_POST);
        $data['admin'] = $this->model('Login_model')->auth_admin($_POST);
        if ($data['user'] > 0) {
            $_SESSION['user'] = $data['user']['id_user'];
            $data['pelapor'] = $this->model('Pelapor_model')->getPelaporByUser($_SESSION['user']);
            $_SESSION['pelapor'] = $data['pelapor']['id_pelapor'];
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        } elseif ($data['admin'] > 0) {
            $_SESSION['admin'] = $data['admin']['id_admin'];
            $_SESSION['lvladmin'] = $data['admin']['lvl'];
            $_SESSION['unadmin'] = $data['admin']['username'];
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
        flasher::setFlash('Gagal', 'Login', 'danger');
        header('Location: ' . BASEURL . '/login');
        exit;
    }
    public function keluar()
    {
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
        unset($_SESSION['lvladmin']);
        unset($_SESSION['unadmin']);
        header('Location: ' . BASEURL);
    }
    public function daftar()
    {
        if ($this->model('User_model')->tambahDataUser($_POST) > 0) {
            $data['user'] = $this->model('Login_model')->auth_user($_POST);
            $_SESSION['user'] = $data['user']['id_user'];
            flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
            header('Location: ' . BASEURL . '/User');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/User');
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
