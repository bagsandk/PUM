<?php
class Pralapor_model
{
    private $table = 'dk_sementara';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getALLPralapor()
    {
        $this->db->query('select * from ' . $this->table);
        return $this->db->resultSet();
    }
    public function getPralaporById($id)
    {
        $this->db->query('select * from ' . $this->table . ' where id_ds = :id_ds');
        $this->db->bind('id_admin', $id);
        return $this->db->single();
    }
    //     public function tambahDataPralapor($data)
    //     {
    //         $query = "INSERT INTO " . $this->table . " VALUES ('',:nm_admin, :username, :password)";
    //         $this->db->query($query);
    //         $this->db->bind('nm_admin', $data['nama']);
    //         $this->db->bind('username', $data['username']);
    //         $this->db->bind('password', md5($data['password']));

    //         $this->db->execute();

    //         return $this->db->rowCount();
    //     }
    //     public function editDataPralapor($data)
    //     {
    //         $query = "UPDATE admin SET 
    // 		nm_admin = :nm_admin,
    // 		username = :username,
    // 		password = :password 
    // 		WHERE id_admin = :id_admin";

    //         $this->db->query($query);
    //         $this->db->bind('id_admin', $data['id_admin']);
    //         $this->db->bind('nm_admin', $data['nm_admin']);
    //         $this->db->bind('username', $data['username']);
    //         $this->db->bind('password', md5($data['password']));

    //         $this->db->execute();

    //         return $this->db->rowCount();
    //     }
    //     public function hapusDataPralapor($id)
    //     {
    //         $query = "DELETE FROM " . $this->table . " WHERE ID_" . $this->table . " = :id";
    //         $this->db->query($query);
    //         $this->db->bind('id', $id);

    //         $this->db->execute();

    //         return $this->db->rowCount();
    //     }
}
