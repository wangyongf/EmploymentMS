<?php
/**
 * www.i466.cn
 *  ==============================================
 * 版权所有 1996-2100 http://www.i466.cn
 *  ----------------------------------------------
 * 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
 * ==============================================
 * @date: 2015年8月17日下午7:44:14
 * @author: Scott_Wang
 * @version:1.1.0
 */
require_once 'SqlHelper.class.php';

/*
 * 该类是一个业务逻辑处理类,主要完成对admin表的操作
 */
class AdminService
{
	/*
	 * 提供一个验证用户是否合法的方法
	 */
	public function checkAdmin($id,$password)
	{
		$sql="select password,name from admin where id=$id";
		
		//创建一个SqlHelper对象
		$sqlHelper=new SqlHelper();
		$res=$sqlHelper->execute_dql($sql);
		if($row=mysql_fetch_assoc($res))
		{
			if(md5($password)==$row['password'])
			{
				return $row['name'];
			}
		}
		//释放资源
		mysql_free_result($res);
		//关闭连接
		$sqlHelper->close_connect();
		
		return false;
	}
}
	
	
?>