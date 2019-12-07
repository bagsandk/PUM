
<?php
class Login_model
{
    private $table = 'admin';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    //cek nip dan password dosen
    function auth_admin($data)
    {
        $this->db->query = ("SELECT * FROM admin WHERE username = :username AND password = MD5(':password' LIMIT 1");
        $this->db->bind('username', $data['username']);
        $this->db->bind('password', $data['password']);
        return $this->db->single();
    }
    //cek nim dan password mahasiswa
    function auth_user($data)
    {
        $this->db->query("SELECT * FROM user WHERE email = :email and password = :password");
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', md5($data['password']));
        return $this->db->single();
    }
}
