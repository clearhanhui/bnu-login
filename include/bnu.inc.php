<?php
function getNavigator($currentUser='游客',$title='主页'){
	
	if ($title == "注册") {
		$string = '
	<div class="jumbotron">
			<h1>' . $title . '</h1>
		</div>
		<div class="form-group row" style="margin-top: -20px;margin-button: 36px">
			<div class="col-8">
				<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link" href="index.php">主页</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="reg.php">注册</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php">登录</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="select.php">查询</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">注销</a>
				</li>
				</ul>
			</div>
	</div>';
	} else {
		$string = '
	<div class="jumbotron">
			<h1>' . $title . '</h1>
		</div>
		<div class="form-group row" style="margin-top: -20px;margin-button: 36px">
			<div class="col-8">
				<ul class="nav nav-pills">
				<li class="nav-item">
					<a class="nav-link" href="index.php">主页</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="reg.php">注册</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php">登录</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="select.php">查询</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">注销</a>
				</li>
				</ul>
			</div>
			<div class="col-4 text-right">
				<strong id="currentUser">' . $currentUser . '</strong>,您好
			</div>
	</div>';
	}
	echo $string;
}

function getCurrentUser()
{
	$currentUser=$_SESSION['name'] ?? "游客"; 
	return $currentUser;
}
?>









