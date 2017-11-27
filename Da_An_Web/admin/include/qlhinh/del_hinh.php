<?php
$hinh = new hinh();
$mahinh =$_GET["mahinh"];
$hinh->delete($mahinh);
?>
<script type="text/javascript" >
    alert("Da xoa");
    window.location='index.php?act=hinh';
</script>            
        
   