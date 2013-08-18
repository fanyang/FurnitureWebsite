<form action="#" method="post">
	<table>
		<caption>画廊图片修改</caption>
		<tr><th>图片编号: </th><td><input type="text" name="id" value="<?php echo $pic->id;?>" /></td></tr>
		<tr><th>图片标题: </th><td><input type="text" name="title" value="<?php echo $pic->title;?>" /></td></tr>
		<tr><th></th><td><input type="submit" name="submit" value="提交" /></td></tr>
	</table>
</form>

<style>
	input[type="text"] {
		width: 300px;
	}
</style>

<hr />
<p><a href="<?php echo base_url();?>gallery/view" target="_blank">在新窗口查看图片列表</a></p>
