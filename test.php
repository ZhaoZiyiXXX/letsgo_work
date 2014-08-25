<?php
function get_bookinfo(){
	$mysql = new SaeMysql();
	if(!isset($_GET['campus'])){
		$sql = "SELECT * FROM bookinfo";
		$data = $mysql->getData($sql);
		return $data;
	}else{
		$sql = "SELECT * FROM bookinfo WHERE campus = '".$_GET['campus']."'";
		$data = $mysql->getData($sql);
		return $data;
	}

	$mysql->closeDb();
}

function get_book_count($bookid){
	if(empty($bookid)){
		return "数量异常" ;
	}
	$mysql = new SaeMysql();
	$sql = "SELECT count FROM bookinfo WHERE id = '".$bookid."'";
	$data = $mysql->getData($sql);
	if(empty($data[0][0])){
		return "数量异常";
	}
	//取到总备货数量
	$count1 = intval($data[0][0]);
	
	$sql = "SELECT SUM(count) FROM sellinfo WHERE bookid = '".$bookid."' GROUP BY null";
	$data = $mysql->getData($sql);
	$count2 = 0;
	if(!empty($data[0][0])){
		$count2 = intval($data[0][0]);
	}
	
	return strval($count1 - $count2);
}

?>