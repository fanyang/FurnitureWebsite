<script charset="utf-8" src="/script/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="/script/kindeditor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#description');
        });
</script>
<form action="#" method="post">
	<table>
		<tr><th>产品名称</th><td><input type="text" name="pname" /></td></tr>
		<tr><th>分类编号</th><td><input type="text" name="cid" /> <a href="<?php echo base_url();?>category/view" target="_blank">查看分类</a></td></tr>
		<tr><th>产品描述</th><td><textarea id="description" name="description"></textarea></td></tr>
		<tr><th></th><td><input type="submit" name="submit" value="提交" /></td><td></td></tr>	
	</table>
</form>
<style>
	input[type="text"] {
		width: 600px;
	}
	
	input[type="submit"] {
		width: 100px;
		height: 40px;
	}
	
	textarea {
		width: 680px;
		height: 400px;
	}
</style>
<hr />
<p>产品名称可以留空。系统会自动在名称前面加上产品编号“GAF-编号 ”。</p>