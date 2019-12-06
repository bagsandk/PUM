<?php
class flasher
{

    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }
    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo ' <div class="alert alert-' . $_SESSION['flash']['tipe'] . '">
                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                    <i class="nc-icon nc-simple-remove"></i>
                    </button>
                    <span> Data 
                    <b>' . $_SESSION['flash']['pesan'] . '</b> ' . $_SESSION['flash']['aksi'] . '</span>
                    </div>';
        }
        unset($_SESSION['flash']);
    }
}
