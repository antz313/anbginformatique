<?php 
class DB{
	private $dbuser = 'root';
	private $dbpass = 'Test1234';
	private $dbhost = 'localhost';
	private $dbname = 'devis';
	private $db;
	
	public function __construct($dbhost = null, $dbuser = null, $dbpass = null, $dbname = null) {
		if($dbhost != null){
			$this->dbhost = $dbhost;
			$this->dbname = $dbname;
			$this->dbuser = $dbuser;
			$this->dbpass = $dbpass;
		}
		try {
		$this->db = new PDO('mysql:host='.$this->dbhost.';dbname='.$this->dbname, $this->dbuser, $this->dbpass, 
		array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
				PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
		}catch(PDOException $e) {
			die('<h1>Impossible de se connecter a la base de donnee</h1>');
		}
	}
		public function query($sql, $data = array()){
			$requete = $this->db->prepare($sql);
			$requete->execute($data);
			return $requete->fetchAll(PDO::FETCH_OBJ);
		}
	
}	
?>