<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-供应商数据导入</title>

    <!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/1/index.css" rel="stylesheet">
	<link href="/css/1/jinhuo.css" rel="stylesheet">
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
	  liList[19].className="active"; 
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
				<p>导入供应商数据</p>
			</div>
			<p class="note"></p>
			<form action="jinhuochuli.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="place">选择供应商</label>
				<select class="form-control" name="supplier_id">
					 <option value=1>新华传媒</option>
					 <option value=2>悦悦书店</option>
					 <option value=3>网上补货</option>
					 <option value=4>教材科取货</option>
					 <option value=5>校内书店补货</option>
					 <option value=6>团队库存</option>
				</select>
			</div>
				<div class="form-group">
				    <label for="place">送货地点</label>
				    <input type="text" class="form-control" name="place" >
			    </div>
			    <div class="form-group">
				    <label for="date">送货日期</label>
				    <input type="text" class="form-control" name="date" >
			    </div>
			    <div class="form-group">
				    <label for="name">订单名称</label>
				    <input type="text" class="form-control" name="name" >
			    </div>
				<div class="form-group">
					<span>选择上传的文件:</span>
					<input type="hidden" name="MAX_FILE_SIZE" value="8000000">
					<input type="file" name="file" id="file" /> 
				</div>
				<input type="submit" name="submit" value="确定上传并处理" class="btn btn-info"/>
			</form>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>