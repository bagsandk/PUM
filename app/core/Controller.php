<?php
class Controller
{
	public $hari = array(
		'Sun' => 'Minggu',
		'Mon' => 'Senin',
		'Tue' => 'Selasa',
		'Wed' => 'Rabo',
		'Thu' => 'Kamis',
		'Fri' => 'Jumat',
		'Sat' => 'Sabtu'
	);
	public $bulan = array(
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
	public function view($view, $data = [])
	{
		require_once '../app/views/' . $view . '.php';
	}
	public function model($model)
	{
		require_once '../app/models/' . $model . '.php';
		return new $model;
	}
}
