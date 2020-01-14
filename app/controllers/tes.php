<?php
class tes extends Controller
{
    public function index()
    {
        $get = $this->model('Kehilangan_model')->getKehilanganByIdP($_SESSION['user']);
        foreach ($get as $i) {
            $c[] = $i['id_kehilangan'];
        }
        if (in_array(1, $c, true)) {
            header('Location: ' . BASEURL . '/Kehilangan');
            exit;
        }
    }
}
