<?php 
class Shopcar 
{ 
	//商品列表 
	public $productList ;
	
	public function __construct(){
		if(isset($_SESSION['shopcar']))
			$this->productList=unserialize($_SESSION['shopcar']);
		else
			$this->productList=array(); ;
	}
	/** 
	* 
	* @param unknown_type $product 传进来的商品 
	* @return true 购物车里面没有该商品 
	*/ 
	public function checkProduct($product) 
	{ 
		for($i=0;$i<count($this->productList);$i++ ) 
		{ 
			if($this->productList[$i]['id']==$product['id']) 
			return $i; 
		} 
		return -1; 
	}
	//添加到购物车 
	public function add($product) 
	{ 
		print_r($product);
		$i=$this->checkProduct($product); 
		if($i==-1) 
			array_push($this->productList,$product); 
			//暂时不需要累加数量
/* 		else 
			$this->productList[$i]['num']+=$product['num'];  */
		$_SESSION['shopcar']=serialize($this->productList);
	} 
	//删除 
	public function delete($product) 
	{ 
		$i=$this->checkProduct($product); 
		if($i!=-1) 
			array_splice($this->productList,$i,1); 
		$_SESSION['shopcar']=serialize($this->productList);
	} 
	//返回所有的商品的信息 
	public function show() 
	{
		return $this->productList; 
	}
} 