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
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		
		<script src="js/bnu.js"></script>
		<title></title>
	</head>
	<body>
		<div class="container-fluid">
		<?php 
			$currentUser=getCurrentUser();
			$title="注销";
			getNavigator($currentUser,$title);
		?>
		</div>  
		<script>
			setActivePage();
		</script>
<!--		<span class="fa fa-ship" style="font-size: 60px; color: #0056B3;"></span>-->
<!--		<span class="fa fa-weibo" style="font-size: 60px; color: red;"></span>-->
<!--		<span class="fa fa-weixin" style="font-size: 60px; color: lightgreen;"></span>-->
<!--		<span class="fa fa-chrome" style="font-size: 60px; color: lightcoral;"></span>-->
		<span class="fa fa-github" style="font-size: 60px; color: black;"></span>
<!--		<span class="fa fa-linux" style="font-size: 160px; color: #0056B3;"></span>-->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
				注销
		</button>

		
		<div class="modal fade" id="myModal" role="dialog">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h4 class="modal-title">再问一遍</h4>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			   <div class="modal-body">
        			   	<p id="myTips">真的要离开吗</p>
        			   </div>
        			   <div class="modal-footer">
        			   	 	<button type="button" class="btn btn-success" id="btnMyTips">是的</button>
        			   	  	<button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
        			   	   <input type="text" id="dataVal" hidden>
        			   </div>
        		</div>
        	</div>
        </div>
      	
		<script>
			$("#btnMyTips").click(function(){
				$.post("handleForm.php",{
					action:"logout",
				},
				function(data,status)
				{
					$("#myModal").modal("hide");
					$("#currentUser").html("游客")
				}
			);
			});
		</script>
	</body>
</html>
