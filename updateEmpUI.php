<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>添加用户</title>
</head>

<?php
/**
 * www.i466.cn
 * blog.csdn.net/yongf2014
 * ==============================================
 * 版权所有 1996-2100 http://www.i466.cn
 *  ----------------------------------------------
 * 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
 * ==============================================
 * @date: 2015年8月20日下午3:21:39
 * @author: Scott_Wang
 * @version:1.1.0
 */
	require_once 'EmpService.class.php';
	/*
	 * 该页面要显示准备修改的用户的信息
	 */
	$id=$_GET['id'];
	
	//通过id得到该用户的其他信息
	$empService=new EmpService();
	$emp=$empService->getEmpById($id);
	
	//显示
	
?>

<img src="./images/1261.jpg" alt="" width="35%"/>
<hr/>

<h1>修改雇员</h1>
<form action="empProcess.php" method="post">
<table>
<tr>
	<td>id</td>
	<td><?php echo "$id"; ?></td>
</tr>
<tr>
	<td>姓名</td>
	<td><input type="text" name="name" value="<?php echo $emp->getName() ?>"/></td>
</tr>
<tr>
	<td>级别</td>
	<td><input type="text" name="grade" value="<?php echo $emp->getGrade() ?>"/></td>
</tr>
<tr>
	<td>邮箱</td>
	<td><input type="text" name="email" value="<?php echo $emp->getEmail() ?>"/></td>
</tr>
<tr>
	<td>薪水</td>
	<td><input type="text" name="salary" value="<?php echo $emp->getSalary() ?>"/></td>
</tr>
<input type="hidden" name="flag" value="updateemp"/>
<input type="hidden" name="id" value="<?php echo $emp->getId() ?>"/>
<tr>
	<td><input type="submit" value="修改用户"/></td>
	<td><input type="reset" value="重新填写"/></td>
</tr>
</table>
</form>

</html>