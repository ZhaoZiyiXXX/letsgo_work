<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-查询他人信息</title>

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
    <script src="/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/BaiduTemplate.js"></script>
<?php
define('IN_TG',true);
 include dirname(__FILE__).'/configs/configs.php';
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
	  liList[3].className="active"; 

	  $("#submit").click(function(){
		  $.get("staffsearch.php",
			{
				q:$("#search").val(),
			},
			function(data,status){
				//var bt=baidu.template;
				//alert(data[0].name);
				//var html=bt('t:search_result',data);
				//document.getElementById('result').innerHTML=html;
				document.getElementById('result').innerHTML=data;
			});
	})
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
				<p>查询队员信息</p>
			</div>
			<p class="note"></p>
			<div class="row">
				<div class="col-lg-6 col-lg-offset-1 col-md-6 col-md-offset-1" >
			    <div class="input-group">
			      <input type="text" class="form-control" id="search">
			      <div class="input-group-btn">
		            <button id="submit" type="button" class="btn btn-default" style="min-width: 100px;">搜 索</button>
		          </div>
			    </div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
		  </div>
		  <div  class="row" id="result" style="padding: 10px"></div>
		</div>
		
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>