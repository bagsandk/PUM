<?php

class smtp extends Controller
{
    public function index()
    {
        $from_mail = 'babarianmetal@gmail.com';
        $to = 'bagas.sageng@gmail.com';

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
        if ($sendtomail) echo 'Success';
        else echo 'Failed';
    }
}
