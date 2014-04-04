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
		<tr><th>产品编号</th><td><input type="text" name="id" value="<?php echo $product->id;?>" /> <a href="/product/<?php echo $product->id;?>" target="_blank">前台地址</a></td></tr>
		<tr><th>产品名称</th><td><input type="text" name="pname" value="<?php echo $product->pname;?>" /></td><td></td></tr>
		<tr><th>分类编号</th><td><input type="text" name="cid" value="<?php echo $product->cid;?>" /> <a href="<?php echo base_url();?>category/view" target="_blank">查看分类</a></td></tr>
		<tr><th>封面图号</th><td><input type="text" name="img_id" value="<?php echo $product->img_id;?>" /> <a href="<?php echo base_url();?>album/view/<?php echo $product->id;?>" target="_blank">产品图片</a></td></tr>
		<tr><th>产品描述</th><td><textarea id="description" name="description"><?php echo $product->description;?></textarea></td></tr>
		<tr><th></th><td><input type="submit" name="submit" value="提交" /></td><td></td></tr>	
	</table>
</form>
<style>
	input[type="text"] {
		width: 500px;
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
<p></p>