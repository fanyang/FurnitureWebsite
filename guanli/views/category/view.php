<table>
	<tr><th>分类编号</th><th>分类名</th><th>上级分类的编号</th></tr>
	<?php foreach ($categories as $category):?>
		<tr>
			<td><?php echo $category->id;?></td>
			<td><?php echo $category->cname;?></td>
			<td><?php echo $category->fid;?></td>
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
		width: 200px;
		text-align: center;
		border-style: solid none;
		border-width: 1px;
		border-color: #aaa;	
	}
</style>