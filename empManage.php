<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>用户</title>
</head>
<img src="./images/Caitlyn.jpg" alt="" width="50%"/>
<hr>
<?php
	
	require_once 'common.php';
	//先验证
	checkUserValidate();
	echo "欢迎".$_GET['name']."登陆成功!";
	echo "<br/><a href='login.php'>返回重新登陆</a>";
	echo "<br/>";
	//显示上次登录的时间
	getLastTime();
	
	
?>
<body>
	<h1>主界面</h1>
	<a href="empList.php">管理用户</a><br/>
	<a href="adEmp.php">添加用户</a><br/>
	<a href="#">查询用户</a><br/>
	<a href="#">退出系统</a><br/>
	<hr/>
	<img src="./images/1165.jpg" alt="" />
</body>
</html>
