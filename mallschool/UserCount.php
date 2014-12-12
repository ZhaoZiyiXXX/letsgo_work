<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <title>Letsgo内部办公系统-校区关注人数显示</title>

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
    <script type="text/javascript" src="../js/BaiduTemplate.js"></script>
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
	  liList[14].className="active"; 
	  
      $.ajax({
          type: "GET",
          url: $("#api_url").val()+"CountUser?",
          dataType: "json",
          success: function(data){
              var bt=baidu.template;
              var html=bt('t:search_result',data);
              $("#result").html(html);
          },
          error:function(data){
              alert("出错啦");
          }
      });
})
</script>
</head>
<body>
    <div class="container-fluid">
    <div class="row">
    <?php include_once $GLOBALS["rootPath"].'/includes/header.inc.php';?>
	<?php require_once $GLOBALS["rootPath"].'/includes/leftmenu.php';?>
	<input id="api_url" type="hidden" value="<?php echo $GLOBALS["apiUrl"]?>">
		<div class="col-md-10 main">
			<div class="title">
				<p>校区关注人数一览表</p>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>校区</th>
						<th>人数</th>
					</tr>
				</thead>
				<tbody id="result">
				</tbody>
			</table>
		</div>
		
	<?php include_once $GLOBALS["rootPath"].'/includes/footer.inc.php';?>
    </div>
	</div>
</body>
<script id='t:search_result' type="text/template">
<!-- 模板部分 -->
<% for(var i = 0; i<data.length;i++){%>
					<tr>
						<td><%=data[i].college%><%=data[i].campus%></td>
						<td><%=data[i].count%></td>
					</tr>
<%}%>
<!-- 模板结束 -->   
</script>
</html>