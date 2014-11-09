<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-提交报销</title>

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
 require_once $GLOBALS["rootPath"].'/includes/function.php';
 ?>
 <script>
 $(document).ready(function(){
 	  var ulGet=document.getElementById("leftmenu");
	  var liList=ulGet.getElementsByTagName("li");
	  for(var i=0;i<liList.length;i++)
	  {
	      liList[i].className="";
	  }
	  liList[12].className="active"; 
})
</script>
 <?php 
 if(isset($_POST["director"]))
 {
 	$process = $_COOKIE["username"]."提交了申请";
 	if( _post_new_finance($_COOKIE["staffid"],$_POST["count"],$_COOKIE["staffid"],$_POST["director"],$_POST["title"],$process)){
		_alert_back("提交成功！");
	}
 }
 ?>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
	<?php require_once $GLOBALS["rootPath"].'/includes/leftmenu.php';?>
		<div class="col-md-10 main">
			<div class="title">
				<p>提交报销</p>
			</div>
			<div class="row">
				<form class="form-horizontal" role="form" method="post" >
				  <div class="form-group">
				    <label class="col-md-2 control-label">事项：</label>
				    <div class="col-md-4">
				      <input type="text" class="form-control" id="title" name="title" placeholder="事项" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">金额：</label>
				    <div class="col-md-4">
				      <input type="text" class="form-control" id="count" name="count" placeholder="金额" >
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="col-md-2 control-label">审批人：</label>
				    <div class="col-md-4">
				      <select class="form-control" id="director" name="director">
						<?php _get_finance_manager()?>
						</select>
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">确定提交</button>
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