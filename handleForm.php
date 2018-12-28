<?php
session_start();//让网站记住你的信息，从浏览器打开到关闭，它会一直记得
include_once("include/student.php");
include_once("include/studentDao.php");

//$_POST["action"] = "selectAll";

if($_POST["action"] == "checkName")
{
	$name = $_POST['name'];
	$dao = new StudentDao();
	$result = $dao->selectByName($name);
	echo $result;
	
}
if($_POST["action"] == "register")
{
	$name = $_POST['name'];
    $password =$_POST['password'];
	$gender =$_POST['gender'];
	$nativeplace = $_POST['nativeplace'];
	$hobby =$_POST['hobby'];

	
	
	$student = new Student();
	$student->setName($name);
	$student->setPassword($password);
	$student->setGender($gender);
	$student->setNativeplace($nativeplace);
	$student->setHobby($hobby);
	
	$dao = new StudentDao();
	$result=$dao->insert($student);
	
	//$sql = "insert into student values(null, '$name', sha('$password'), '$gender', '$nativeplace','$hobby')";
	
	if ($result>0) {
		//echo "注册成功，1.5秒钟后跳转到主页";
		$_SESSION['name']=$name;
	}
	  echo $result;
}
if($_POST["action"] == "logout")
{
	unset($_SESSION['name']);
	echo "1";
}

if($_POST["action"] == "selectAll")
{
	$dao = new StudentDao();
	$result=$dao->selecttAll();
	
	$result = json_encode($result,JSON_UNESCAPED_UNICODE);
	echo $result;
}

if($_POST["action"] == "updateById")  //密码不改
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$gender =$_POST['gender'];
	$nativeplace = $_POST['nativeplace'];
	$hobby =$_POST['hobby'];

	
	
	$student = new Student();
	$student->setId($id);
	$student->setName($name);
	$student->setGender($gender);
	$student->setNativeplace($nativeplace);
	$student->setHobby($hobby);
	
	//database access object
	$dao = new StudentDao();
	$result=$dao->updateById($student);
	
	//$sql = "insert into student values(null, '$name', sha('$password'), '$gender', '$nativeplace','$hobby')";
	
	if ($result>0) {
		//echo "注册成功，1.5秒钟后跳转到主页";
		$_SESSION['name']=$name;
	}
	  echo $result;
}


if($_POST["action"] == "selectByName")
{
	$name = $_POST['name'];
	$dao = new StudentDao();
	$result=$dao->selectByName($name);
	
	$result = json_encode($result,JSON_UNESCAPED_UNICODE);
	echo $result;
}


if($_POST["action"] == "login")
{
	$name = $_POST['name'];
    $password =$_POST['password'];
	
	
	$dao = new StudentDao();
	$result=$dao->login($name,$password);
	
	//$sql = "insert into student values(null, '$name', sha('$password'), '$gender', '$nativeplace','$hobby')";
	
	if ($result>0) {
		//echo "注册成功，1.5秒钟后跳转到主页";
		$_SESSION['name']=$name;
	}
	  echo $result;
}
?>