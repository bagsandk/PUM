<?php
class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getALLUser()
    {
        $this->db->query('select * from ' . $this->table);
        return $this->db->resultSet();
    }
    public function getUserNotIN()
    {
        $this->db->query('SELECT * FROM user WHERE NOT EXISTS (SELECT * FROM pelapor WHERE user.id_user = pelapor.id_user)');
        return $this->db->resultSet();
    }
    public function getUserById($id)
    {
        $this->db->query('select * from ' . $this->table . ' where id_user = :id_user');
        $this->db->bind('id_user', $id);
        return $this->db->single();
    }
    public function tambahDataUser($data)
    {
        if (isset($_POST['foto'])) {
            $foto = $_FILES['foto']['name'];
            $tmp = $_FILES['foto']['tmp_name'];
            $namafoto = date('dmYHis') . '-id_user=' . $_POST['id_user'] . '.jpg';
            $path = './img/user/' . $namafoto;
            if (move_uploaded_file($tmp, $path)) {
                $query = "INSERT INTO " . $this->table . "(email, password, foto,no_hp) VALUES (:email, :password, :foto, :no_hp)";
                $this->db->query($query);
                $this->db->bind('email', $data['email']);
                $this->db->bind('password', md5($data['password']));
                $this->db->bind('foto', $namafoto);
                $this->db->bind('no_hp',  $data['no_hp']);

                $this->db->execute();
                return $this->db->rowCount();
            }
        } elseif ($path == '') {
            $query = "INSERT INTO " . $this->table . "(email, password, foto, no_hp) VALUES (:email, :password, :foto, :no_hp)";
            $this->db->query($query);
            $this->db->bind('email', $data['email']);
            $this->db->bind('password', md5($data['password']));
            $this->db->bind('foto', 'default.png');
            $this->db->bind('no_hp',  $data['no_hp']);

            $this->db->execute();
            return $this->db->rowCount();
        }
    }
    public function editDataUser($data)
    {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $namafoto = date('dmYHis') . '-id_user=' . $_POST['id_user'] . '.jpg';
        $path = './img/user/' . $namafoto;
        if (move_uploaded_file($tmp, $path)) {
            if ($data['password'] == '') {
                $query = "UPDATE " . $this->table . " SET 
		email = :email,
        foto = :foto,
        no_hp = :no_hp
        WHERE id_user = :id_user";
            } else {
                $query = "UPDATE " . $this->table . " SET 
            email = :email,
            password = :password,
            foto = :foto,
            no_hp = :no_hp
            WHERE id_user = :id_user";
            }


            $this->db->query($query);
            $this->db->bind('id_user', $data['id_user']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('no_hp',  $data['no_hp']);
            $this->db->bind('foto', $namafoto);
            if ($data['password'] != '') {
                $this->db->bind('password', md5($data['password']));
            }

            $this->db->execute();

            return $this->db->rowCount();
        } else {
            if ($data['password'] == '') {
                $query = "UPDATE " . $this->table . " SET 
		email = :email,
        no_hp = :no_hp
        WHERE id_user = :id_user";
            } else {
                $query = "UPDATE " . $this->table . " SET 
                email = :email,
                password = :password,
                no_hp = :no_hp
                WHERE id_user = :id_user";
            }

            $this->db->query($query);
            $this->db->bind('id_user', $data['id_user']);
            $this->db->bind('email', $data['email']);
            $this->db->bind('no_hp',  $data['no_hp']);
            if ($data['password'] != '') {
                $this->db->bind('password', md5($data['password']));
            }


            $this->db->execute();

            return $this->db->rowCount();
        }
    }
    public function hapusDataUser($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id_user = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
