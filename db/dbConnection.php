<?php

require_once 'config.php';

class dbConnection {

	private $user = "root";
	private $pass = "";
	private $host = "localhost";
	private $database = "ZeldaSS_Translate_Tool";
        protected $prefix = "tt_";


        private function connect(){
		$conn = new PDO("mysql:host=$this->host;dbname=$this->database",$this->user, $this->pass);
		return $conn;
	}
	
	//usar para selects e inserts no db
	public function runQuery($sql){
		$stm = $this->connect()->prepare($sql);
		$stm->execute();
	}
	
	//usar apenas em selects
	public function runSelect($sql){
		$stm = $this->connect()->prepare($sql);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
}

?>
