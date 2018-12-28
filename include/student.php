<?php
class Student{
	private $id;
	private $name;
	private $password;
	private $gender;
	private $nativeplace;
	private $hobby;
	
	function setId($id){
		$this->id=$id;
	}
	function getId(){
		return $this->id;
	}
	
	function setName($name){
		$this->name=$name;
	}
	function getName(){
		return $this->name;
	}
	
	function setPassword($password){
		$this->password=$password;
	}
	function getPassword(){
		return $this->password;
	}
	
	function setGender($gender){
		$this->gender=$gender;
	}
	function getGender(){
		return $this->gender;
	}
	
	function setNativeplace($nativeplace){
		$this->nativeplace=$nativeplace;
	}
	function getNativeplace(){
		return $this->nativeplace;
	}
	
	function setHobby($hobby){
		$this->hobby=$hobby;
	}
	function getHobby(){
		return $this->hobby;
	}
}

?>