<?php 
if(!defined('IN_TG')){
	exit("Access Defined!");
}
?>
<link href="/css/1/basic.css" rel="stylesheet">
    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 menu">
		<ul class="nav nav-pills nav-stacked" role="tablist" id="leftmenu">
			<!-- 公共菜单 -->
			<li class="active"><a href="/index.php">公告栏</a></li>
			<li><a href="/user/info.php" >个人信息</a></li>
			<li><a href="/user/changeinfo.php">修改信息</a></li>
			<li><a href="/staffinfo.php">查询他人信息</a></li>
			<hr />
			<li><a href="/book/order.php">教材预定</a></li>
			<li><a href="#">查看购物车</a></li>
			<li><a href="/user/MyOrder.php">我的订单</a></li>
			<li><a href="/user/mybook.php">教材签收</a></li>
			<li><a href="/user/mytuihuo.php">我的退货</a></li>
			<li><a href="/book/alltuihuo.php">退书资源池</a></li>
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
			<li><a href="/supply/jinhuo.php">供应商数据录入</a></li>
			<li><a href="/supply/jinhuofenpei.php">供应商数据分配</a></li>
			<li><a href="#">注册审批</a></li>
			<li><a href="#">发货状态修改</a></li>
		</ul>
    </div>
