<?php

class Form{

	// check if a field is posted
	public function isPost( $field = null ) {
		if ( !empty($field) ) {
			if ( isset($_POST[$field]) ) {
				return true;
			}
			return false;			
		} else {
			if (!empty($_POST)) {
				return true;
			}
			return false;
		}
	}
	
	
	// returns a posted field
	public function getPost( $field = null ) {
		if ( !empty($field) ) {
			return $this->isPost($field) ? strip_tags($_POST[$field]) : null;
		}
	}
	
	
	// keeps the selected option - used in country selection
	public function stickySelect( $field, $value, $default = null ) {
		if ( $this->isPost($field) && $this->getPost($field) == $value ) {
			return ' selected="selected"';
		} else {
			return !empty($default) && $default == $value ? ' selected="selected"' : null;
		}
	}
	
	
	// keeps the writed text
	public function stickyText( $field, $value = null ) {
		if ($this->isPost($field)) {
			return stripslashes($this->getPost($field));
		} else {
			return !empty($value) ? $value : null;
		}
	}
	
	
	// gets the select country
	public function getCountriesSelect( $record = null ){

		$objCountry = new Country();
		$countries = $objCountry->getCountries();
		if( !empty($countries) ) {
			$out = '<select name="country" id="country" class="sel">';
			if( empty($record) ){
				$out .= '<option value="">Select one&hellip;</option>';
			}
			foreach($countries as $country){
				$out .= "<option value=\"";
				$out .= $country['id'];
				$out .= "\"";
				$out .= $this->stickySelect( 'country', $country['id'], $record );
				$out .= ">";
				$out .= $country['name'];
				$out .= "</option>";
			}
			$out .= "</select>";
			return $out;
		}
	}
	
	
	// used in validation - check the posted values
	public function getPostArray( $expected = null ) {

		$out = array();

		if ( $this->isPost() ) {
			foreach( $_POST as $key => $value ){
				if( !empty($expected) ){
					if(in_array($key, $expected)){
						$out[$key] = strip_tags($value);
					}
				} else {
					$out[$key] = strip_tags($value);
				}		
			}
		}
		return $out;
	}
	
	
}