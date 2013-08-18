<form action="/guanli/config/submit" method="post">
	<table>
		<tr><th>用户名:</th><td><input type="text" value="<?php echo $config->username;?>" name="username" /></td></tr>
		<tr><th>邮箱地址:</th><td><input type="text" value="<?php echo $config->email;?>" name="email" /></td></tr>
		<tr><th>首页商品:</th><td><input type="text" value="<?php echo $config->latest;?>" name="latest" /> <a href="<?php echo base_url('product/view');?>" target="_blank">查看商品编号</a></td></tr>
		<tr><th>旧密码:</th><td><input type="password" name="old_password" /></td></tr>
		<tr><th>新密码:</th><td><input type="password" name="new_password" /></td></tr>
		<tr><th>再输一次:</th><td><input type="password" name="new_password_again" /></td></tr>
		<tr><th></th><td><input type="submit" value="提交更改" name="submit"/></td></tr>
	</table>
</form>
<style>
	input[type="text"], input[type="password"] {
		width: 300px;
	}
</style>

<hr />
<p>说明：</p>
<p>可以更改管理员用户名，管理员密码，还有用户留言的接收邮箱地址。</p>
<p>如果不想更改密码，密码填写框留空。</p>
<p>首页显示的4个产品的编号，用英文的逗号分隔。</p>