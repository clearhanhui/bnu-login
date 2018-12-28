<?php
class StudentDao{
	private $conn;
	
	function __construct()
	{
		$dbHost = "localhost";
		$dbUser = "root";
		$dbPassword = "";
		$dbName = "bnu";
		$this->conn = new mysqli($dbHost,$dbUser,$dbPassword,$dbName);
	}
	
	function __destruct()
	{
		mysqli_close($this->conn);
	}
	
	function selecttAll()
	{
		$rows=array();
		$sql="select * from student";
		$resultSet=mysqli_query($this->conn, $sql);
		while($row=mysqli_fetch_array($resultSet, MYSQLI_ASSOC)){
			array_push($rows,$row);
		}
		mysqli_free_result($resultSet);
		return $rows;
	}
	
	function insert($student)
	{
		$name = $student->getName();
		$password = $student->getPassword();
		$gender = $student->getGender();
		$nativeplace = $student->getNativeplace();
		$hobby = $student->getHobby();
	    $sql="insert into student values(null,'$name',sha('$password'),'$gender','$nativeplace','$hobby')";
		mysqli_query($this->conn, $sql);
		$result = mysqli_affected_rows($this->conn);
		return $result;
	}
	function login($name,$password){
		$sql = "select * from student where name = '$name' and password=sha('$password')";
		$result = mysqli_query($this->conn, $sql);
		return mysqli_num_rows($result);
	}
	
	function updateById($student)
	{
		
		$id = $student->getId();
		$name = $student->getName();
		$password = $student->getPassword();
		$gender = $student->getGender();
		$nativeplace = $student->getNativeplace();
		$hobby = $student->getHobby();
	    $sql="update student set name='$name',gender='$gender',nativeplace='$nativeplace',hobby='$hobby' where id = $id";
		mysqli_query($this->conn, $sql);
		$result = mysqli_affected_rows($this->conn);
		return $result;
	}
	function selectByName($name)
	{
//		$name = $student->getName();
		$rows= array();
		$sql="select * from student where name = '$name'";
		$resultSet=mysqli_query($this->conn, $sql);
		while($row=mysqli_fetch_array($resultSet, MYSQLI_ASSOC)){
			array_push($rows,$row);
		}
		mysqli_free_result($resultSet);
		return $rows;
	}
}
?>