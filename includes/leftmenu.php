<?php 
if(!defined('IN_TG')){
	exit("Access Defined!");
}
?>
<link href="/css/1/basic.css" rel="stylesheet">
    <div class="col-md-2 menu">
		<ul class="nav nav-pills nav-stacked" role="tablist" id="leftmenu">
			<!-- 公共菜单 -->
			<li class="active"><a href="/index.php">公告栏</a></li>
			<li><a href="/user/info.php" >个人信息</a></li>
			<li><a href="/user/changeinfo.php">修改信息</a></li>
			<li><a href="#">查询他人信息</a></li>
			<hr />
			<li><a href="#">教材查询</a></li>
			<li><a href="#">教材预定</a></li>
			<li><a href="/user/MyOrder.php">我的订单</a></li>
			<li><a href="#">教材签收</a></li>
			<li><a href="#">教材结账</a></li>
			<hr />
			<li><a href="#">我的账户</a></li>
			<li><a href="#">提交报销</a></li>
			<hr />
			<!-- 校区主管菜单 -->
			<li><a href="#">校区订单</a></li>
			<li><a href="#">财务审批</a></li>
			<hr />
			<!-- 超级管理员菜单 -->
			<li><a href="#">注册审批</a></li>
			<li><a href="#">发货状态修改</a></li>
		</ul>
    </div>
