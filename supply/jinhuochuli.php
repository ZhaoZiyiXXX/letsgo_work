<?php
header("Content-type:text/html;charset=utf-8");
define('IN_TG',true);
include dirname(__FILE__).'/../configs/configs.php';
require_once $GLOBALS["rootPath"].'/includes/function.php';
include $GLOBALS["rootPath"].'/Library/PHPExcel/IOFactory.php';



if(empty($_POST["supplier_id"])||empty($_POST["place"])||empty($_POST["date"])||empty($_POST["name"]))
{
	echo "传入参数有误";
	exit;
}

//echo $_POST["supplier_id"].$_POST["place"].$_POST["date"].$_POST["name"];

/* echo "Upload: " . $_FILES["file"]["name"] . "<br />";
echo "Type: " . $_FILES["file"]["type"] . "<br />";
echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
echo "Stored in: " . $_FILES["file"]["tmp_name"]."<br />";
echo "Error: " . $_FILES["file"]["error"] . "<br />"; */
//检查文件是否上传成功
if ((($_FILES["file"]["type"] == "application/vnd.ms-excel")
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
&& ($_FILES["file"]["size"] < 8000000))
{
  	if ($_FILES["file"]["error"] > 0)
	{
	    echo "Error: " . $_FILES["file"]["error"] . "<br />";
	    exit;
    }
}
else
{
  echo "Invalid file";
  exit;
}

//文件移动到指定位置
if (file_exists($GLOBALS["rootPath"]."/uploads/" . $_FILES["file"]["name"]))
{
	echo $_FILES["file"]["name"] . " already exists. ";
	exit;
}
else
{
	move_uploaded_file($_FILES["file"]["tmp_name"],
	$GLOBALS["rootPath"]."/uploads/" . $_FILES["file"]["name"]);
	echo "文件已经保存在: " . $GLOBALS["rootPath"]."/uploads/" . $_FILES["file"]["name"]."<br/>";
}
$filePath =$GLOBALS["rootPath"]."/uploads/" . $_FILES["file"]["name"];
$fileType = PHPExcel_IOFactory::identify($filePath); //文件名自动判断文件类型
$objReader = PHPExcel_IOFactory::createReader($fileType);
$objPHPExcel = $objReader->load($filePath);
$currentSheet = $objPHPExcel->getSheet(0); //第一个工作簿
$allRow = $currentSheet->getHighestRow(); //行数

//基本信息确定
/* $supplier_id= iconv('utf-8','gb2312', "1");
$place= iconv('utf-8','gb2312', "同济嘉定");
$date= iconv('utf-8','gb2312', "2014-08-26");
$order= iconv('utf-8','gb2312', "测试的订单"); */
$supplier_id= $_POST["supplier_id"];
$place=  $_POST["place"];
$date=  $_POST["date"];
$order=$_POST["name"];

//开始循环遍历每一行信息
for($currentRow = 2;$currentRow<=$allRow;$currentRow++){
	//判断每一行的B列是否为有效的序号，如果为空或者小于之前的序号则结束
	$book = array();
/* 	$book['name'] = iconv('utf-8','gb2312',  (string)$currentSheet->getCell('A'.$currentRow)->getValue());//书名
	$book['press'] = iconv('utf-8','gb2312',  (string)$currentSheet->getCell('B'.$currentRow)->getValue());//出版社
	$book['ISBN'] = iconv('utf-8','gb2312',  (string)$currentSheet->getCell('C'.$currentRow)->getValue());//ISBN
	$book['count'] =iconv('utf-8','gb2312',   (string)$currentSheet->getCell('D'.$currentRow)->getValue());//数量
	$book['price'] = iconv('utf-8','gb2312',  (string)$currentSheet->getCell('E'.$currentRow)->getValue());//定价 */
	$book['name'] = (string)$currentSheet->getCell('A'.$currentRow)->getValue();//书名
	$book['press'] = (string)$currentSheet->getCell('B'.$currentRow)->getValue();//出版社
	$book['ISBN'] = (string)$currentSheet->getCell('C'.$currentRow)->getValue();//ISBN
	$book['count'] = (string)$currentSheet->getCell('D'.$currentRow)->getValue();//数量
	$book['price'] = (string)$currentSheet->getCell('E'.$currentRow)->getValue();//定价
	write_data2db($book,$supplier_id,$place,$date,$order);
	echo "正在处理第 $currentRow 条数据<br/>";
}
echo "上传文件并处理完成<br/>";
if (unlink($filePath)) {
	echo "临时文件删除完成<br/>";
} else {
	echo "临时文件删除失败<br/>";
}
function write_data2db($bookinfo,$supplier_id,$place,$date,$order){
	$sql = "INSERT INTO s_supplier_record (supplier_id,book_name,book_press,book_price,book_count,book_discount,book_off,book_isbn,place,`type`,`date`,`order`,`status`) VALUES ('".
	$supplier_id."','".$bookinfo['name']."','".$bookinfo['press']."','".$bookinfo['price']."','".$bookinfo['count']."','0.7','0.78','".$bookinfo['ISBN']."','".$place."','0','".$date."','".$order."','0')";
	_mysql_exec($sql);
}
