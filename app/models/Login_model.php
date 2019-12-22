
<?php
class Login_model
{
    private $table = 'admin';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    function auth_admin($data)
    {
        $this->db->query("SELECT * FROM admin WHERE username = :username and password = :password ");
        $this->db->bind('username', $data['email']);
        $this->db->bind('password', md5($data['password']));
        return $this->db->single();
    }

    function auth_user($data)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email and password = :password");
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', md5($data['password']));
        return $this->db->single();
    }
    function cekuser($data)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email ");
        $this->db->bind('email', $data['email']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
