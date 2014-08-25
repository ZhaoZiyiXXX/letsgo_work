<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-修改个人信息</title>

    <!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/1/index.css" rel="stylesheet">
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
 require $GLOBALS["rootPath"].'/includes/function.php';
 if(!empty($_COOKIE['staffid'])){
 	$userinfo = _get_staffinfo_byid($_COOKIE['staffid']);
 }else{
 	$userinfo=array(
 			'staffid' => '',
 			'name' => '',
 			'email' => '',
 			'telephone' => '',
 			'college' => '',
 			'roleType' => '',
 	);
 }
 ?>
  <script>
 $(document).ready(function(){
 	  var ulGet=document.getElementById("leftmenu");
	  var liList=ulGet.getElementsByTagName("li");
	  for(var i=0;i<liList.length;i++)
	  {
	      liList[i].className="";
	  }
	  liList[2].className="active"; 
})
</script>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
	<?php require_once $GLOBALS["rootPath"].'/includes/leftmenu.php';?>
		<div class="col-md-10 main">
			<div class="title">
				<p>修改个人信息</p>
			</div>
			<div class="row">
				<form class="form-horizontal" role="form" method="post" action="changeuserinfo.php">
				  <div class="form-group">
				    <label class="col-md-2 control-label">工号：</label>
				    <div class="col-md-4">
				      <p  type="text" class="form-control-static" ><?php echo $userinfo['staffid'];?></p>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">姓名：</label>
				    <div class="col-md-4">
				      <input type="text" class="form-control" id="name" name="name" placeholder="工号" value="<?php echo $userinfo['name'];?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">邮箱：</label>
				    <div class="col-md-4">
				      <input type="text" class="form-control" id="email" name="email" placeholder="工号" value="<?php echo $userinfo['email'];?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">手机：</label>
				    <div class="col-md-4">
				      <input type="text" class="form-control" id="telephone" name="telephone" placeholder="工号" value="<?php echo $userinfo['telephone'];?>">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">密码：</label>
				    <div class="col-md-4">
				      <input type="password" class="form-control" id="password1" name="password1" placeholder="不修改则保持为空">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">确认密码：</label>
				    <div class="col-md-4">
				      <input type="password" class="form-control" id="password2" name="password2" placeholder="再次输入密码">
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">确定修改</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>