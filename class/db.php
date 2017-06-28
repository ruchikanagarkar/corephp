<?php

class Db {

	protected $conn;

	public function __construct(){
		$this->conn = new mysqli('localhost','username','password','databaseName');
		if($this->conn->connect_error){
			die('Connection Error:'. $this->conn->connect_error);
		}
		return $this->conn;
	}

	public function save($object){
		$sql = '';

		if(!$object->getId()){
			//insert
			$sql .= "INSERT INTO  user SET ";
		}
		else{
			//update
			$sql .= "UPDATE user SET ";
		}

		foreach($object->getData() as $key => $value){
			if($key != 'id'){
				$sql .= $key.'="'.$value.'",';
			}//if($key != 'id')

		}

		$sql = rtrim($sql,',');

		if($object->getId()){
			//update
			$sql .= "WHERE id=".$object->getId();
		}

		return $this->conn->query($sql);
	}
}
?>