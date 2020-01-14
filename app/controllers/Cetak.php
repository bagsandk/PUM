<?php
class cetak extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
        if (isset($_SESSION['lvladmin']) && $_SESSION['lvladmin'] == 12) {
            header('Location: ' . BASEURL . '/dashboard');
            exit;
        }
    }
    public function index($id)
    {
        $data['lap'] = $this->model('Laporan_model')->getLaporanByIdKel($id);
        if ($data['lap'] > 0) {
            $data['kel'] = $this->model('Kehilangan_model')->getALLKehilanganById($id);
            $data['harih'] = $this->hari($data['kel']['tgl_hilang']);
            $data['tglh'] = $this->tgl_indo($data['kel']['tgl_hilang']);
            $data['pukul'] = $this->waktu($data['kel']['pukul']);

            $data['tgll'] = $this->tgl_indo($data['kel']['tgl_lahir']);

            $data['harib'] = $this->hari($data['lap']['tgl_surat']);
            $data['tglb'] = $this->tgl_indo($data['lap']['tgl_surat']);
            $data['noromw'] = $this->bulanRomawi($data['lap']['tgl_surat']);
            $data['waktu'] = $this->waktu($data['lap']['waktu']);
            $this->view('cetak/index', $data);
        } else {
            $this->model('Laporan_model')->tambahLaporan($id);
            $data['lap'] = $this->model('Laporan_model')->getLaporanByIdKel($id);
            $data['kel'] = $this->model('Kehilangan_model')->getALLKehilanganById($id);
            $data['harih'] = $this->hari($data['kel']['tgl_hilang']);
            $data['tglh'] = $this->tgl_indo($data['kel']['tgl_hilang']);
            $data['pukul'] = $this->waktu($data['kel']['pukul']);

            $data['tgll'] = $this->tgl_indo($data['kel']['tgl_lahir']);

            $data['harib'] = $this->hari($data['lap']['tgl_surat']);
            $data['tglb'] = $this->tgl_indo($data['lap']['tgl_surat']);
            $data['noromw'] = $this->bulanRomawi($data['lap']['tgl_surat']);
            $data['waktu'] = $this->waktu($data['lap']['waktu']);
            $this->view('cetak/index', $data);
        }
    }
    public function verif()
    {
        if (!isset($_POST['email'])) {
            header('Location: ' . BASEURL . '/kehilangan/detail');
            exit;
        }
        $from_mail = 'babarianmetal@gmail.com';
        $to = $_POST['email'];

        $subject = 'Notifikasi SKTLK';
        $message = <<<AKAM
Surat Keterangan Tanda Lapor.<br>
<span style="color:#000000;font-weight:bold;">Surat Keterangan Tanda Lapor telah diverifikasi silahkan ambil ke polsek kedaton</span>
AKAM;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: Babarian <' . $to . '>' . "\r\n";
        $headers .= 'From: NO-REPLY <' . $from_mail . '>' . "\r\n";
        $sendtomail = mail($to, $subject, $message, $headers);
        if ($sendtomail) {
            $this->model('Kehilangan_model')->updateVerif($_POST);
            flasher::setFlash('Berhasil', 'Diverifikasi', 'success');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        } else {
            flasher::setFlash('Gagal', 'Diverifikasi', 'danger');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
        $this->view('Kehilangan/');
    }
    public function tolak()
    {
        if (!isset($_POST['email'])) {
            header('Location: ' . BASEURL . '/kehilangan/detail');
            exit;
        }
        $from_mail = 'babarianmetal@gmail.com';
        $to = $_POST['email'];

        $subject = 'Notifikasi SKTLK';
        $message = <<<AKAM
                    Surat Keterangan Tanda Lapor.<br>
                    <span style="color:#000000;font-weight:bold;">Surat Keterangan Tanda Lapor Ditolak karena alasan data, silahkan perbarui data anda atau datang langsung ke polsek kedaton</span>
                    AKAM;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: Babarian <' . $to . '>' . "\r\n";
        $headers .= 'From: NO-REPLY <' . $from_mail . '>' . "\r\n";
        $sendtomail = mail($to, $subject, $message, $headers);
        if ($sendtomail) {
            $this->model('Kehilangan_model')->updateTolak($_POST['id_kehilangan']);
            flasher::setFlash('Ditolak', 'Verifikasi', 'danger');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        } else {
            $this->view('Kehilangan/detail/' . $_POST['id_kehilangan']);
        }
    }
}
