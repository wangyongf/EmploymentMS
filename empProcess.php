<?php
/**
 * www.i466.cn
 * blog.csdn.net/yongf2014
 * ==============================================
 * 版权所有 1996-2100 http://www.i466.cn
 *  ----------------------------------------------
 * 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
 * ==============================================
 * @date: 2015年8月20日上午10:35:06
 * @author: Scott_Wang
 * @version:1.1.0
 */

	require_once 'empList.php';
	//接受用户要删除的用户id
	$empService=new EmpService();
		
	//先看看用户是要分页还是要删除某个雇员
	if(!empty($_REQUEST['flag']))
	{
		//接收flag
		$flag=$_REQUEST['flag'];
		switch ($flag)
		{
			case "del":
				//这时,要删除用户了
				$id=$_REQUEST['id'];
				if($empService->delEmpById($id)==1)
				{
					//成功!
					header("Location:ok.php");
					exit();
				}
				else 
				{
					//失败!
					header("Location:error.php");
					exit();
				}
				break;
			case "addemp":
				//说明,用户希望添加雇员
				$name=$_POST['name'];
				$grade=$_POST['grade'];
				$email=$_POST['email'];
				$salary=$_POST['salary'];
				
				//完成添加->数据库
				$res=$empService->addEmp($name, $grade, $email, $salary);
				switch ($res)
				{
					case '1':
						header("Location:ok.php");
						exit();
					default:
						//失败!
						header("Location:error.php");
						exit();
				}
			case "updateemp":
				//说明,用户希望执行修改雇员信息
				//接收数据
				$id=$_REQUEST['id'];
				$name=$_POST['name'];
				$grade=$_POST['grade'];
				$email=$_POST['email'];
				$salary=$_POST['salary'];
				//完成修改->数据库
				$res=$empService->updateEmp($id, $name, $grade, $email, $salary);
				switch ($res)
				{
					case '1':
						header("Location:ok.php");
						exit();
					default:
						header("Location:error.php");
						exit();
				}
				break;
		}
	}

	
?>