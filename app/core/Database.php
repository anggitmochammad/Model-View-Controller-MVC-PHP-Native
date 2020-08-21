<?php  

class Database{
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db_name = DB_NAME;

	private $dbh;
	private $stmt;

	public function __construct()
	{	
		//data source name
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;

		//option untuk mengoptimasi database
		$option = [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		];

		// mencoba check apakah koneksi berhasil apa tidak
		try {
			$this->dbh = new PDO($dsn,$this->user,$this->pass,$option);
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}

	//function untuk melakukan query database
	public function query($query)
	{
		$this->stmt = $this->dbh->prepare($query);
	}
	//berfungsi untuk membersihkan sebelum dimasukkan query
	public function bind($param, $value, $type=null)
	{	
		//jika tipe null maka pilih salah satu tipe
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
		$this->stmt->bindvalue($param,$value,$type);
	}

	public function execute()
	{
		$this->stmt->execute();
	}
	public function resultSet()
	{ //mengambil semua data
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	public function single()
	{ //mengambil satu data
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	//menghitung berapa baris yang berubah pada tabel
	public function rowCount()
	{
		return $this->stmt->rowCount();
	}



}