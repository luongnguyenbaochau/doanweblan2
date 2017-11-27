    
<?php


$act=getIndex("act");
$mahinh =getIndex("mahinh");
$sanpham=new sanpham();
$da = $sanpham->getAll();

	

$hinh = new hinh();

if ($act=="edit_hinh") 
{
	$data = $hinh->getDetail($mahinh);
	
		
		if (Count($data)==0) {exit;}

			if ($mahinh =="") exit;
		?>            
		 
			<h2>Quản lý hình sản phẩm </h2> 
		<form action="index.php?act=edit_hinh2" method="post">
			Mã hình &nbsp; <input type="hidden" name="mh" value="<?php echo $data["mahinh"];?>"><?php echo $data["mahinh"];?><br><br>
			Tên hình  &nbsp;<input type="text" name="th" value="<?php echo $data["tenhinh"];?>"><br><br>
			Mã sản phẩm  &nbsp;<select name="msp">
				<?php 
				foreach($da as $hsx=>$key)
				{ ?>
				<option value="<?php echo $key["masanpham"]; ?>"><?php echo $key["masanpham"]; ?></option>
				<?php } ?>
			</select>
			Hiện trạng  &nbsp;<input type="text" name="ht" value="<?php echo $data["hientrang"];?>"><br><br>
			<input type="submit" name="them" value="Save"><br><br>
		</form>   <br>   
		<?php
		}

if ($act=="edit_hinh2" ) //update
{

  $hinh->edithinh($_POST["mh"],$_POST["th"],$_POST["msp"],$_POST["ht"]);

	
 ?>
<script type="text/javascript" >
    alert("Da thuc hien");
    window.location='index.php?act=hinh';
</script>
<?php 

}
?>

