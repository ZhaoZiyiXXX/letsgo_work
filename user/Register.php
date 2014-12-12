<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-注册</title>

    <!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/1/index.css" rel="stylesheet">
	<link href="/css/1/login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
<?php
define('IN_TG',true);
define('ACCESS',true);
 include dirname(__FILE__).'/../configs/configs.php';
 require_once $GLOBALS["rootPath"].'/includes/function.php';
 ?>
<script>
$(document).ready(function(){
		$('#myModal').on('hidden.bs.modal', function (e) {
			window.location.href="../login/login.php";
		})
	  $("#submit").click(function(){
		  if($("#password1").val() !=$("#password").val()){
			  alert("两次输入的密码不一致");
			  $("#password").focus();
			  return;
		  }
		  $.ajax({
              type: "POST",
              url: "RegisterHandle.php",
              dataType: "json",
			  data:{
                  name:$("#name").val(),
                  password:$("#password").val(),
                  email:$("#email").val(),
                  tel:$("#tel").val(),
                  college:$("#college").val(),
                  campus:$("#campus").val(),
                  academy:$("#academy").val(),
                  major:$("#major").val(),
                  gender:$("#gender").val(),
                  qq:$("#qq").val(),
                  birth:$("#birth").val(),
                  nativePlace:$("#nativePlace").val(),
              },
              success: function(data){
                  if(data.result == 0){
                      $("#result").html("注册成功!您的工号是"+data.data.staffid+",请牢记该工号！<br/>建议您截图保存");
                	  $('#myModal').modal();
                  }else{
                      alert("注册失败，请确认是否将所有信息填写完整");
                  }
              },
          });
	  });
})
 </script>
</head>
<body>
    <div class="container-fluid">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3" >
			<div class="loginbox">
			<div class="row">
	   			<div class="form-horizontal">
				  <div class="form-group">
				    <label class="col-md-2 control-label">姓名</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="name" name="name" placeholder="姓名">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">密码</label>
				    <div class="col-md-8">
				      <input type="password" class="form-control" id="password1" name="passwor1" placeholder="密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">确认密码</label>
				    <div class="col-md-8">
				      <input type="password" class="form-control" id="password" name="password" placeholder="密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="email" class="col-md-2 control-label">邮箱</label>
				    <div class="col-md-8">
				      <input type="email" class="form-control" id="email" name="email" placeholder="邮箱">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">手机</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="tel" name="tel" placeholder="手机">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">性别</label>
				    <div class="col-md-8">
				    <select class="form-control" id="gender" name="gender" >
				    <option>男</option>
				    <option>女</option>
				    </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">生日</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="birth" name="birth" placeholder="生日">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">籍贯</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="nativePlace" name="nativePlace" placeholder="籍贯">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">QQ</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="qq" name="qq" placeholder="QQ">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">学校</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="college" name="college" placeholder="学校">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">校区</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="campus" name="campus" placeholder="校区">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">学院</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="academy" name="academy" placeholder="学院">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">专业</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="major" name="major" placeholder="专业">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default loginbtn" id="submit">确认注册</button>
				    </div>
				  </div>
				</div>
			</div>
	   		</div>
			</div>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
	</div>
	
<div id="myModal" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="padding: 15px">
    <h2>注册成功</h2>
    	<hr/>
      <p id="result"></p>
      <hr />
      <p></p>
    </div>
  </div>
</div>

</body>
</html>