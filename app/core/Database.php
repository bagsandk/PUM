<?php
class Database
{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh; //database handler
	private $stmt; //statement

	public function __construct()
	{
		//data source name
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
		//optimasi database
		$option = [
			PDO::ATTR_PERSISTENT => true, //koneksi database terjaga terus
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];
		try {
			$this->dbh = new PDO($dsn, $this->user, $this->pass, $option); //konek ke database
		} catch (PDOexeption $e) //pesan error
		{
			die($e->getMessage);
		}
	}
	//menyiapkan query sebelum dieksekusi di tampung pada stmt
	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}
	public function bind($param, $value, $type = null)
	{
		//mengecek type dari sebuah nila /$value agar terhindar dari sql injection
		if (is_null($type)) {
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
				default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	//menjalankan quey statement
	public function execute()
	{
		$this->stmt->execute();
	}
	//menampilkan semua data
	public function resultSet()
	{
		$this->execute();
		return $this->stmt->fetchALL(PDO::FETCH_ASSOC);
	}
	//menampilkan salah satu data
	public function single()
	{
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	//menghitungbarisupdate
	public function rowCount()
	{
		return $this->stmt->rowCount();
	}
}
