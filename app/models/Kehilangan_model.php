<?php
class Kehilangan_model
{
    private $table = 'kehilangan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getALLKehilangan()
    {
        // tabel kehilangan idpelapor diganati nama
        $this->db->query('SELECT x.nama,z.* from pelapor as x, kehilangan as z where x.id_pelapor = z.id_pelapor ');
        return $this->db->resultSet();
    }
    public function getKehilanganByIdP($id)
    {
        //pelapor dan kehilanan lewat id pelapor
        $this->db->query('SELECT * FROM `user` as x INNER JOIN pelapor as z ON x.id_user = z.id_user INNER JOIN kehilangan as c ON c.id_pelapor = z.id_pelapor WHERE z.id_user=:id_user');
        $this->db->bind('id_user', $id);
        return $this->db->resultSet();
    }
    public function getKehilanganById($id)
    {
        //pelapor dan kehilanan lewat id pelapor
        $this->db->query('SELECT * FROM pelapor as z INNER JOIN kehilangan as c ON c.id_pelapor = z.id_pelapor WHERE c.id_kehilangan =:id_kel');
        $this->db->bind('id_kel', $id);
        return $this->db->single();
    }
    public function getALLKehilanganById($id)
    {
        // user pelapor kehilangan
        $this->db->query('CALL all_kehilangan_idpelapor (:id)');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahDataKehilangan($data)
    {
        $this->db->query("INSERT INTO " . $this->table . " VALUES ('', :id_pelapor, :nm_brg_doc, :ket, :tgl_hilang, :pukul, :tempat, '')");
        $this->db->bind('id_pelapor', $data['id_pelapor']);
        $this->db->bind('nm_brg_doc', $data['nm_brg_doc']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('tgl_hilang', $data['tgl_hilang']);
        $this->db->bind('pukul', $data['pukul']);
        $this->db->bind('tempat', $data['tempat']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function editDataKehilangan($data)
    {
        $query = "UPDATE kehilangan SET 
    	id_pelapor = :id_pelapor,
    	nm_brg_doc = :nm_brg_doc,
    	ket = :ket,
    	tgl_hilang = :tgl_hilang,
    	pukul = :pukul,
        st_lap = :st_lap,
    	tempat = :tempat
    	WHERE id_kehilangan = :id_kehilangan";

        $this->db->query($query);
        $this->db->bind('id_kehilangan', $data['id_kehilangan']);
        $this->db->bind('id_pelapor', $data['id_pelapor']);
        $this->db->bind('nm_brg_doc', $data['nm_brg_doc']);
        $this->db->bind('ket', $data['ket']);
        $this->db->bind('tgl_hilang', $data['tgl_hilang']);
        $this->db->bind('pukul', $data['pukul']);
        $this->db->bind('tempat', $data['tempat']);
        $this->db->bind('st_lap', $data['st_lap']);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function hapusDataKehilangan($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE ID_KEHILANGAN = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
    public function updateVerif($data)
    {
        $query = "UPDATE kehilangan SET st_lap = 1 where id_kehilangan = :id_kehilangan";
        $this->db->query($query);
        $this->db->bind('id_kehilangan', $data['id_kehilangan']);

        $this->db->execute();

        return $this->db->rowCount();
    }
} 

//SELECT * FROM `user` as x INNER JOIN pelapor as z ON x.id_user = z.id_user INNER JOIN kehilangan as c ON c.id_pelapor = z.id_pelapor WHERE z.id_pelapor=1

//CREATE PROCEDURE `tampil_kehilangan_byid`(IN `id` INT) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER BEGIN SELECT * FROM `user` as x INNER JOIN pelapor as z ON x.id_user = z.id_user INNER JOIN kehilangan as c ON c.id_pelapor = z.id_pelapor WHERE z.id_pelapor= id; END
