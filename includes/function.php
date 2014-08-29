<?php
if(!defined('IN_TG')){
	exit("Access Defined!");
}
require_once $GLOBALS["rootPath"].'/includes/mysql.php';


function _get_user_tuihuo($staffid){
	if(!$staffid){
		return false;
		exit();
	}
	$sql = "SELECT ssr.book_name AS `书名`,ssr.book_press AS `出版社`,ssr.book_isbn AS ISBN,ssr.book_price AS `定价`,".
			"ssb.count AS `数量`,ssb.datetime AS `签收时间`,ssb.count AS `签收数量` FROM s_supplier_bookflow AS ssb ,s_supplier_record AS ssr ,s_supplier_info AS ssi".
			" WHERE ssb.record_id = ssr.id AND ssr.supplier_id = ssi.id AND ssb.id = '".$staffid."'";
	$result = _query_assoc($sql);
	if(empty($result)){
		return false;
		exit();
	}
	return $result;
}

function _get_book_flowinfo(){
	$sql = "SELECT ssr.book_name AS `书名`,ssr.book_press AS `出版社`,ssr.book_price AS `定价`,ssr.book_isbn AS ISBN,ssb.count AS `数量`,".
	"ls.`name` AS `退货人`,ssr.place AS `地点` FROM s_supplier_bookback AS ssb ,s_supplier_bookflow AS ssf ,s_supplier_record AS ssr ,letsgo_staff ".
	"AS ls WHERE ssb.flowid = ssf.id AND ssf.staff_id = ls.staffId AND ssf.record_id = ssr.id ";
	$result = _query_one_assoc($sql);
	if(empty($result)){
		return false;
		exit();
	}
	foreach($result as $row){
		echo '<tr>';
		if(_get_stringlen($row["书名"]) > 15){
			echo '<td>'.csubstr($row["书名"],0,15).'</td>';
		}else{
			echo '<td>'.$row["书名"].'</td>';
		}
		echo '<td>'.$row["出版社"].'</td>';
		echo '<td>'.$row["ISBN"].'</td>';
		echo '<td>'.$row["定价"].'</td>';
		echo '<td>'.$row["数量"].'</td>';
		echo '<td>'.$row["退货人"].'</td>';
		echo '<td>'.$row["地点"].'</td>';
		echo'</tr>';
	}
	return true;
}


/**
 * 
 * @param unknown $bookflowid
 * @param unknown $count
 */
function _set_tuihuo($bookflowid,$count){
	$sql = "INSERT INTO s_supplier_bookback (`flowid`,`count`) VALUES ('".$bookflowid."','".$count."')";
	_mysql_exec($sql);
}
/**
 * 
 * @param unknown $bookflowid
 * @return number|unknown
 */
function _get_book_tuihuo_count($bookflowid){
	$sql ="SELECT count FROM s_supplier_bookback WHERE flowid = '".$bookflowid."'";
	$result = _query_assoc($sql);
	if(empty($result)){
		return 0;
		exit();
	}else{
		$count = 0;
		foreach($result as $row){
			$count +=$row["count"];
		}
		return $count;
		exit();
	}
}
/**
 * 
 * @param string $string
 * @return boolean
 */
function _get_user_books($string){
	if(!$string){
		return false;
		exit();
	}
	$sql = "SELECT ssb.`id` AS `id` ,ssi.`name` AS `渠道`,ssr.book_name AS `书名`,ssr.book_press AS `出版社`,ssr.book_isbn AS ISBN,ssr.book_price AS `定价`,".
	"ssr.book_off AS `售价折扣`,ssb.count AS `数量`,ssb.datetime AS `签收时间` FROM s_supplier_bookflow AS ssb ,s_supplier_record AS ssr ,s_supplier_info AS ssi".
	" WHERE ssb.record_id = ssr.id AND ssr.supplier_id = ssi.id AND ssb.staff_id = '".$string."'";
	$result = _query_assoc($sql);
	if(empty($result)){
		return false;
		exit();
	}
	foreach($result as $row){
		echo '<tr>';
		echo '<td>'.$row["渠道"].'</td>';
		if(_get_stringlen($row["书名"]) > 15){
			echo '<td>'.csubstr($row["书名"],0,15).'</td>';
		}else{
			echo '<td>'.$row["书名"].'</td>';
		}
		echo '<td>'.$row["出版社"].'</td>';
		echo '<td>'.$row["ISBN"].'</td>';
		echo '<td>'.$row["定价"].'</td>';
		echo '<td>'.$row["售价折扣"].'</td>';
		echo '<td>'.$row["数量"].'</td>';
		echo '<td>'.$row["签收时间"].'</td>';
		echo '<td><div class="btn-group"><button onClick="javascript:window.location.href='.'\'/book/tuihuo.php?bookflowid='.$row["id"].'\';" type="button" class="btn btn-default">申请退货</button><button type="button" class="btn btn-default">添加备注</button></div></td>';
		echo'</tr>';
	}
	return true;
}
/*  
* 中文截取，支持gb2312,gbk,utf-8,big5  
*  
* @param string $str 要截取的字串  
* @param int $start 截取起始位置  
* @param int $length 截取长度  
* @param string $charset utf-8|gb2312|gbk|big5 编码  
* @param $suffix 是否加尾缀  
*/
function csubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
   if(function_exists("mb_substr")){
       if(mb_strlen($str, $charset) <= $length) return $str;  
       $slice = mb_substr($str, $start, $length, $charset);  
   }else{  
       $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";  
       $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";  
       $re['gbk']          = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";  
       $re['big5']          = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";  
       preg_match_all($re[$charset], $str, $match);  
       if(count($match[0]) <= $length) return $str;  
       $slice = join("",array_slice($match[0], $start, $length));  
   }  
   if($suffix) 
   	return $slice."…";  
   return $slice;  
} 
/**
 * 
 * @param unknown $string
 */
