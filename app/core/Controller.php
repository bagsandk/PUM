<?php
class Controller
{

	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}
	public function tgl_indo($tgl)
	{
		$bulan = array(
			1 => 'Januari',
			'Febuari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$parse = explode('-', $tgl);
		return $parse[2] . ' ' . $bulan[(int) $parse[1]] . ' ' . $parse[0];
	}
	public function hari($hari)
	{
		$konv = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		$day = date('D', strtotime($hari));
		return $konv[$day];
	}
	public function waktu($waktu)
	{
		return date('H:i', strtotime($waktu));
	}
}
