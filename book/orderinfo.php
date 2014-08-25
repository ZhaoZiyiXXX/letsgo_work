<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-订单详情</title>

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
 if(empty($_GET["orderid"])){
	_alert_back("请输入正确的单号");
}
 ?>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
		<div class="col-md-12 main">
			<div class="title">
				<p>订单详情</p>
			</div>
			<table class="table table-bordered">
				<tr>
					<th class="title">书名</th>
					<th class="title">作者</th>
					<th class="title">出版社</th>
					<th class="title">ISBN</th>
					<th class="title">定价</th>
					<th class="title">数量</th>
					<th class="title">状态</th>
				</tr>
				<?php
						if(!_get_order_info($_GET["orderid"])){
							echo '<td colspan="7" class="nodetails">没有该订单的详情</td>';
						}
				?>
			</table>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>