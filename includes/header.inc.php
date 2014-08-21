<?php 
if(!defined('IN_TG')){
	exit("Access Defined!");
}
if(!empty($_COOKIE["username"])){
	$ret = $_COOKIE["username"];
}else{
	unset($ret);
}
?>

	<link href="/css/1/header.inc.css" rel="stylesheet">
	<div class="top">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
					<a class="menu-left" href="/"><span class="glyphicon glyphicon-home"></span> 首 页</a> 
					<?php 
					if(!isset($ret)) {
						echo "<a class=\"menu-right\" href=\"/login/login.php\"><span class=\"glyphicon glyphicon-off\"></span> 登陆</a>" ;
						echo "<a class=\"menu-right\" href=\"/register.php\"><span class=\"glyphicon glyphicon-pencil\"></span> 注 册</a>";
					}else{
						echo "<a class=\"menu-right\" href=\"/login/logout.php\"><span class=\"glyphicon glyphicon-log-out\"></span> 退出</a>";
						echo "<a class=\"menu-right\" href=\"/user/info.php\"><span class=\"glyphicon glyphicon-pencil\"></span> 欢迎你：{$ret}</a>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
