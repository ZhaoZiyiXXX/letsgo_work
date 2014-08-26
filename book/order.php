<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-教材预定</title>

    <!-- Bootstrap -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/1/index.css" rel="stylesheet">
	<link href="/css/1/buybook.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/BaiduTemplate.js"></script>
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
	liList[4].className="active"; 

	$("#nameclick").click(function(){
		$("#submit").text("按名称搜索");
	});

	$("#isbnclick").click(function(){
		$("#submit").text("按ISBN搜索");
	});

	$("#submit").click(function(){
		if("按ISBN搜索"==$("#submit").text()){
			$.get("http://api.jige.olege.com/book?",
			{
				q:$("#search").val(),
			    type:"ISBN"
			},
			function(data,status){
				alert("Data: " +JSON.stringify(data) + "\nStatus: " + status);
			});
		}else{
			$.get("http://api.jige.olege.com/book?",
			{
				q:$("#search").val().replace(/ /g,"#"),
			    type:"123",
			    dataType : "json",
			},
			function(data,status){
				//alert("Data: " +data.data[0].id + "\nStatus: " + status);
				var bt=baidu.template;
				var html=bt('t:search_result',data);
				document.getElementById('result').innerHTML=html;
			});
		}
	});
});
 var count = 0;
 function add2car(bookid){
		$.get("http://api.jige.olege.com/book?",
		{
			q:bookid,
			type:"id",
			dataType : "json",
		},
		function(data,status){
			count =count + 1;
			data = data.data;
			item ="<tr id='"+ count +"'><td>"+data['name']+"</td><td>"+data['press']+"</td><td>"+data['fixedPrice']+"</td><td><a href='#'>删除</a></td></tr>";  
			$('#bookcar').append(item);  
			});
	}
</script>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
	<?php require_once $GLOBALS["rootPath"].'/includes/leftmenu.php';?>
		<div class="col-lg-10 col-md-10 main">
			<div class="title">
				<p>教材预定</p>
			</div>
			<p class="note">按名称搜索是搜索我们自己的数据库，按ISBN搜索是从外部抓取图书信息，建议名称搜索不到再使用ISBN搜索</p>

		</div>
		<div class="col-lg-6 col-md-6" style="margin-top: -20px">
		    <div class="input-group">
		      <input type="text" class="form-control" id="search">
		      <div class="input-group-btn">
	            <button id="submit" type="button" class="btn btn-default" tabindex="-1">按名称搜索</button>
	            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
	              <span class="caret"></span>
	            </button>
	            <ul class="dropdown-menu dropdown-menu-right" role="menu" >
	              <li><a id="nameclick" href="#">按名称搜索</a></li>
	              <li><a id="isbnclick" href="#">按ISBN搜索</a></li>
	            </ul>
	          </div>
		    </div><!-- /input-group -->
			<div class="bookbox" id="result">
				<div class="row mbookinbox">
					<div class="col-lg-2 col-md-2 col-sm-2">
						<img src="#" alt="" class="pic" />
					</div>
					<div class="col-lg-7 col-md-7 col-sm-7">
						<p class="booktitle">
							<span >这是一个标题</span>
						</p>
						<p class="search_book_author" > 
						<span class="search_now_price">&yen;41.30</span>
						<span>明日科技　编著</span>
						</p>
						<p class="search_book_author" > 
						<span > 9787040212778</span>
						<span > /2012-09-01</span>
						<span>  /清华大学出版社</span>
						</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<button type="button" class="btn btn-info flagsold  btn-block" >加入购物车</button>
					</div>
				</div>
			</div>
		  </div><!-- /.col-lg-6 -->
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
    
    <div class="panel panel-default car">
		<div class="panel-heading">
    		<h3 class="panel-title">我的购物车</h3>
		</div>
		<div class="panel-body" >
			<table class="table"  id="bookcar">
	    		<tr>
	    			<th>书名</th>
	    			<th>出版社</th>
	    			<th>定价</th>
	    			<th>操作</th>
	    		</tr>
    		</table>
    	<button type="button" class="btn 	btn-info" >生成订单</button>
  		</div>
		</div>
	</div>
	
<script id='t:search_result' type="text/template">

<!-- 模板部分 -->
<% for(var i = 0; i<data.length;i++){%>
				<div class="row mbookinbox">
					<div class="col-lg-2 col-md-2 col-sm-2">
						<img src="<%=data[i].imgpath%>" alt="" class="pic" />
					</div>
					<div class="col-lg-7 col-md-7 col-sm-7">
						<p class="booktitle">
							<span ><%=data[i].name%></span>
						</p>
						<p class="search_book_author" > 
						<span class="search_now_price">&yen;<%=data[i].fixedPrice%></span>
						<span><%=data[i].author%></span>
						</p>
						<p class="search_book_author" > 
						<span > <%=data[i].isbn%></span>
						<span>  /<%=data[i].press%></span>
						</p>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<button type="button" class="btn btn-info flagsold  btn-block" onclick="add2car('<%=data[i].id%>')">加入购物车</button>
					</div>
				</div>
<%}%>
<!-- 模板结束 -->   
</script>
</body>
</html>