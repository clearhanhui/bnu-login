<?php 
	session_start(); 
	include_once("include/bnu.inc.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap.bundle.min.js"></script>
		<script src="js/bnu.js"></script>
		<title></title>
	</head>
	<body>
		<div class="container-fluid">
		<?php 
			$currentUser = getCurrentUser();
			$title="主页";
			getNavigator($currentUser,$title);
		?>
		</div>
		<script>
			setActivePage();
		</script>
		<h1>hello world</h1>
	</body>
</html>
