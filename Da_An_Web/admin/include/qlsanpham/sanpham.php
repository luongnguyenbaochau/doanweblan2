<?php
$sanpham = new sanpham();
$data = $sanpham->getAll();
$hangsanxuat=new hangsanxuat();
$da = $hangsanxuat->getAll();
?>            
        
    <h2>Quản lý sản phẩm</h2> 
	<fieldset style="width:100%; border:solid 2px; margin:10px auto" >
		<legend>Nhập thông tin sản phẩm</legend>
           <form action="index.php?act=insert_sanpham" method="post">
			Mã sản phẩm &nbsp; <input type="text" name="msp"><br><br>
			Tên sản phẩm  &nbsp;<input type="text" name="tsp"><br><br>
			Mã hãng  &nbsp;<select name="mh">
				<?php 
				foreach($da as $hsx=>$key)
				{ ?>
				<option value="<?php echo $key["mahang"]; ?>"><?php echo $key["mahang"]; ?></option>
				<?php } ?>
			</select>
			Màn hình &nbsp;<input type="text" name="mah"><br><br>
			CPU	&nbsp;<input type="text" name="cpu"><br><br>
			VGA	&nbsp;<input type="text" name="vga"><br><br>
			Hệ điều hành	&nbsp;<input type="text" name="hdh"><br><br>
			Pin	&nbsp;<input type="text" name="pin"><br><br>
			Số lượng &nbsp;<input type="text" name="sl"><br><br>
			Giá gốc	&nbsp;<input type="text" name="gg"><br><br>
			Giá khuyến mãi &nbsp;<input type="text" name="gkm"><br><br>
			Thời gian bảo hành &nbsp;<input type="text" name="tgbh"><br><br>
			Tình trạng &nbsp;<input type="text" name="tt"><br><br>
			Mô tả &nbsp;
			 <textarea id="contentchau" name="contentchau"></textarea>
          <script type="text/javascript"> CKEDITOR.replace('contentchau'); </script><br><br>
			<input type="submit" name="them" value="Save"><br><br>
		</form>         
    </fieldset>   <br>   
<table id="rounded-corner" summary="2007 Major IT Companies' Profit">
    <thead>
    	<tr>
        	<th scope="col" class="rounded-company"></th>
            <th scope="col" class="rounded">Mã sản phẩm</th>
            <th scope="col" class="rounded">Tên sản phẩm</th>
            <th scope="col" class="rounded">Mã hãng</th>
            <th scope="col" class="rounded">Màn hình</th>
			<th scope="col" class="rounded">CPU</th>
			<th scope="col" class="rounded">VGA</th>
			<th scope="col" class="rounded">HDH</th>
			<th scope="col" class="rounded">Pin</th>
			<th scope="col" class="rounded">Số lượng</th>
			<th scope="col" class="rounded">Giá gốc</th>
			<th scope="col" class="rounded">Giá khuyến mãi</th>
			<th scope="col" class="rounded">Chi tiết</th>
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
			<td><?php echo $row["masanpham"];?></td>
            <td><?php echo $row["tensanpham"];?></td>
            <td><?php echo $row["mahang"];?></td>
            <td><?php echo $row["manhinh"];?></td>
            <td><?php echo $row["cpu"];?></td>
			<td><?php echo $row["vga"];?></td>
			<td><?php echo $row["hdh"];?></td>
			<td><?php echo $row["pin"];?></td>
			<td><?php echo $row["soluong"];?></td>
			<td><?php echo number_format ($row["giagoc"],0,'.','.'); ?> <sup>đ</sup></td>
			<td><?php echo number_format ($row["giakhuyenmai"],0,'.','.'); ?><sup>đ</sup></td>
			<td><a href="index.php?act=chitietsanpham&masanpham=<?php echo $row["masanpham"];?>">Chi tiết</a></td>
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
     
     
       
     
     
      
     
    
           
     
      
     
     