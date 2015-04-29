<?php

class Country extends Application{

	// gets all countries from database
	public function getCountries(){
		$sql = "SELECT * FROM `countries`
				ORDER BY `name` ASC";
		return $this->db->fetchAll($sql);
	}

	
	// get one county from database
	public function getCountry( $id = null ){
		if(!empty($id)){
			$sql = "SELECT * FROM `countries`
					WHERE `id` = '".$this->db->escape($id)."'";
			return $this->db->fetchOne($sql);
		}
	}
	
		
}
