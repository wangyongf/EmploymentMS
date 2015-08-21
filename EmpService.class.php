<?php
/**
 * www.i466.cn
 *  ==============================================
 * 版权所有 1996-2100 http://www.i466.cn
 *  ----------------------------------------------
 * 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
 * ==============================================
 * @date: 2015年8月17日下午7:44:00
 * @author: Scott_Wang
 * @version:1.1.0
 */
	
	require_once 'SqlHelper.class.php';
	require_once 'Emp.class.php';
	
class EmpService
{
	
	/*
	 * 一个函数可以获取总共有多少页
	 */
	function getPageCount($pageSize)
	{
		//需要查询$rowCount
		$sql="select count(id) from emp";
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dql($sql);
		//这样就可以计算$pageCount
		if($row=mysql_fetch_row($res))
		{
			$pageCount=ceil($row[0]/$pageSize);
		}
		//释放资源
		mysql_free_result($res);
		//关闭连接
		$sqlHelper->close_connect();
		
		return $pageCount;
	}
	
	/*
	 * 应当显示的雇员信息
	 */
	function getEmpListByPage($pageNow,$pageSize)
	{
		$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
		
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dql_toarray($sql);
		
		//释放资源和关闭连接
// 		mysql_free_result($res);
		$sqlHelper->close_connect();
		return $res;
	}
	
	/*
	 * 返回数据的列数
	 */
	function getColumns()
	{
		$sql="select * from emp";
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dql($sql);
		//这样就可以计算$columns
		$columns=mysql_num_fields($res);
		//释放资源
		mysql_free_result($res);
		//关闭连接
		$sqlHelper->close_connect();
		
		return $columns;
	}
	
	/*
	 * 返回数据库表中各属性的名称
	 */
	function getFieldName($columns)
	{
		$arr=array();
		$sql="select * from emp";
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dql($sql);
		for ($i = 0; $i < $columns; $i++) 
		{
			$arr[$i]=mysql_field_name($res, $i);
		}
		
		//释放资源和关闭连接
		mysql_free_result($res);
		$sqlHelper->close_connect();
		
		return $arr;
	}
	
	/*
	 * 第二种使用封装的方式完成的分页(业务逻辑)
	 */
	function getPagination($pagination)
	{
		//创建一个SqlHelper对象实例
		$sqlHelper=new SqlHelper();
		$sql1="select * from emp limit ".($pagination->pageNow-1)*$pagination->pageSize.",".$pagination->pageSize;
		
// 		//如何排除错误
// 		echo "$sql1=$sql1";
// 		exit();
		
		$sql2="select count(id) from emp";
		$sqlHelper->execute_dql_pagination($sql1, $sql2, $pagination);
		
		$sqlHelper->close_connect();
	}
	
	/*
	 * 根据输入id删除某个用户
	 */
	function delEmpById($id)
	{
		//
		$sql="delete from emp where id=$id";
		//创建SqlHelper对象实例
		$sqlHelper=new SqlHelper();
		
		return $sqlHelper->execute_dml($sql);
	}
	
	/*
	 * 添加一个用户(雇员)
	 */
	function addEmp($name,$grade,$email,$salary)
	{
		//做一个sql语句
		$sql="insert into emp (name,grade,email,salary) values('$name',$grade,'$email',$salary)";
		//创建SqlHelper对象实例
		$sqlHelper=new SqlHelper();
		
		$res=$sqlHelper->execute_dml($sql);
		$sqlHelper->close_connect();
		return $res;
	}
	
	/*
	 * 根据id号获取一个雇员的信息
	 */
	function getEmpById($id)
	{
		$arr=array();
		$sql="select * from emp where id=$id";
		$sqlHelper=new SqlHelper();
		$arr=$sqlHelper->execute_dql_toarray($sql);
		$sqlHelper->close_connect();
		
		//二次封装,$arr=>Emp对象实例
		//创建Emp对象实例
		$emp=new Emp();
		$emp->setId($arr[0][0]);
		$emp->setName($arr[0][1]);
		$emp->setGrade($arr[0][2]);
		$emp->setEmail($arr[0][3]);
		$emp->setSalary($arr[0][4]);

		return $emp;
	}
	
	/*
	 * 修改雇员信息
	 */
	function updateEmp($id,$name,$grade,$email,$salary)
	{
		$sql="update emp set name='$name',grade=$grade,email='$email',salary=$salary where id=$id";
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dml($sql);
		$sqlHelper->close_connect();
		return $res;
	}
}	
	
?>