<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-退货资源池</title>

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
	  liList[9].className="active"; 
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
				<p>退书资源池</p>
			</div>
			<p class="note">这里面展示的教材是团队队员想要退的教材，如果有你想要的请直接和对应的队员联系，由他（她）转账给你即可</p>
			<table class="table table-bordered">
				<tr>
					<th class="title">书名</th>
					<th class="title">出版社</th>
					<th class="title">ISBN</th>
					<th class="title">定价</th>
					<th class="title">数量</th>
					<th class="title">退货人</th>
					<th class="title">地点</th>
				</tr>
				<?php require_once $GLOBALS["rootPath"].'/includes/function.php';
						if(!_get_book_flowinfo()){
							echo '<td colspan="7" class="nodetails">没有退货信息</td>';
						}
				?>
			</table>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>