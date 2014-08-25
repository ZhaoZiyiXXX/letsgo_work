<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-申请退货</title>

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
 if(isset($_POST['count'])){
	if(empty($_POST['bookflowid'])){
		_alert_back('传入的参数有误');
	}
	_set_tuihuo($_POST['bookflowid'],$_POST['count']);
	$bookflowid = $_POST['bookflowid'];
}else{
	if(empty($_GET["bookflowid"])){
		_alert_back("非法的参数");
		exit;
	}
	$bookflowid = $_GET["bookflowid"];
}

$bookinfo = _get_book_flowinfo($bookflowid);
$count_tuihuo = _get_book_tuihuo_count($bookflowid);
if(!$bookinfo){
	$bookinfo = array(
			'书名' => '',
			'出版社' => '',	
			'ISBN' => '',
			'签收时间' => '',
			'签收数量' =>0,
	); 
}
$count = intval($bookinfo['签收数量']) - intval($count_tuihuo);
 ?>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
		<div class="col-md-12 main">
			<div class="title">
				<p>退货申请</p>
			</div>
			<ul class="list-group">
			  <li class="list-group-item">书名：<?php echo $bookinfo["书名"]?></li>
			  <li class="list-group-item">出版社：<?php echo $bookinfo["出版社"]?></li>
			  <li class="list-group-item">ISBN：<?php echo $bookinfo["ISBN"]?></li>
			  <li class="list-group-item">签收时间：<?php echo $bookinfo["签收时间"]?></li>
			  <li class="list-group-item">签收数量：<?php echo $bookinfo["签收数量"]?></li>
			  <li class="list-group-item">已经退货数量：<?php echo $count_tuihuo?></li>
			</ul>
			<form class="form-inline" role="form" style="margin-bottom: 20px;" method="post">
			  <div class="form-group">
			    <p class="form-control-static">请输入退货数量（1-<?php echo $count?>之间的整数）</p>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="count" name="count" placeholder="退货数量">
			  </div>
			  <input type="hidden" name = "bookflowid" value="<?php echo $bookflowid ?>" >
			  <button type="submit" class="btn btn-default">确认退货</button>
			</form>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>