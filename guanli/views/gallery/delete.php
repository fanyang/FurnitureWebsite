<form action="#" method="post">
	<table>
		<caption>删除画廊图片</caption>
		<tr><th>图片编号: </th><td><input type="text" name="id" /></td></tr>
		<tr><th></th><td><input type="submit" name="submit" value="提交" /></td></tr>
	</table>
</form>
<hr />
<p>删除图片前请先查看图片编号：</p>
<p><a href="<?php echo base_url();?>gallery/view" target="_blank">在新窗口查看图片列表</a></p>