    
<?php


$act=getIndex("act");
$masanpham =getIndex("masanpham");
$hangsanxuat=new hangsanxuat();
$da = $hangsanxuat->getAll();

	

$sanpham = new sanpham();

if ($act=="edit_sanpham") 
{
	$data = $sanpham->getDetail($masanpham);
	
		
		if (Count($data)==0) {exit;}

			if ($masanpham =="") exit;
		?>            
		 
			<h2>Quản lý sản phẩm</h2> 
				<fieldset style="width:100%; border:solid 2px; margin:10px auto" >
		<legend>Nhập thông tin sản phẩm</legend>
           <form action="index.php?act=edit_sanpham2" method="post">
			Mã sản phẩm &nbsp; <input type="hidden" name="msp" value="<?php echo $data["masanpham"];?>"><?php echo $data["masanpham"];?><br><br>
			Tên sản phẩm  &nbsp;<input type="text" name="tsp" value="<?php echo $data["tensanpham"];?>"><br><br>
			Mã hãng  &nbsp;<select name="mh">
				<?php 
				foreach($da as $hsx=>$key)
				{ ?>
				<option value="<?php echo $key["mahang"]; ?>"><?php echo $key["mahang"]; ?></option>
				<?php } ?>
			</select>
			Màn hình &nbsp;<input type="text" name="mah" value="<?php echo $data["manhinh"];?>"><br><br>
			CPU	&nbsp;<input type="text" name="cpu" value="<?php echo $data["cpu"];?>"><br><br>
			VGA	&nbsp;<input type="text" name="vga" value="<?php echo $data["vga"];?>"><br><br>
			Hệ điều hành	&nbsp;<input type="text" name="hdh" value="<?php echo $data["hdh"];?>"><br><br>
			Pin	&nbsp;<input type="text" name="pin" value="<?php echo $data["pin"];?>"><br><br>
			Số lượng &nbsp;<input type="text" name="sl" value="<?php echo $data["soluong"];?>"><br><br>
			Giá gốc	&nbsp;<input type="text" name="gg" value="<?php echo $data["giagoc"];?>"><br><br>
			Giá khuyến mãi &nbsp;<input type="text" name="gkm" value="<?php echo $data["giakhuyenmai"];?>"><br><br>
			Thời gian bảo hành &nbsp;<input type="text" name="tgbh" value="<?php echo $data["thoigianbaohanh"];?>"><br><br>
			Tình trạng &nbsp;<input type="text" name="tt" value="<?php echo $data["tinhtrang"];?>"><br><br>
			Mô tả &nbsp;
			 <textarea id="contentchau" name="contentchau"><?php echo $data["mota"];?></textarea>
          <script type="text/javascript"> CKEDITOR.replace('contentchau'); </script><br><br>
			<input type="submit" name="them" value="Save"><br><br>
		</form>         
    </fieldset>   <br>   
		<?php
		}
if(isset($_POST["them"])!="")
{
if ($act=="edit_sanpham2" ) //update
{

  $sanpham->editsanpham($_POST["msp"],$_POST["tsp"],$_POST["mh"],$_POST["mah"],$_POST["cpu"],$_POST["vga"],$_POST["pin"],$_POST["hdh"],$_POST["sl"],$_POST["gg"],$_POST["gkm"],$_POST["tgbh"],$_POST["tt"],$_POST["contentchau"]);

	
 ?>
<script type="text/javascript" >
    alert("Da thuc hien");
    window.location='index.php?act=sanpham';
</script>
<?php 
}
}
?>

