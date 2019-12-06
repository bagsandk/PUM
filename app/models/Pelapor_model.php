<?php
class Pelapor_model
{
    private $table = 'pelapor';
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
    public function tambahDataPelapor($data)
    {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $namafoto = date('dmYHis') . $foto;
        $path = './img/pelapor/' . $namafoto;

        if (move_uploaded_file($tmp, $path)) {
            $query = "INSERT INTO " . $this->table . "(email, password, foto, status) VALUES (:email, :password, :foto,'1')";
            $this->db->query($query);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', md5($data['password']));
            $this->db->bind('foto', $namafoto);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }
    public function editDataPelapor($data)
    {
        $query = "UPDATE " . $this->table . " SET 
		email = :email,
		password = :password,
		foto = :foto
		WHERE id_pelapor = :id_pelapor";

        $this->db->query($query);
        $this->db->bind('id_pelapor', $data['id_pelapor']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', md5($data['password']));
        $this->db->bind('foto', $data['foto']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataPelapor($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_pelapor = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
