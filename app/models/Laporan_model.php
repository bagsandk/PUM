<?php
class Laporan_model
{
    private $table = 'lapkehilangan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getALLLaporan()
    {
        $this->db->query('select * from ' . $this->table);
        return $this->db->resultSet();
    }
    public function getLaporanById($id)
    {
        $this->db->query('select * from ' . $this->table . ' where id_lap = :id_lap');
        $this->db->bind('id_lap', $id);
        return $this->db->single();
    }
    // public function tambahDataLaporan($data)
    // {
    //     $query = "INSERT INTO " . $this->table . " VALUES ('',:nm_admin, :username, :password)";
    //     $this->db->query($query);
    //     $this->db->bind('nm_admin', $data['nama']);
    //     $this->db->bind('username', $data['username']);
    //     $this->db->bind('password', md5($data['password']));

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
    // public function editDataLaporan($data)
    // {
    //     $query = "UPDATE admin SET 
    // 	nm_admin = :nm_admin,
    // 	username = :username,
    // 	password = :password 
    // 	WHERE id_lap = :id_lap";

    //     $this->db->query($query);
    //     $this->db->bind('id_lap', $data['id_lap']);
    //     $this->db->bind('nm_admin', $data['nm_admin']);
    //     $this->db->bind('username', $data['username']);
    //     $this->db->bind('password', md5($data['password']));

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
    // public function hapusDataLaporan($id)
    // {
    //     $query = "DELETE FROM " . $this->table . " WHERE ID_ADMIN = :id";
    //     $this->db->query($query);
    //     $this->db->bind('id', $id);

    //     $this->db->execute();

    //     return $this->db->rowCount();
    // }
}
