<?php
class tes extends Controller
{
    public function index()
    {
        // echo date('Y-m-d', time());
        $waktu = '10:08:09';
        echo date('H:i', strtotime($waktu));
    }
}
