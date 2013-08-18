<p>分页查看</p>
<p>
<?php for ($i=1; $i<=$total_pages; $i++): ?>
	<span style="display: inline-block; width: 20px;">
	<?php if ($i == $current_page) :?>
		<strong><?php echo $i;?></strong>
	<?php else:?>
		<a href="<?php echo base_url();?>product/view/<?php echo $i;?>"><?php echo $i;?></a>
	<?php endif;?>
	</span>
<?php endfor;?>
</p>

<table>
	<tr><th>产品编号</th><th>产品分类编号</th><th>产品标题</th><th>产品图片编号</th><th>相册</th><th>修改</th><th>删除</th><th>前台地址</th></tr>
	<?php foreach ($products as $product):?>
		<tr>
			<td><?php echo $product->id;?></td>
			<td><?php echo $product->cid;?></td>
			<td><?php echo $product->pname;?></td>
			<td><?php echo $product->img_id;?></td>
			<td><a href="<?php echo base_url();?>album/view/<?php echo $product->id;?>" target="_blank"><?php echo $product->img_count;?></a></td>
			<td><a href="<?php echo base_url();?>product/modify/<?php echo $product->id;?>">修改</a></td>
			<td><a href="<?php echo base_url();?>product/delete/<?php echo $product->id;?>">删除</a></td>
			<td><a href="/product/<?php echo $product->id;?>" target="_blank">前台</a></td>
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
		min-width: 50px;
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