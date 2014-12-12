<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-进货分配</title>

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
	  liList[20].className="active"; 
	  $.get("getjinhuoinfo.php",
				function(data,status){
					document.getElementById('suppler_bookinfo').innerHTML=data;
				});
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
				<p>进货分配</p>
			</div>
			<p class="note"></p>
			<!--工作台 -->
			<div class="row">
				<div class="col-md-12">
					<table id="suppler_bookinfo" class="table">
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<form class="form-inline fenpeibox" role="form">
						<div class="form-group">
						    <div class="input-group">
						      <div class="input-group-addon">信息id</div>
						      <input class="form-control" type="text" placeholder="id" style="max-width: 140px">
						    </div>
						    <div class="form-group">
								<label for="place">是否分配完成</label>
								<select class="form-control" name="supplier_id">
									<option value=1>是</option>
									<option value=0>否</option>
								</select>
							</div>
					    </div>
					    <br/>
					  <div class="form-group">
					    <div class="input-group">
					      <div class="input-group-addon">工号</div>
					      <input class="form-control" type="text" placeholder="输入工号或姓名" style="max-width: 140px">
					    </div>
					    <button class="btn btn-default">查询</button>
					    <label>赵子逸</label>
					    <input class="form-control" type="text" placeholder="输入数量" style="max-width: 100px">
					  </div>
					  <br/>
					  <div class="form-group">
					  	<button type="submit" class="btn btn-info" style="min-width: 150px;margin:0px auto;">录入</button>
					  </div>
					</form>
				</div>
			</div><!--工作台结束 -->
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>