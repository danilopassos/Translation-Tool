<?php
include_once(dirname(__FILE__) . '/../../../config.php');

class dbConnection {

        private function connect(){
		$conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE  , DB_USER , DB_PASS);
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
