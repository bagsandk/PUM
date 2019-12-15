<?php
class Dashboard extends Controller
{

	public function __construct()
	{
		if (!isset($_SESSION['id'])) {
			header('Location: ' . BASEURL . '/login');
			exit;
		}
	}
	public function index()
	{

		$data['judul'] = 'Dashboard';
		$this->view('templates/header', $data);
		$this->view('dashboard/index', $data);
		$this->view('templates/footer');
	}
}
