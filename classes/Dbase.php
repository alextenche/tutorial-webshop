<?php
class Dbase{

	private $_host = "localhost";
	private $_user = "root";
	private $_password = "";
	private $_name = "eCommerce";
	
	private $_conndb = false;
	public $_last_query = null;
	public $_affected_rows = 0;
	
	public $_insert_keys = array();
	public $_insert_values = array();
	public $_update_sets = array();
	
	public $_id;
	
	
	// constructor
	public function __construct(){
		$this->connect();
	}
	
	
	// conntect to database
	private function connect(){
		$this->_conndb = mysqli_connect($this->_host, $this->_user, $this->_password );
		
		if(!$this->_conndb){
			die("Database connection failed:<br />" . mysql_error());
		} else {
			$_select = mysqli_select_db($this->_conndb, $this->_name);
			if(!$_select){
				die("Database selection failed:<br />" . mysql_error());
			}
		}
		mysqli_set_charset($this->_conndb, "utf8");
	}
	
	
	// close connection
	public function close(){
		if(!mysql_close($this->_conndb)){
			die("Closing connection failed.");
		}
	}
	
	
	// remove illegal characters
	public function escape( $value ){
		if(function_exists("mysql_real_escape_string")){
			if(get_magic_quotes_gpc()){
				$value = stripcslashes($value);
			}
			$value = mysqli_real_escape_string($this->_conndb,$value);
		} else {
			if(!get_magic_quotes_gpc()){
				$value = addcslashes($value);
			}
		}
		return $value;
	}
	
	
	// query the database
	public function query( $sql ){
		$this->_last_query = $sql;
		$result = mysqli_query($this->_conndb, $sql);
		$this->displayQuery($result);
		return $result;
	}
	
	
	// returns result from query to database
	public function displayQuery($result){
		if(!$result){
			$output = "Database query failed: " . mysql_error() . "<br>";
			$output .= "Last SQL query was: " . $this->_last_query;
			die($output);
		} else {
			$this->_affected_rows = mysqli_affected_rows($this->_conndb);
		}
	
	}
	
	
	// fetch all
	public function fetchAll($sql){
		$result = $this->query($sql);
		$out = array();
		
		while($row = mysqli_fetch_assoc($result)){
			$out[] = $row;
		}
		mysqli_free_result($result);
		return $out;
	}
	
	
	// return the first record from an array
	public function fetchOne($sql){
		$out = $this->fetchAll($sql);
		return array_shift($out);
	}
	
	
	// return last inserted id
	public function lastId(){
		return mysqli_insert_id($this->_conndb);
	}
	
	
	// prepare insert for new user( or other ? )
	public function prepareInsert($array = null) {
		if (!empty($array)) {
			foreach($array as $key => $value) {
				$this->_insert_keys[] = $key;
				$this->_insert_values[] = $this->escape($value);
			}
		}
	}
	
	
	
	
	// insert new user( or other ? )	
	public function insert($table = null) {
		
		if (
			!empty($table) && 
			!empty($this->_insert_keys) && 
			!empty($this->_insert_values)
		) {
		
			$sql  = "INSERT INTO `{$table}` (`";
			$sql .= implode("`, `", $this->_insert_keys);
			$sql .= "`) VALUES ('";
			$sql .= implode("', '", $this->_insert_values);
			$sql .= "')";
			
			if ($this->query($sql)) {
				$this->_id = $this->lastId();
				return true;
			}
			return false;
		}	
	}
	
	
	
	
	
	// prepare update
	public function prepareUpdate($array = null){
		if(!empty($array)){
			foreach($array as $key => $value){
				$this->_update_sets[] = "`{$key}` = '".$this->escape($value)."'";
			}
		}
	}
	
	
	
	
	
	
	
	// update
	public function update($table = null, $id = null){
		if(!empty($table) && !empty($id) && !empty($this->_update_sets)){
			$sql  = "UPDATE `{$table}` SET ";
			$sql .= implode(", ", $this->_update_sets);
			$sql .= " WHERE `id` = '".$this->escape($id)."'";
			return $this->query($sql);
		}
	}
	
}