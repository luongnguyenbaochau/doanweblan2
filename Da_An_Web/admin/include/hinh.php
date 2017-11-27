<?php
$hinh = new hinh();
$data = $hinh->getAll();
$sanpham=new sanpham();
$da = $sanpham->getAll();
?>            
        
    <h2>Quản lý hình sản phẩm </h2> 
		<form action="index.php?act=insert_hinh" method="post">
			Mã hình &nbsp; <input type="text" name="mh"><br><br>
			Tên hình  &nbsp;<input type="text" name="th"><br><br>
			Mã sản phẩm  &nbsp;<select name="msp">
				<?php 
				foreach($da as $hsx=>$key)
				{ ?>
				<option value="<?php echo $key["masanpham"]; ?>"><?php echo $key["masanpham"]; ?></option>
				<?php } ?>
			</select>
			Hiện trạng  &nbsp;<input type="text" name="ht"><br><br>
			<input type="submit" name="them" value="Save"><br><br>
		</form>
                    
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Mã hình</th>
            <th scope="col" class="rounded">Tên hình</th>
			<th scope="col" class="rounded">Mã sản phẩm</th>
			<th scope="col" class="rounded">Hiện trạng</th>
            <th scope="col" class="rounded">Edit</th>
            <th scope="col" class="rounded-q4">Delete</th>
        </tr>
    </thead>
        
    <tbody>
    <?php 
    foreach($data as $row)
    {?>
    	<tr>
        	<td><input type="checkbox" name="" /></td>
            <td><?php echo $row["mahinh"];?></td>
            <td><?php echo $row["tenhinh"];?></td>
			<td><?php echo $row["masanpham"];?></td>
			<td><?php if($row["hientrang"]==1)echo "gần đây"; else if ($row["hientrang"]==2) echo "bán chạy"; else  echo " "; ?></td>
            

            <td><a href="index.php?act=edit_hinh&mahinh=<?php echo $row["mahinh"];?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="index.php?act=del_hinh&mahinh=<?php echo $row["mahinh"];?>" class="ask"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
        </tr>
        
    	<?php
}
        ?>  
        
    </tbody>
</table>

	 <a href="#" class="bt_green"><span class="bt_green_lft"></span><strong>Add new item</strong><span class="bt_green_r"></span></a>
     <a href="#" class="bt_blue"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>
     <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a>

    
     
     
     
         
     
     
      
    
    
           
     
      
     
     