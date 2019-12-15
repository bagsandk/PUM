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
        $data['kel'] = $this->model('Kehilangan_model')->getALLKehilanganById($id);
        $data['hari'] = $this->hari($data['kel']['tgl_hilang']);
        $data['tgl'] = $this->tgl_indo($data['kel']['tgl_hilang']);
        $this->view('cetak/cetak', $data);
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
