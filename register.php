<?php
session_start();//让网站记住你的信息，从浏览器打开到关闭，它会一直记得
include_once("include/student.php");
include_once("include/studentDao.php");
$name = $_POST['name']
$password =$_POST['password']
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
	header("refresh:1.5;url=index.php");
	echo "注册成功，1.5秒钟后跳转到主页";
	$_SESSION['name']=$name;
}
else
	{
		header("refresh:3;url=index.php");
		echo "注册失败，3秒钟后重新注册";
	}
?>