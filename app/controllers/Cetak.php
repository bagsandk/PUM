<?php
class cetak extends Controller
{
    public function index($id)
    {
        $data['kel'] = $this->model('Kehilangan_model')->getKehilangan($id);
        $ex = $data['kel'];
        var_dump($ex);
        var_dump($ex->nama);
    }
}
