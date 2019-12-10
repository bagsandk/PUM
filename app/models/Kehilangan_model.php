<?php
class Kehilangan_model
{
    private $table1 = 'lapkehilangan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getALLKehilangan()
    {
        $this->db->query('SELECT x.nama,z.* from pelapor as x, kehilangan as z where x.id_pelapor = z.id_pelapor ');
        return $this->db->resultSet();
    }
    public function getKehilanganById($id)
    {
        $this->db->query('SELECT x.nama,z.* from pelapor as x, kehilangan as z where x.id_pelapor = z.id_pelapor ');
        $this->db->bind('id_lap', $id);
        return $this->db->single();
    }
    public function getKehilangan($id)
    {
        $this->db->query('SELECT x.*,z.* from pelapor as x, kehilangan as z where x.id_pelapor = z.id_pelapor ');
        $this->db->bind('id_lap', $id);
        return $this->db->single();
    }
}
