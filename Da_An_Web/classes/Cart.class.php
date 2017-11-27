<?php
class Cart extends Db{
	private $_cart;
	private $_num_item =0;
	public function  __construct()
	{
		if(!isset($_SESSION["cart"])) $this->_cart= array();
		else $this->_cart = $_SESSION["cart"];
		$this->_num_item = array_sum($this->_cart);
		
	}
	
	public function getNumItem()
	{
		return $this->_num_item;	
	}
	public function __destruct()
	{
		$_SESSION["cart"] = $this->_cart;	
	}
	/*
	Them san pham có mã $id và số lương $quantity vào giỏ hàng
	*/
	
	public function laptopExist($masanpham)
	{
		$sql="select * from sanpham where masanpham = '$masanpham' ";
		$temp = new Db();
		$temp->exeQuery($sql);
		if ($temp->getRowCount()==0) return false;
		return true;
	}
	public function add($id, $quantity=1)
	{	
		if ($id=="" || $quantity<1) return;
		if (!$this->laptopExist($id)) return;
		//print_r($this->_cart);		
		if (isset($this->_cart[$id]))
			$this->_cart[$id]+=	$quantity;
		else $this->_cart[$id]=	$quantity;
		$_SESSION["cart"] = $this->_cart;	
		$this->_num_item = array_sum($this->_cart);
		//echo "Da them $id - $quantity ";
		//echo "<script language=javascript>window.location='index.php?mod=cart';</script>";//Chuyển trình duyệt web tới trang hiển thị cart
	}
	
	public function remove($id)
	{
		unset($this->_cart[$id]);
		$this->_num_item = array_sum($this->_cart);
		$_SESSION["cart"] = $this->_cart;	
	}
	public function edit($id, $quantity)
	{
		$this->_cart[$id]	= $quantity;
		$this->_num_item = array_sum($this->_cart);
		$_SESSION["cart"] = $this->_cart;	
	}
	
	public function show()
	{
		if (Count($this->_cart)==0) 
		{	echo "Giỏ hàng rỗng";
			return;
		}
		echo "<table width='800px'>
					<tr><td style='border:3px solid #900;text-align:center;'>Mã sản phẩm</td>
                    <td style='border:3px solid #900; text-align:center;'>Số lượng</td>
					<td style='border:3px solid #900; text-align:center;'>Giá</td>
                    <td style='border:3px solid #900; text-align:center;'>Thành Tiền</td>
					<td style='border:3px solid #900; text-align:center;'>Hình</td></tr>";
		$laptop = new sanpham();
		foreach($this->_cart as $id=>$quantity)
		{
				$row = $laptop->getDetail($id);
				//echo "id = $id <hr>";
		//	echo "<pre>";	print_r($row);
				$gia = $row["giakhuyenmai"];
				$tt = $gia * $quantity;
				$img ="<img src='img/". $row["tenhinh"]."' width=100>";
				echo "<tr>
                <td style='border:3px solid #900; text-align:center;'>$id</td>
                <td style='border:3px solid #900; text-align:center;'>$quantity</td>
							<td style='border:3px solid #900; text-align:center;'>"  .number_format($gia,0,'.','.') ." đ</td>
							<td style='border:3px solid #900; text-align:center;'>"  .number_format($tt,0,'.','.') ." đ</td>
							<td style='border:3px solid #900; text-align:center;'>$img</td></tr>";
		}
		
		echo "</table>";	
		$this->setCartInfo($this->getNumItem());
		
		echo '<script>document.getElementById("dd").innerHTML="' . $this->getNumItem() .'";</script>';
		//Update số lượng item của cart trong header.php. Có thể không sử dụng method này nếu mỗi lần thêm xong, chuyển trang về mod=cart.
		
	}
	
	function setCartInfo( $quantity=0, $id="cart_sumary")
	{
		echo "<script language=javascript> document.getElementById('$id').innerHTML =$quantity; </script>";
	}
	function setThongTin()
	{
		echo  $this->getNumItem() ;
	}
}
?>