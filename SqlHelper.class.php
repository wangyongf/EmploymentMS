<?php
/**
* www.i466.cn
* ==============================================
* 版权所有 1996-2100 http://www.i466.cn
*  ----------------------------------------------
* 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
* ==============================================
* @date: 2015年8月17日下午7:44:42
* @author: Scott_Wang
* @version:1.1.0
*/
	error_reporting(E_ALL^E_DEPRECATED);
/*
 * 这是一个工具类,作用是完成对数据库的操作
 */
class SqlHelper
{
	public $conn;
	public $dbname="employmentms";
	public $username="root";
	public $password="wangyongfs1996.";
	public $host="localhost";
	
	public function __construct()
	{
		$this->conn=mysql_connect($this->host,$this->username,$this->password);
		if(!$this->conn)
		{
			die("连接失败:".mysql_error());
		}
		mysql_select_db($this->dbname,$this->conn);
	}
	
	/*
	 * 执行dql语句
	 */
	public function execute_dql($sql)
	{
		$res=mysql_query($sql,$this->conn) or die(mysql_error());
		return $res;
	}
	
	/*
	 * 执行dql语句,但是返回的是一个数组
	 */
	public function execute_dql_toarray($sql)
	{
		$arr=array();
		$res=mysql_query($sql) or die(mysql_error());
		
		//把$res=>$arr
		while ($row=mysql_fetch_row($res))
		{
			$arr[]=$row;
		}
		//这里就可以马上把$res关闭
		mysql_free_result($res);
		
		return $arr;
	}
	
	/*
	 * 这是一个比较通用的,体现了oop编程思想的.
	 * 考虑分页情况的查询
	 * $sql1="select * from where 表名 1 limit 0,6";
	 * $sql2="select count(id) from 表名";
	 */
	public function execute_dql_pagination($sql1,$sql2,$pagination)
	{
		$res=mysql_query($sql1,$this->conn) or die(mysql_error());
		//$res=>array()
		$arr=array();
		//把$res转移到$arr
		while ($row=mysql_fetch_row($res))
		{
			$arr[]=$row;
		}
		
		mysql_free_result($res);
		
		$res2=mysql_query($sql2,$this->conn) or die(mysql_error());
		if($row=mysql_fetch_row($res2))
		{
			$pagination->pageCount=ceil($row[0]/$pagination->pageSize);
			$pagination->rowCount=$row[0];
		}
		
		mysql_free_result($res2);
		
		//把导航信息也封装到$pagination对象中
		$navigate="";
		if ($pagination->pageNow>1)
		{
			$prePage=$pagination->pageNow-1;
			$navigate="<a href='{$pagination->gotoUrl}?pageNow=$prePage'>上一页</a>&nbsp;";
		}
		if ($pagination->pageNow<$pagination->pageCount)
		{
			$nextPage=$pagination->pageNow+1;
			$navigate.="<a href='{$pagination->gotoUrl}?pageNow=$nextPage'>下一页</a>&nbsp;";
		}
		
		//实现:1->10;11->20;21->30......
		//打印出页码的超链接
		$page_whole=10;
		$start=floor(($pagination->pageNow-1)/$page_whole)*$page_whole+1;
		$index=$start;
		if($start-1>0)
		{
			$preStart=$start-1;
			$navigate.="<a href='{$pagination->gotoUrl}?pageNow=$preStart'>&nbsp;&nbsp;<<&nbsp;&nbsp;</a>";
		}
		for (;$index<$start+$page_whole;$index++)
		{
		$navigate.="<a href='{$pagination->gotoUrl}?pageNow=$index'>[$index]</a>&nbsp;";
		}
		
		//整体每10页翻动
		$navigate.="<a href='{$pagination->gotoUrl}?pageNow=$index'>&nbsp;&nbsp;>>&nbsp;&nbsp;</a>";
		
		//显示当前页和共有多少页
		$navigate.="当前页:$pagination->pageNow/$pagination->pageCount";
		
		//把$arr赋给$pagination
		$pagination->res_array=$arr;
		$pagination->navigate=$navigate;
		
	}
	
	/*
	 * 执行dml语句
	 */
	public function execute_dml($sql)
	{
		$b=mysql_query($sql,$this->conn) or die(mysql_error());
		if(!$b)
		{
			//表示执行失败
			return 0;
		}
		else
		{
			if(mysql_affected_rows($this->conn)>0)
			{
				//表示执行ok
				return 1;
			}
			else 
			{
				//表示没有行受到影响
				return 2;
			}
		}
	}
	
	/*
	 * 关闭连接
	 */
	public function close_connect()
	{
		if(!empty($this->conn))
		{
			mysql_close($this->conn);
		}
	}
}
	
?>