
<?php
$hinh = new hinh();
if (isset($_POST["them"]))
{	
	$mh = $_POST["mh"];	
	$th = $_POST["th"];
	$msp = $_POST["msp"];
	$ht = $_POST["ht"];
}
$s =$hinh->inserthinh($mh,$th,$msp,$ht);
?>
<script type="text/javascript" >
    alert("Da thuc hien");
    window.location='index.php?act=hinh';
</script>
