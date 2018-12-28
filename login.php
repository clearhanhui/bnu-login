<?php 
	session_start(); 
	include_once("include/bnu.inc.php");
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title>学生登录</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap.bundle.min.js"></script>
		<script src="js/bnu.js"></script>
	</head>

	<body>
		<div class="container-fluid">
			<?php 
				$currentUser="游客";
				$title="登录";
				getNavigator($currentUser,$title);
			?>
			<form method="post">
				<div class="form-group row">
					<label class="col-1 col-form-label text-right" for="name">姓名：</label>
					<div class="col-3">
						<input class="form-control" type="text" id="name" name="name" required>
					</div>
					<div class="col-3">
						<span class="nameTip"></span>
					</div>
				</div>

				<div class="form-group row">
					<label class="col-1 col-form-label text-right" for="password">密码：</label>
					<div class="col-3">
						<input class="form-control" type="password" id="password" name="password">
					</div>
					<div class="col-3">
						<span class="nameTip1"></span>
					</div>
					
				</div>

				
				
				<div class="form-group row">
						<div class="col-2 text-center">
							<button class="btn btn-primary" type="button"id = "btnSubmit">登录<tton>
						</div>
						<div class="col-2">
							<button class="btn btn-danger" type="reset">取消<tton>
						</div>
				 </div>

			</form>
		</div>
        
        <div class="modal fade" id="myModal" role="dialog">
        	<div class="modal-dialog" role="document">
        		<div class="modal-content">
        			<div class="modal-header">
        				<h4 class="modal-title">温馨提示</h4>
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
        					<span aria-hidden="true">&times;</span>
        				</button>
        			</div>
        			   <div class="modal-body">
        			   	<p id="myTips">登录成功</p>
        			   </div>
        			   <div class="modal-footer">
        			   	   <button type="button" class="btn btn-primary" id="btnMyTips">确定</button>
        			   	   <input type="text" id="dataVal" hidden>
        			   </div>
        		</div>
        	</div>
        </div>
		<script>
			setActivePage();
	
			$("#btnSubmit").click(function(){
				let name = $("#name").val();
				let password = $("#password").val();
				$.post("handleForm.php",{
					action:"login",
					name:name,
					password:password,
				},
				function(data,status){
					//$("#dataVal")
					//alert(data);
					if(data > 0)
					{
					  $("#myModal").modal();
					  
					  $('#currentUser').html(name);
					}
					else
					{
						$("#myTips").html("登陆失败");
						$("#myModal").modal();
					}
					
				}
			);
			});
				
		    $("#btnMyTips").click(function(){
		    	if($("#dataVal").val() > 0)
		    	{
		    	  $("myModal").modal("hide");	
		    	  window.location.href="index.php";
		    	}
		    	else{
		    		$("#myModal").modal("hide");
		    	}
		    	
		    });
				
				
			//});
		</script>
	</body>

</html>