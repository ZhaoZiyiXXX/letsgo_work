<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-教材预定</title>

    <!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/1/index.css" rel="stylesheet">
	<link href="/css/1/buybook.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
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
	liList[4].className="active"; 

	$("#nameclick").click(function(){
		$("#submit").text("按名称搜索");
	});

	$("#isbnclick").click(function(){
		$("#submit").text("按ISBN搜索");
	});

	$("#submit").click(function(){
		if("按ISBN搜索"==$("#submit").text()){
			$.get("http://api.jige.olege.com/book?",
			{
				q:$("#search").val(),
			    type:"ISBN"
			},
			function(data,status){
				alert("Data: " +JSON.stringify(data) + "\nStatus: " + status);
			});
		}else{
			$.get("http://api.jige.olege.com/book?",
			{
				q:$("#search").val().replace(/ /g,"#"),
			    type:"123",
			    dataType : "json",
			},
			function(data,status){
				alert("Data: " +data.data[0].id + "\nStatus: " + status);
			});
		}
	});
})

</script>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
	<?php require_once $GLOBALS["rootPath"].'/includes/leftmenu.php';?>
		<div class="col-lg-10 col-md-10 main">
			<div class="title">
				<p>教材预定</p>
			</div>
			<p class="note">按名称搜索是搜索我们自己的数据库，按ISBN搜索是从外部抓取图书信息，建议名称搜索不到再使用ISBN搜索</p>

		</div>
		<div class="col-lg-6 col-md-6" style="margin-top: -20px">
		    <div class="input-group">
		      <input type="text" class="form-control" id="search">
		      <div class="input-group-btn">
	            <button id="submit" type="button" class="btn btn-default" tabindex="-1">按名称搜索</button>
	            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
	              <span class="caret"></span>
	            </button>
	            <ul class="dropdown-menu dropdown-menu-right" role="menu" >
	              <li><a id="nameclick" href="#">按名称搜索</a></li>
	              <li><a id="isbnclick" href="#">按ISBN搜索</a></li>
	            </ul>
	          </div>
		    </div><!-- /input-group -->
		  </div><!-- /.col-lg-6 -->
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
    
    <div class="panel panel-default car">
		<div class="panel-heading">
    		<h3 class="panel-title">我的购物车</h3>
		</div>
		<div class="panel-body">
    	<table class="table">
    		<tr>
    			<th>书名</th>
    			<th>出版社</th>
    			<th>定价</th>
    			<th>操作</th>
    		</tr>
    	</table>
    	<button type="button" class="btn 	btn-info" >生成订单</button>
  		</div>
		</div>
	</div>
</body>
</html>