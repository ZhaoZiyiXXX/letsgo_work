<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-转账</title>

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
 $bookbackid = 0;
 if(isset($_POST['count'])){
 	if(empty($_POST['bookbackid'])){
 		_alert_back('传入的参数有误');
 		exit;
 	}
 	//_set_zhuanzhang($_POST['bookbackid'],$_POST['count']);
 }else{
	if(empty($_GET["bookbackid"])){
		_alert_back("非法的参数");
		exit;
	}
	$bookbackid = $_GET["bookbackid"];
}

$bookinfo = _get_book_backinfo_byid($bookbackid);
if(!$bookinfo){
	$bookinfo = array(
			'书名' => '',
			'出版社' => '',	
			'ISBN' => '',
			'转账数量' =>0,
	); 
}

 ?>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
		<div class="col-md-12 main">
			<div class="title">
				<p>转账申请</p>
			</div>
			<ul class="list-group">
			  <li class="list-group-item">书名：<?php echo $bookinfo["书名"]?></li>
			  <li class="list-group-item">出版社：<?php echo $bookinfo["出版社"]?></li>
			  <li class="list-group-item">ISBN：<?php echo $bookinfo["ISBN"]?></li>
			  <li class="list-group-item">转账数量：<?php echo $bookinfo["转账数量"]?></li>
			</ul>
			<form class="form-inline" role="form" style="margin-bottom: 20px;" method="post">
			  <div class="form-group">
			    <p class="form-control-static">转给</p>
			  </div>
			  <div class="form-group">
			    <input type="text" class="form-control" id="count" name="count" placeholder="员工工号">
			  </div>
			  <input type="hidden" name = "bookflowid" value="<?php echo $bookbackid ?>" >
			  <button type="submit" class="btn btn-default">确认转账</button>
			</form>
		</div>
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
</html>