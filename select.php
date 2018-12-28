<?php 
	session_start(); 
	include_once("include/bnu.inc.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title>查看学生信息</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-table.min.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="bootstrap.bundle.min.js"></script>
		<script src="js/bootstrap-table.min.js" ></script>
		<script src="js/bootstrap-table-zh-CN.min.js" ></script>
		<script src="js/bnu.js"></script>
	</head>
	<body>
		<div class="container-fluid">
		<?php 
			$currentUser=getCurrentUser();
			$title="查询";
			getNavigator($currentUser,$title);
		?>
		</div>
		<div>

		<h1>学生信息</h1>
		<table id="table"></table>
			<div class="modal fade" id="editStudentModal" role="dialog">
	        	<div class="modal-dialog" role="document">
	        		<div class="modal-content">
	        			<div class="modal-header">
	        				<h4 class="modal-title">修改学生信息</h4>
	        				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	        					<span aria-hidden="true">&times;</span>
	        				</button>
	        			</div>

	        			   <div class="modal-body">
						        			   	   <form method="post">
									<div class="form-group row">
										<label class="col-2 col-form-label text-right" for="id">序号：</label>
										<div class="col-3">
											<input class="form-control" type="text" id="id" name="id" readonly>
										</div>
										<div class="col-3">
											<span class="nameTip"></span>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-2 col-form-label text-right" for="name">姓名：</label>
										<div class="col-3">
											<input class="form-control" type="text" id="name" name="name" required>
										</div>
										<div class="col-3">
											<span class="nameTip"></span>
										</div>
									</div>

									<!--<div class="form-group row">
										<label class="col-2 col-form-label text-right" for="password">密码：</label>
										<div class="col-3">
											<input class="form-control" type="password" id="password" name="password">
										</div>
										<div class="col-3">
											<span class="nameTip1"></span>
										</div>

									</div>-->

									<div class="form-group row">
										<legend class="col-2 col-form-label pt-0 text-right">性别：</legend>
										<div class="col-2">
											<div class="form-check">
											<input class="form-check-input gender" type="radio" name="gender" id = "gender1" value="男"  />
											<label class="form-check-label" for = "gender1">男</label>
											</div>
										</div>
										<div class="col-2">
											<div class="form-check">
											<input class="form-check-input gender" type="radio" name="gender" id = "gender2" value="女" />
											<label class="form-check-label" for = "gender2">女</label>
											</div>
										</div>
									</div>

									<div class="form-group row">
									    <label class="col-2 col-form-label  text-right" for="nativeplace" >籍贯：</label>
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
										<legend class="col-2 col-form-label pt-0 text-right">爱好：</legend>
										<div class="col-2">
											<div class="form-check">
											<input class="form-check-input hobby" type="checkbox" name="hobby[]" id = "hobby1" class = "hobby" value="吃饭"/>
											<label class="form-check-label" for = "hobby1">吃饭</label>
										    </div>
										</div>

										<div class="col-2">
											<div class="form-check">
											<input class="form-check-input hobby" type="checkbox" name="hobby[]" id = "hobby2" class = "hobby" value="睡觉"/>
											<label class="form-check-label" for = "hobby2">睡觉</label>
										    </div>
										</div>

										<div class="col-2">
											<div class="form-check">
											<input class="form-check-input hobby" type="checkbox" name="hobby[]" id = "hobby3" class = "hobby" value="豆豆"/>
											<label class="form-check-label" for = "hobby3">豆豆</label>
										    </div>
										</div>
									</div>
								</form>
	        			   </div>

	        			   <div class="modal-footer">
	        			   	   <button type="button" class="btn btn-success" data-dismiss="modal" id="btnUpdateStudent">确定</button>
	        			   	     <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
	        			   	   <input type="text" id="dataVal" hidden>
	        			   </div>
	        		</div>
	        	</div>
	        </div>
      	
		</div>
		
		
		<script>
			setActivePage();	//当前选项小按钮变成蓝色
			$("#table").bootstrapTable({
				url:'handleForm.php',
				method:'post',
				contentType:'application/x-www-form-urlencoded',
				queryParams:queryParams,
				uniqueId:'id',
				pagination:true,
				sidePagination:'client',
				pageSize:7,
				pageNumber:1,    //起始页数
				pageList:[3,5,10,20],
				search:true,
				showColumns:true,
			    
				columns:[
					{
						field:'id',
						title:'序号'
					},
					{
						field:'name',
						title:'姓名'
					},
					{
						field:'gender',
						title:'性别'
					},
					{
						field:'nativeplace',
						title:'籍贯'
					},
					{
						field:'hobby',
						title:'爱好'
					},
					{
						field:'id',
						title:'修改',
						align:'center',
						formatter:function(value,row,index)
						{
						   var str = '<button type="button" class="btn btn-success" onclick="btnEditStudentModal('+ value +')">';
						   str +='<i class="fa fa-pencil-square-o fa-lg"></i>';
						   str +='</button>';
						   return str;
						}
					}
				]
			});	
			
			function queryParams(params){
				var currentUser=$("#currentUser").html();
				var temp = {
					action:'selectAll',
				     }
				if(currentUser != 'admin')
				{
				temp = {
					action:'selectByName',
					name:currentUser,
				     }
				}
				
				return temp;
			}
			function btnEditStudentModal(id)
			{
				var row = $("#table").bootstrapTable('getRowByUniqueId',id);
				$("#id").val(row.id);
				$("#name").val(row.name);
				$(".gender:radio[value='"+ row.gender+"']").prop('checked',true);
				$("#nativeplace").find("option[value='"+row.nativeplace+"']").prop("selected",true);
				$(".hobby").prop("checked",false);
				$.map(row.hobby.split(";"),function(item){
					$(".hobby:checkbox[value='"+item+"']").prop('checked',true);
				});
				
				$("#editStudentModal").modal();
			}
			
			
			$("#btnUpdateStudent").click(function(){
				let id = $("#id").val();
				let name = $("#name").val();
				let gender = $("input[name=gender]:checked").val();
				let nativeplace= $("#nativeplace").val();
				//alert(nativeplace);
				let strHobby = "";
				$("input[name^=hobby]:checked").each(function(){
					strHobby += $(this).val()+";";
					
				});
				strHobby = strHobby.substr(0,strHobby.length-1);
				$.post("handleForm.php",{
					action:"updateById",
					id:id,
					name:name,
					gender:gender,
					nativeplace:nativeplace,
					hobby:strHobby,
				},
				function(data,status){   //修改
				    if(data > 0)
					{
					  $("#table").bootstrapTable('updateByUniqueId',{
					  	id:id,
					  	row:{
					  		name:name,
					  		gender:gender,
					  		nativeplace:nativeplace,
					  		hobby:strHobby,
					  	}
					  });
					  $('#currentUser').html(name);
					}
			       $('#editStudentModal').modal('hide');
				}
			);
			});
			
			
//			$("#btnCancel").click(function(){
//				
//			});
//			
		
		</script>
			
		</div>
		
	</body>
</html>
