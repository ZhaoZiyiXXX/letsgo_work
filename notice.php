<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-首页</title>

    <!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/1/notice.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--     <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<!--     <script src="http://cdn.bootcss.com/js/bootstrap.min.js"></script> -->

</head>
<?php 
define('IN_TG',true);
require dirname(__FILE__).'/configs/configs.php';
require $GLOBALS["rootPath"].'includes/function.php';
if(isset($_GET['id'])){
	$notice = _get_one_notices($_GET['id']);
}else{
	_alert_back('未传入正确的id');
}
?>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once '/includes/header.inc.php';?>
	<?php require_once '/includes/leftmenu.php';?>
    <div class="col-md-10 main">
		<h3><?php echo $notice['title'];?></h3>
	<div class="box">
		<p><?php echo $notice['content'];?></p>
	</div>
    </div>
    <?php include_once 'includes/footer.inc.php';?>
	</div>
	</div>
</body>
</html>