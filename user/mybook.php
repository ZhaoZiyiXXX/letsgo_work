<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-我的签收</title>

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
 ?>
<script>
 $(document).ready(function(){
 	  var ulGet=document.getElementById("leftmenu");
	  var liList=ulGet.getElementsByTagName("li");
	  for(var i=0;i<liList.length;i++)
	  {
	      liList[i].className="";
	  }
	  liList[7].className="active"; 
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
				<p>签收情况</p>
			</div>
			<p class="note">说明：签收数量仅代表已经签收的数量，不会减去退货数量，查看退货数量请到<a href="mytuihuo.php">我的退货</a>页面查看，或者直接查看结账页面确认最终购买数量</p>
			<table class="table table-bordered">
				<tr>
					<th class="title">渠道</th>
					<th class="title">书名</th>
					<th class="title">出版社</th>
					<th class="title">ISBN</th>
					<th class="title">定价</th>
					<th class="title">售价折扣</th>
					<th class="title">数量</th>
					<th class="title">签收时间</th>
					<th class="title">操作</th>
				</tr>
				<?php require_once $GLOBALS["rootPath"].'/includes/function.php';
						if(!_get_user_books($_COOKIE["staffid"])){
							echo '<td colspan="8" class="nodetails">没有签收详情</td>';
						}
				?>
			</table>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>