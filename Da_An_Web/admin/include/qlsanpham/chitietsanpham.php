<?php
$sanpham = new sanpham();
$data = $sanpham->getAll();
?>            
        
    <h2>Quản lý chi tiết sản phẩm</h2> 
                    
                    
<table id="rounded-corner" summary="2007 Major IT Companies' Profit" width="950px;">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Mã sản phẩm</th>
            <th scope="col" class="rounded">Tên sản phẩm</th>
			<th scope="col" class="rounded">Thời gian bảo hành</th>
			<th scope="col" class="rounded">Tình trạng</th>
			<th scope="col" class="rounded">Mô tả</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
    </thead>
       
    <tbody>
    <?php 
	 $masanpham = $_GET['masanpham'];
	  $sql="SELECT
sanpham.masanpham,
sanpham.tensanpham,
sanpham.thoigianbaohanh,
sanpham.tinhtrang,
sanpham.mota
FROM
sanpham  where sanpham.masanpham='$masanpham'";
$data = $db->exeQuery($sql);
    foreach($data as $row)
    {?>
	
    	<tr>
        	<td><input type="checkbox" name="" /></td>
			<td><?php echo $row["masanpham"];?></td>
            <td><?php echo $row["tensanpham"];?></td>
			<td><?php echo $row["thoigianbaohanh"];?></td>
			<td><?php if($row["tinhtrang"]==1)echo "còn hàng"; else echo "hết hàng";?></td>
			<td width=500px;><pre><?php echo $row["mota"];?></td>
            <td><a href="index.php?act=edit_sanpham&masanpham=<?php echo $row["masanpham"];?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="index.php?act=del_sanpham&masanpham=<?php echo $row["masanpham"];?>" class="ask"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
        </tr>
        
    	<?php
}
        ?>  
        
    </tbody>
</table>

	 <a href="#" class="bt_green"><span class="bt_green_lft"></span><strong>Add new item</strong><span class="bt_green_r"></span></a>
     <a href="#" class="bt_blue"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>
     <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a> 
     
     
       
     
     
      
     
    
           
     
      
     
     