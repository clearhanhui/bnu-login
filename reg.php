<?php 
	session_start(); 
	include_once("include/bnu.inc.php");
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title>学生注册</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap.bundle.min.js"></script>
		<script src="js/bnu.js"></script>
	</head>

	<body>
		<div class="container-fluid">
			<?php 
				$currentUser="游客";
				$title="注册";
				getNavigator("",$title);
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
					<legend class="col-1 col-form-label pt-0 text-right">性别：</legend>
					<div class="col-1">
						<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id = "gender1" value="男" checked />
						<label class="form-check-label" for = "gender1">男</label>
						</div>
					</div>
					<div class="col-1">
						<div class="form-check">
						<input class="form-check-input" type="radio" name="gender" id = "gender2" value="女" />
						<label class="form-check-label" for = "gender2">女</label>
						</div>
					</div>
				</div>

				<div class="form-group row">
				    <label class="col-1 col-form-label  text-right" for="nativeplace" >籍贯：</label>
				    <div class="col-3">
					<select id="nativeplace" class="form-control">
						<option value="北京" selected>北京</option>
						<option value="吉林">吉林</option>
						<option value="上海">上海</option>
						<option value="四川">四川</option>
						<option value="江西">江西</option>
					</select>
					</div>	
				</div>
				
				<div class="form-group row">
					<legend class="col-1 col-form-label pt-0 text-right">爱好：</legend>
					<div class="col-1">
						<div class="form-check">
						<input class="form-check-input" type="checkbox" name="hobby[]" id = "hobby1" value="吃饭"/>
						<label class="form-check-label" for = "hobby1">吃饭</label>
					    </div>
					</div>
					
					<div class="col-1">
						<div class="form-check">
						<input class="form-check-input" type="checkbox" name="hobby[]" id = "hobby2" value="睡觉"/>
						<label class="form-check-label" for = "hobby2">睡觉</label>
					    </div>
					</div>
					
					<div class="col-1">
						<div class="form-check">
						<input class="form-check-input" type="checkbox" name="hobby[]" id = "hobby3" value="豆豆"/>
						<label class="form-check-label" for = "hobby3">豆豆</label>
					    </div>
					</div>
				</div>

				
				     <div class="form-group row">
						<div class="col-2 text-center">
							<button class="btn btn-primary" type="button"id = "btnSubmit" disabled>注册<tton>
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
        			   	<p id="myTips">注册成功</p>
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
			$("#name").blur(function(){
				$("#btnSubmit").attr("disabled",true);
				
				var name = $(this).val();
				if(name.length < 1)
				{
					$(".nameTip").show().css("color","red").text("用户名不能为空");
					return;
				}
				$(".nameTip").hide();
				
				$.post("handleForm.php",{
					action:"checkName",
					name:name},
					function(data,status){
						if(data > 0)
						{
							$(".nameTip").show().css("color","red").text("用户已存在");
						}
						else
						{
							$(".nameTip").show().css("color","greens").text("用户不存在,请继续注册");
							$("#btnSubmit").removeAttr("disabled");
						}
						
				})
			});
			
			$("#btnSubmit").click(function(){
				let name = $("#name").val();
				let password = $("#password").val();
				let gender = $("input[name=gender]:checked").val();
				let nativeplace= $("#nativeplace").val();
				//alert(nativeplace);
				let strHobby = "";
				$("input[name^=hobby]:checked").each(function(){
					strHobby += $(this).val()+";";
					
				});
				strHobby = strHobby.substr(0,strHobby.length-1);
				//alert(strHobby);
				$.post("handleForm.php",{
					action:"register",
					name:name,
					password:password,
					gender:gender,
					nativeplace:nativeplace,
					hobby:strHobby,
				},
				function(data,status){
					
					if(data > 0)
					{
					  $("#myModal").modal();
					}
					else
					{
						$("#myTips").val("注册失败");
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