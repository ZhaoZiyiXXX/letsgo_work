<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-登陆</title>

    <!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/1/login.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://cdn.bootcss.com/js/bootstrap.min.js"></script>
<?php
define('IN_TG',true);
 include dirname(__FILE__).'/../configs/configs.php';
 //判断用户是否已经登录
 if(!empty($_COOKIE['username'])){
 	header("location:../index.php");
 }
 ?>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php require_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3" >
			<div class="loginbox">
			<div class="row">
	   			<form class="form-horizontal" role="form" method="post" action="./loginaccess.php">
				  <div class="form-group">
				    <label for="inputEmail3" class="col-md-2 control-label">用户名</label>
				    <div class="col-md-8">
				      <input type="text" class="form-control" id="username" name="username" placeholder="用户名">
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="inputPassword3" class="col-md-2 control-label">密码</label>
				    <div class="col-md-8">
				      <input type="password" class="form-control" id="password" name="password" placeholder="密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default loginbtn">登陆</button>
				    </div>
				  </div>
				</form>
			</div>
	   		</div>
			</div>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>