<?php
class User {

	public $id;
	public $name;

	public function getId(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($value){
		$this->name = $value;
	}

	public function getData(){
		return array(
			'id'=> $this->id,
			'name'=> $this->name,
			);
	}
}
?>