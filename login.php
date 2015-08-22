<?php 
	require_once 'common.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>登陆</title>
</head>
<img src="./images/skt.jpg" alt="图片没了+_+" width="30%" />
<hr>
<body>
	<h1>管理员登陆系统</h1>
	<form action="loginProcess.php" method="post">
	<table>
	<tr>
		<td>用户id</td>
		<td><input type="text" name="id" value="<?php echo getCookieVal("id"); ?>"/></td>
	</tr>
	<tr>
		<td>密　码</td>
		<td><input type="password" name="password" value="<?php echo getCookieVal("password"); ?>"/></td>
	</tr>
	<tr>
		<td colspan=2>自动登陆<input type="checkbox" name="keep"/></td>
	</tr>
	<tr>
		<td><input type="submit" value="用户登陆"/></td>
		<td><input type="reset" value="重新填写" /></td>
	</tr>
	</table>
	</form>
	<?php 
		//接收errno
		if(!empty($_GET['errno']))
		{
		    //接收错误编号
			$errno=$_GET['errno'];
			if($errno==1)
			{
			    echo "<br/><font color=red size=5>你的用户名或密码错误</font>";
			}
		}
	?>
	<hr/>
	<img src="./images/16.png" alt="" width="20%"/>
</body>
</html>