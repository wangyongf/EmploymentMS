<?php
/**
 * www.i466.cn
 * blog.csdn.net/yongf2014
 * ==============================================
 * 版权所有 1996-2100 http://www.i466.cn
 *  ----------------------------------------------
 * 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
 * ==============================================
 * @date: 2015年8月22日上午10:06:34
 * @author: Scott_Wang
 * @version:1.1.0
 */
	
	function getLastTime()
	{
		//首先看看cookie有没有上次登录的信息
		if(!empty($_COOKIE['lastVisit']))
		{
			echo "您上次登录时间是".$_COOKIE['lastVisit'];
			//更新时间
			setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*3600*30);
		}
		else
		{
			//说明用户是第一次登陆
			echo "你是第一次登陆";
			//更新时间
			setcookie("lastVisit",date("Y-m-d H:i:s"),time()+24*2600*30);
		}
	}
	
	/*
	 * 获取cookie值,用于自动登陆
	 */
	function getCookieVal($key)
	{
		if(empty($_COOKIE["$key"]))
		{
			return "";
		}
		else
		{
			return $_COOKIE["$key"];
		}
	}
	
?>