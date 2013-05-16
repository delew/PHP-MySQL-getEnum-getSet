<?php

// mysql connexion
$mysqli = new mysqli("localhost", "user", "password", "database");

/** 
* getEnum
*/
function getEnum($table, $field, $mask=false){
	global $mysqli;
	
	// get enum values from table definition
	$sql = "SHOW COLUMNS FROM ".$table." WHERE Field='".$field."'";
	$enum = $mysqli->query($sql)->fetch_array();
	$enum = explode("','", substr($enum['Type'], 6, -2));
	
	// re-index array from 1
	$enum = array_combine( range(1,count($enum)), $enum);
	
	if( $mask===false ) return $enum;
	elseif( $mask==0 ) return '';
	elseif( array_key_exists($mask, $enum) ) return	$enum[$mask];
	return false;
}

/** 
* getEnum
*/
function getSet($table, $field, $mask=false){
	global $mysqli;
	
	// get set values from table definition
	$sql = "SHOW COLUMNS FROM ".$table." WHERE Field='".$field."'";
	$setvalues = $mysqli->query($sql)->fetch_array();
	$setvalues = explode("','", substr($setvalues['Type'], 5, -2));
	
	// re-index array with SET field indexes
	$set = array();
	for($i=0; $i<count($setvalues); $i++){
		$idx = pow(2,$i);
		if( $mask===false || $idx & $mask ) $set[$idx] = $setvalues[$i];
	}
	return $set;
}