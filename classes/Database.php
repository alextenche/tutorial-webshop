<?php

class Database{

	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $dbname = 'ecommerce';
	
	private $dbh;
	private $error;
	private $stmt;
	


	// constructor
	public function __construct(){
		
		$dns = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		$options = array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		
		try{
			$this->dbh = new PDO($dns, $this->user, $this->pass, $options);
		}
		catch(PDOException $e){
			$this->error = $e->getMessage();
		}
	}
	
	

	// query
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}
	


	// general bind
	public function bind( $param, $value, $type = null ){

		if( is_null($type) ){
			switch(true){
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
	
	
	// execute
	public function execute(){
		
		return $this->stmt->execute();
	}
	
	
	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
	
	
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	
	
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
	
	public function beginTransaction(){
		return $this->dbh->beginTransaction();
	}
	
	
	public function endTransaction(){
		return $this->dbh->commit();
	}
	
	public function cancelTransaction(){
		return $this->dbh->rollBack();
	}
	
}