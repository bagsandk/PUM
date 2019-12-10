<?php
class Pelapor_model
{
    private $table = 'Pelapor';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getALLPelapor()
    {
        $this->db->query('select * from ' . $this->table);
        return $this->db->resultSet();
    }
    public function getPelaporById($id)
    {
        $this->db->query('select * from ' . $this->table . ' where id_pelapor = :id_pelapor');
        $this->db->bind('id_pelapor', $id);
        return $this->db->single();
    }
    public function getPelaporByUser($id)
    {
        $this->db->query('select * from ' . $this->table . ' where id_user = :id_user');
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }
    public function tambahDataPelapor($data)
    {
        $query = "INSERT INTO " . $this->table . "(id_user,nik,nama,tmp_lahir,tgl_lahir,jk,alamat,agama,status,pekerjaan,kwn) VALUES (:id_user, :nik, :nama, :tmp_lahir, :tgl_lahir, :jk, :alamat, :agama, :status, :pekerjaan, :kwn )";
        $this->db->query($query);
        $this->db->bind('id_user', $_SESSION['user']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tmp_lahir', $data['tmp_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('pekerjaan', $data['pekerjaan']);
        $this->db->bind('kwn', $data['kwn']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function editDataPelapor($data)
    {
        $query = "UPDATE pelapor SET 
    		nik = :nik,
    		nama = :nama,
    		tmp_lahir = :tmp_lahir,
    		tgl_lahir = :tgl_lahir,
    		jk = :jk,
    		alamat = :alamat,
    		agama = :agama,
    		status = :status,
    		pekerjaan = :pekerjaan,
    		kwn = :kwn 
    		WHERE id_pelapor = :id_pelapor";

        $this->db->query($query);
        $this->db->query($query);
        $this->db->bind('id_pelapor', $data['id_pelapor']);
        $this->db->bind('nik', $data['nik']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tmp_lahir', $data['tmp_lahir']);
        $this->db->bind('tgl_lahir', $data['tgl_lahir']);
        $this->db->bind('jk', $data['jk']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('pekerjaan', $data['pekerjaan']);
        $this->db->bind('kwn', $data['kwn']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataPelapor($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE ID_" . $this->table . " = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
