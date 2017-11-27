    
<?php
$act=getIndex("act");
$mahang =getIndex("mahang");



$hangsanxuat = new hangsanxuat();

if ($act=="sua_hangsanxuat") 
{
	$data = $hangsanxuat->getDetail($mahang);
		//print_r($data);
		if (Count($data)==0) {exit;}

			if ($mahang =="") exit;
		?>            
		 
			<h2>Quản lý hãng sản xuất</h2> 
				<form action="index.php?act=sua_hangsanxuat2" method="post">
					Mã hãng &nbsp; <input type="hidden" name="mahang" value="<?php echo $data["mahang"];?>" ><?php echo $data["mahang"];?><br>
					Tên hãng  &nbsp;<input type="text" name="tenhang" value="<?php echo $data["tenhang"];?>"><br><br>
					<input type="submit" name="them" value="Save"><br><br>
				</form>
		<?php
		}

if ($act=="sua_hangsanxuat2") //update
{

  $hangsanxuat->suahangsanxuat($_POST["mahang"],$_POST["tenhang"]);
 // header("location: index.php?act=hangsanxuat");?
 ?>
<script type="text/javascript" >
    alert("Da thuc hien");
    window.location='index.php?act=hangsanxuat';
</script>
<?php 
}
?>

