<p>分页查看</p>
<p>
<?php for ($i=1; $i<=$total_pages; $i++): ?>
	<span style="display: inline-block; width: 20px;">
	<?php if ($i == $current_page) :?>
		<strong><?php echo $i;?></strong>
	<?php else:?>
		<a href="/guanli/gallery/view/<?php echo $i;?>"><?php echo $i;?></a>
	<?php endif;?>
	</span>
<?php endfor;?>
</p>

<table>
	<tr><th>图片编号</th><th>图片标题</th><th>点击查看原图</th><th></th><th></th></tr>
	<?php foreach ($galleries as $gallery):?>
		<tr>
			<td><?php echo $gallery->id;?></td>
			<td><?php echo $gallery->title;?></td>
			<td><a href="<?php echo $gallery->img_url;?>" target="_blank"><img src="<?php echo $gallery->thumb_url;?>" /></a></td>
			<td><a href="<?php echo base_url();?>gallery/modify/<?php echo $gallery->id;?>">修改</a></td>
			<td><a href="<?php echo base_url();?>gallery/delete/<?php echo $gallery->id;?>">删除</a></td>
		</tr>
	<?php endforeach;?>
</table>
<style>
	table {
		border-collapse:collapse;	
	}
	
	tr:hover {
		background-color: #ccc;
	}
	
	td {
		font-size: 14px;
		min-width: 100px;
		text-align: center;
		border-style: solid none;
		border-width: 1px;
		border-color: #aaa;	
	}
	td img {
		max-width: 200px;
		max-height: 150px;
	}
</style>