<?php
$hangsanxuat = new hangsanxuat();
$data = $hangsanxuat->getAll();
?>            
        
    <h2>Quản lý hãng sản xuất</h2> 
		<form action="index.php?act=insert_hangsanxuat" method="post">
			Mã hãng &nbsp; <input type="text" name="ml"><br><br>
			Tên hãng  &nbsp;<input type="text" name="tl"><br><br>
			<input type="submit" name="them" value="Save"><br><br>
		</form>
                    
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Mã hãng sản xuất</th>
            <th scope="col" class="rounded">Tên hãng sản xuất</th>
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
            <td><?php echo $row["mahang"];?></td>
            <td><?php echo $row["tenhang"];?></td>
            

            <td><a href="index.php?act=sua_hangsanxuat&mahang=<?php echo $row["mahang"];?>"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
            <td><a href="index.php?act=del_hangsanxuat&mahang=<?php echo $row["mahang"];?>" class="ask"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
        </tr>
        
    	<?php
}
        ?>  
        
    </tbody>
</table>

	 <a href="#" class="bt_green"><span class="bt_green_lft"></span><strong>Add new item</strong><span class="bt_green_r"></span></a>
     <a href="#" class="bt_blue"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>
     <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a>

    
     
     
     
         
     
     
      
    
    
           
     
      
     
     