<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>雇员信息列表</title>
	<script type="text/javascript">
	<!--
	function confirmDel(val)
	{
		return window.confirm("是否要删除id="+val+"的用户");
	}
	//-->
	</script>
</head>
<img src="./images/1233.jpg" alt="" width="30%"/>
<hr>
<?php
/**
* www.i466.cn
*  ==============================================
* 版权所有 1996-2100 http://www.i466.cn
*  ----------------------------------------------
* 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
* ==============================================
* @date: 2015年8月17日下午3:15:57
* @author: Scott_Wang
* @version:1.1.0
*/
	error_reporting(E_ALL^E_DEPRECATED^E_NOTICE);
	require_once 'EmpService.class.php';
	require_once 'Pagination.class.php';
	
	$empService=new EmpService();
	
	
	/*
	 * 创建一个Pagination对象实例
	 */
	$pagination=new Pagination();
	
	/*
	 * 开始做分页
	 */
	$pagination->pageNow=1;
	$pagination->pageSize=2;
	$pagination->gotoUrl="empList.php";
	
	//这里我们需要根据用户的点击来修改$pageNow的值
	//这里我们需要判断,是否有这个pageNow发送,如果有就使用,如果没有则默认$pageNow=1
	if(!empty($_GET['pageNow']))
	{
		$pagination->pageNow=$_GET['pageNow'];
	}
	
	$columns=$empService->getColumns();
	$res3=$empService->getFieldName($columns);
		
	$empService->getPagination($pagination);
	
	//表的列数
	echo "<h1>雇员信息列表</h1>";
	echo "<table border=1 bordercolor='red' cellspacing=0 width=700><tr>";
	
	//表头
	for ($i= 0; $i< $columns; $i++) 
	{
		$field_name=$res3[$i];
		echo "<th>$field_name</th>";
	}
	echo "<th>删除用户</th><th>修改用户</th>";
	echo "</tr>";
	
	/*
	 * 表的主体
	 * 这里我们需要循环的显示用户的信息
	 * 现在我们需要通过数组来取用户信息
	 */
	for ($k= 0; $k< count($pagination->res_array); $k++) 
	{
		$row=$pagination->res_array[$k];
		echo "<tr>";
		for ($j = 0; $j < $columns; $j++) 
		{
			echo "<td>$row[$j]</td>";
		}
		echo "<td><a onclick='return confirmDel({$row[0]})' href='empProcess.php?flag=del&id=$row[0]'>删除用户</a></td><td><a href='updateEmpUI.php?id={$row[0]}'>修改用户</a></td>";
		echo "</tr>";
	}
	echo "</table>";
	
	//显示上一页和下一页
	echo $pagination->navigate;
	
	//指定跳转到某一页
	echo "<br/><br/>";
	?>
	<form action="empList.php">
	跳转到:<input type="text" name="pageNow"/>
	<input type="submit" value="Go"/>
	</form><br/>
	<a href="empManage.php">返回主界面</a>	
	<hr/>
	<img src="./images/1258.jpg" alt="" width="50%"/>
<body>
	
</body>
</html>

