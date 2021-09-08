<?php //Verstanden
abstract class Model{
	protected $dbh;
	protected $stmt;

	public function __construct(){ //Aufbau der Datenbank mit Arbeit der config.php
		$this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS); //Datenbank wird geladen
	}

	public function query($query){
		$this->stmt = $this->dbh->prepare($query); //Wird prepared für den Weiterverbrauch
	}

	//Binds the prep statement
	public function bind($param, $value, $type = null){ //Sicherheit damit kein SQL Code sich einschläusst (Prüfung)
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

	public function execute(){
		$this->stmt->execute(); //Führt ein Prepared Statement aus
	}

	public function resultSet(){
		$this->execute();   //Wird ausgeführt
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //Gibt einen Array wieder in einen Row
	}

	public function lastInsertId(){
	    return $this->dbh->lastInsertId();
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}