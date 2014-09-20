<?php

define('IN_TG',true);
include dirname(__FILE__).'/../configs/configs.php';
require_once $GLOBALS["rootPath"].'/includes/function.php';

$sql = "SELECT ssr.book_name AS `书名`,ssr.id AS id,ssr.book_press AS `出版社`,ssr.book_price AS `定价`,ssr.book_isbn AS ISBN,ssr.place AS `送货地点`,".
		"ssr.date AS `送货时间`,ssr.book_count AS `数量` FROM s_supplier_record AS ssr WHERE ssr.type = 0 LIMIT 0, 5";
$result = _query_assoc($sql);
$html ="<tr>
					<th>id</th>
					<th>书名</th>
					<th>出版社</th>
					<th>定价</th>
					<th>数量</th>
					<th>ISBN</th>
					<th>送货地点</th>
					<th>送货时间</th>
				</tr>";
foreach($result as $row){
	$html .= "<tr>";
	$html .= "<td>{$row['id']}</td>";
	$html .= "<td>{$row['书名']}</td>";
	$html .= "<td>{$row['出版社']}</td>";
	$html .= "<td>{$row['定价']}</td>";
	$html .= "<td>{$row['数量']}</td>";
	$html .= "<td>{$row['ISBN']}</td>";
	$html .= "<td>{$row['送货地点']}</td>";
	$html .= "<td>{$row['送货时间']}</td>";
	$html .= "</tr>";
}
echo $html;
exit;

?>


