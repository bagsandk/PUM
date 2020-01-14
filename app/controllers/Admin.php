<?php

class Admin extends Controller
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
		if ($_SESSION['lvladmin'] != 11) {
			$data['admin'] = $this->model('Admin_model')->getAdminById($_SESSION['admin']);
			$data['judul'] = 'Admin';
			$this->view('templates/header', $data);
			$this->view('admin/edit', $data);
			$this->view('templates/footer');
		} else {
			$data['admin'] = $this->model('Admin_model')->getALLAdmin();
			$data['judul'] = 'Admin';
			$this->view('templates/header', $data);
			$this->view('admin/index', $data);
			$this->view('templates/footer');
		}
	}

	public function tambah()
	{
		if (!isset($_POST['password'])) {
			header('Location: ' . BASEURL . '/Kehilangan');
			exit;
		}
		if ($this->model('Admin_model')->tambahDataAdmin($_POST) > 0) {
			flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
			header('Location: ' . BASEURL . '/Admin');
			exit;
		} else {
			flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
			header('Location: ' . BASEURL . '/Admin');
			exit;
		}
	}

	public function edit($id)
	{
		if ($_SESSION['lvladmin'] == 10) {
			header('Location: ' . BASEURL . '/admin');
			exit;
		}
		// if ($this->model('Admin_model')->tambahDataAdmin($_POST) > 0) {
		// 	flasher::setFlash('Berhasil', 'Ditambahkan', 'success');
		// 	header('Location: ' . BASEURL . '/Admin');
		// 	exit;
		// } else {
		// 	flasher::setFlash('Gagal', 'Ditambahkan', 'danger');
		// 	header('Location: ' . BASEURL . '/Admin');
		// 	exit;
		// }
		$data['judul'] = 'Ubah Data Admin';
		$data['admin'] = $this->model('Admin_model')->getAdminById($id);
		$this->view('templates/header', $data);
		$this->view('admin/edit', $data);
		$this->view('templates/footer');
	}

	public function getedit()
	{
		if (!isset($_POST['password'])) {
			header('Location: ' . BASEURL . '/Kehilangan');
			exit;
		}
		if ($this->model('Admin_model')->editDataAdmin($_POST) > 0) {
			flasher::setFlash('Berhasil', 'Diubah', 'success');
			header('Location: ' . BASEURL . '/Admin');
			exit;
		} else {
			flasher::setFlash('Gagal', 'Diubah', 'danger');
			header('Location: ' . BASEURL . '/Admin');
			exit;
		}
	}

	public function hapus($id)
	{
		if ($_SESSION['lvladmin'] == 10) {
			header('Location: ' . BASEURL . '/admin');
			exit;
		}
		if ($this->model('Admin_model')->hapusDataAdmin($id) > 0) {
			flasher::setFlash('Berhasil', 'Dihapus', 'success');
			header('Location: ' . BASEURL . '/Admin');
			exit;
		} else {
			flasher::setFlash('Gagal', 'Dihapus', 'danger');
			header('Location: ' . BASEURL . '/Admin');
			exit;
		}
	}
}
