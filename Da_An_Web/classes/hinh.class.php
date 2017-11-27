<?php
class hinh extends Db{
	private $_page_size =50;//M?t trang hi?n h? 5 cu?n sách
	private $_page_count;
	public function getRand($n)
	{
		$sql="select masanpham, tensanpham, img from sanpham order by rand() limit 0, $n ";
		return $this->exeQuery($sql);	
	}
	
	public function getByPubliser($manhaxb)
	{
		
	}
	public function delete($mahinh)
	{
		$sql ="delete from hinh where mahinh = :mahinh";
		
		$arr =  Array(":mahinh"=>$mahinh);
		$this->exeNoneQuery($sql, $arr);	
		//echo $sql;
		//print_r($arr);exit;

		$sql="delete from hinh where mahinh=:mahinh ";
		return $this->exeNoneQuery($sql, $arr);	
	}
	
	public function getDetail($mahinh)
	{
		$sql="SELECT
hinh.mahinh,
hinh.tenhinh,
hinh.masanpham,
hinh.hientrang,
sanpham.masanpham
FROM
hinh
INNER JOIN sanpham ON hinh.masanpham = sanpham.masanpham

where hinh.mahinh=:mahinh";
		$arr = array(":mahinh"=>$mahinh);
		$data = $this->exeQuery($sql, $arr);
		if (Count($data)>0) return $data[0];
		else return array();
	}
	
	public function getAll($currPage=1)
	{
		/*$offset = ($currPage -1) * $this->_page_size;
		$sql="SELECT
				Count(*)
				FROM
				hangsanxuat
				INNER JOIN sanpham ON sanpham.mahang = hangsanxuat.mahang";
				
				$n  = $this->count($sql);
				$this->_page_count = ceil($n/$this->_page_size);*/
		$sql="SELECT
				hinh.mahinh,
				hinh.tenhinh,
				hinh.masanpham,
				hinh.hientrang
				FROM
				hinh ";
					
				//limit $offset, " . $this->_page_size;
		
		return $this->exeQuery($sql);
	}
	
	public function search($key, $currPage=1)
	{
		//$key = Utils::getIndex("key");
		$arr = array(":mota"=>"%". $key ."%",  ":tensanpham"=>"%". $key ."%");
		
		$offset = ($currPage -1) * $this->_page_size;
		//echo "<hr> $offset = ($currPage -1) * {$this->_page_size} <hr>";
		/*$sql="SELECT
				Count(*)
				FROM
				hangsanxuat
				INNER JOIN sanpham ON sanpham.mahang = hangsanxuat.mahang
				
				where tensanpham like :tensanpham  or manhinh like :manhinh";
				$n  = $this->count($sql, $arr);
				$this->_page_count = ceil($n/$this->_page_size);
				*/
		$sql="SELECT
				sanpham.masanpham,						
				sanpham.tensanpham,
				sanpham.manhinh,
				sanpham.cpu,
				sanpham.vga,
				sanpham.hdh,
				sanpham.pin,
				sanpham.mahang,
				sanpham.giakhuyenmai,
				sanpham.thoigianbaohanh,
				sanpham.mota,
				hinh.tenhinh,
				hinh.mahinh
				FROM
				sanpham
				INNER JOIN hinh ON hinh.masanpham = sanpham.masanpham
				where (tensanpham like :tensanpham or mota like :mota)  and (hinh.mahinh like '%a') ";
				//limit $offset, " . $this->_page_size;
						
		echo $sql;
		print_r($arr);
		return $this->exeQuery($sql, $arr);
	}
	
	public function count($sql, $arr=array())
	{
		return $this->countItems($sql, $arr);
	}
	
	public function getPageCount()
	{
		return $this->_page_count;	
	}
	function inserthinh($mahinh,$tenhinh,$masanpham,$hientrang){
		$sql="insert into hinh(mahinh,tenhinh,masanpham,hientrang) ";
		$sql .=" values(:id,:ten,:msp,:ht)";
		$arr = array(":id"=>$mahinh,":ten"=> $tenhinh,":msp"=>$masanpham,":ht"=>$hientrang);	
		return $this->query($sql, $arr);	
	}
	function edithinh($mahinh,$tenhinh,$masanpham,$hientrang){
		$sql="update hinh set tenhinh='$tenhinh',masanpham='$masanpham',hientrang='$hientrang'";
		$stm = $this->query($sql);
	}
}
?>