function _get_stringlen($string){
	preg_match_all('/./us', $string, $match);
	return count($match[0]); 
}
/**
 * 
 * @param unknown $staffid
 * @return Ambigous <unknown, NULL>
 */
function _get_staffinfo_byid($staffid){
	return _query_one_assoc('SELECT id,name,staffid,roleType,email,telephone,college FROM letsgo_staff WHERE `staffid` = '.$staffid);
}

/**
 * 
 * @param unknown $orderid
 * @return boolean
 */
function _get_order_info($orderid){
	if(!$orderid){
		return false;
		exit();
	}
	$sql = "SELECT lb.`name` AS `书名`,lb.author AS `作者`,lb.press AS `出版社`,lb.isbn AS ISBN,lb.fixedPrice AS `定价`,lob.bookAmount AS `数量`,".
			"lobs.statusName AS `状态` FROM letsgo_book AS lb ,letsgo_order AS lo ,letsgo_order_book AS lob ,letsgo_order_book_statustype AS lobs".
			" WHERE lb.id = lob.bookId AND lob.statusId = lobs.statusId AND lo.orderId = lob.orderId AND lo.orderId = ".$orderid;
	$result = _query_assoc($sql);
	if(empty($result)){
		return false;
		exit();
	}
	foreach($result as $row){
		echo '<tr>';
		if(_get_stringlen($row["书名"]) > 15){
			echo '<td>'.csubstr($row["书名"],0,15).'</td>';
		}else{
			echo '<td>'.$row["书名"].'</td>';
		}
		if(_get_stringlen($row["作者"]) > 15){
			echo '<td>'.csubstr($row["作者"],0,15).'</td>';
		}else{
			echo '<td>'.$row["作者"].'</td>';
		}
		echo '<td>'.$row["出版社"].'</td>';
		echo '<td>'.$row["ISBN"].'</td>';
		echo '<td>'.$row["定价"].'</td>';
		echo '<td>'.$row["数量"].'</td>';
		echo '<td>'.$row["状态"].'</td>';
		echo'</tr>';
	}
	return true;
}
/**
 * 
 * @param string $staffid
 * @return boolean
 */
function _get_orders($staffid = null){
	if($staffid == null){
		$sql = "SELECT lo.staffId AS `工号`,lo.orderId AS `订单号`,lo.orderName AS `订单名称`  FROM letsgo_order AS lo";
	}else{
		$sql = "SELECT lo.staffId AS `工号`,lo.orderId AS `订单号`,lo.orderName AS `订单名称`  FROM letsgo_order AS lo WHERE lo.staffId = '".$staffid."'";
	}
	$result = _query_assoc($sql);
	if(empty($result)){
		return false;
		exit();
	}
	foreach($result as $row){
		echo '<tr>';
		echo '<td>'.$row["工号"].'</td>';
		echo '<td>'.$row["订单号"].'</td>';
		if(_get_stringlen($row["订单名称"]) > 15){
			echo '<td>'.csubstr($row["订单名称"],0,15).'</td>';
		}else{
			echo '<td>'.$row["订单名称"].'</td>';
		}
		echo '<td><a target="_blank" href="/book/orderinfo.php?orderid='.$row["订单号"].'">详情</a></td>';
		echo'</tr>';
	}
	return true;
}
/**
 * 
 * @param string $key
 * @param string $value
 * @param string $time
 */
function _set_cookies($key,$value,$time = 0){
	echo $key.$value.$time;
	if($time == 0){
		setcookie($key,$value,null,"/");
	}else{
		setcookie($key,$value,$time,"/");
	}
}
/**
 * 弹出提示框并返回到上一个页面
 * @param string $string
 */
function _alert_back($string){
	echo '<script type="text/javascript">alert("'.$string.'");history.back(-1);</script>';
}
/**
 * 获取全部公告列表
 */
function _get_notices(){
	$result = _query_assoc("select * from letsgo_notice order by releasetime desc");
	foreach($result as $row){
		echo '<tr>';
		echo '<td>'.$row["releaseTime"].'</td>';
		if($row["type"]=="notice"){
			echo '<td class="content"><a href="/notice.php?id='.$row["id"].'">'.$row["title"].'</a></td>';
		}else{
			echo '<td class="content">'.$row["title"].'</td>';
		}
		echo'</tr>';
	}
}

/**
 * 获取某一条公告的详细信息
 * @param string $id
 */
function _get_one_notices($id){
	return  _query_one_assoc("SELECT * FROM letsgo_notice WHERE id = $id");
}
