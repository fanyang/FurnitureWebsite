<h1>产品编号: <?php echo $product_id;?> <a href="/product/<?php echo $product_id;?>" target="_blank">前台查看</a></h1>

<div style="width: 330px; float: left">
	<table>
		<tr><th>图片编号</th><th>点击查看大图</th><th>删除</th></tr>
		<?php foreach ($pics as $pic):?>
			<tr>
				<td><?php echo $pic->id?></td>
				<td><a href="<?php echo $pic->img_url?>" target="_blank"><img src="<?php echo $pic->thumb_url?>" /></a></td>
				<td><a href="<?php echo base_url()?>album/delete/<?php echo $pic->id?>">删除</a></td>
			</tr>
		<?php endforeach;?>
	</table>

</div>
<style>
	table {
		border-collapse:collapse;	
	}
	
	tr:hover {
		background-color: #ccc;
	}
	td {
		border-style: solid none;
		border-width: 1px;
		border-color: #aaa;	
	}
	#file_upload
	{
		width: 450px;
		float: left;
		background-color: #eee;
	}
	#file_upload input[type="submit"]
	{
		width: 100px;
		height: 40px;
	}
</style>

<div id ="file_upload">
	<?php echo form_open_multipart('album/upload');?>
		<input type="hidden" name="product_id" value="<?php echo $product_id;?>" /><br />
		<input type="file" name="userfile" size=50 /><br /><br />
	<input type="submit" name="submit" value="上传" />
	</form>
	<hr />
	<p>图片限制小于10M</p>
	<p>系统自动生成200*200，400*400缩略图</p>
</div>

<script>
</script>



