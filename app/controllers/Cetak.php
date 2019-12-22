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
    }
    public function index($id)
    {
        $data['lap'] = $this->model('Laporan_model')->getLaporanByIdKel($id);
        if ($data['lap'] !== null) {
            $data['kel'] = $this->model('Kehilangan_model')->getALLKehilanganById($id);
            $data['harih'] = $this->hari($data['kel']['tgl_hilang']);
            $data['tglh'] = $this->tgl_indo($data['kel']['tgl_hilang']);
            $data['pukul'] = $this->tgl_indo($data['kel']['pukul']);

            $data['tgll'] = $this->tgl_indo($data['kel']['tgl_lahir']);

            $data['harib'] = $this->hari($data['lap']['tgl_surat']);
            $data['tglb'] = $this->tgl_indo($data['lap']['tgl_surat']);
            $data['waktu'] = $this->tgl_indo($data['lap']['waktu']);
            $this->view('cetak/cetak', $data);
        } else {
            $this->model('Laporan_model')->tambahLaporan($id);
            $data['kel'] = $this->model('Kehilangan_model')->getALLKehilanganById($id);
            $data['harih'] = $this->hari($data['kel']['tgl_hilang']);
            $data['tglh'] = $this->tgl_indo($data['kel']['tgl_hilang']);
            $data['pukul'] = $this->waktu($data['kel']['pukul']);

            $data['tgll'] = $this->tgl_indo($data['kel']['tgl_lahir']);

            $data['harib'] = $this->hari($data['lap']['tgl_surat']);
            $data['tglb'] = $this->tgl_indo($data['lap']['tgl_surat']);
            $data['waktu'] = $this->waktu($data['lap']['waktu']);
            $this->view('cetak/cetak', $data);
        }
    }
    public function verif()
    {
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
        if ($this->model('Kehilangan_model')->updateVerif($_POST) > 0) {
            $sendtomail = mail($to, $subject, $message, $headers);
            if ($sendtomail) {
                flasher::setFlash('Berhasil', 'Diverifikasi + Email Sukses', 'success');
                header('Location: ' . BASEURL . '/Kehilangan');
                exit;
            } else {
                flasher::setFlash('Berhasil', 'Diverifikasi + Email Gagal', 'success');
                header('Location: ' . BASEURL . '/Kehilangan');
                exit;
            }
        } else {
            flasher::setFlash('Gagal', 'Diverifikasi', 'danger');
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
        $this->view('Kehilangan/');
    }
}
