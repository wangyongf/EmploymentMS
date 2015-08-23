<?php
	require_once 'AdminService.class.php';    

    //1.接收用户的数据
    //1.id
    $id=$_POST['id'];
    //2.密码
    $password=$_POST['password'];
    //3.获取用户是否选中了自动登陆
    //事先声明:下面的直接明文保存密码的方式不可取!!!
    if(empty($_POST['keep']))
    {
    	/*
    	 * 选定了不保存用户名和密码,此时,如果此前有cookie,则清除之
    	 */
    	if(!empty($_COOKIE['id'])||!empty($_COOKIE['password']))
    	{
    		setcookie("id",$id,time()-100);
    		setcookie("password",$password,time()-100);
    	}
    }
    else 
    {
    	setcookie("id",$id,time()+7*2*24*3600);
    	setcookie("password",$password,time()+7*2*24*3600);
    }
    $keep=$_POST['keep'];
    
    
    //实例化一个AdminService方法
    $adminService=new AdminService();
    if($name=$adminService->checkAdmin($id, $password))
    {
    	//把登陆信息写入cookie  'loginname':$name
    	//把登陆表 把登陆用户的ip id...记录下来
    	//合法
    	session_start();
    	$_SESSION['loginuser']=$name;
    	header("Location:empManage.php?name=$name");
    	exit();
    }
    else
    {
    	//非法
    	header("Location:login.php?errno=1");
    	exit();
    }
    

?>