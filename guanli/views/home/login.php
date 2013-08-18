<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>请登陆</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<div style="width: 300px; height: 200px; margin: 30px auto; border: 1px solid #ddd; padding: 10px;">
	<form action="#" method="post">
		<table>
			<caption>请登陆</caption>
			<tr><th>用户名:</th><td><input type="text" name="username" maxlength="50" /></td></tr>
			<tr><th>密码:</th><td><input type="password" name="password" maxlength="50" /></td></tr>
			<tr><th><img src="/img/common/captcha.php" onclick="this.src=this.src+'?'+Math.random();" title="Get a new captcha" /></th><td><input type="text" name="captcha" maxlength="4" /></td></tr>
			<tr><th></th><td><input type="submit" value="登陆" name="submit" /></td></tr>
		</table>
	</form>
	<p style="text-align: right;"><a href="/">返回前台</a></p>
</div>

</body>
</html>