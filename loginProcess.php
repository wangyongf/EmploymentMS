<?php
	require_once 'AdminService.class.php';    

    //1.接收用户的数据
    //1.id
    $id=$_POST['id'];
    //2.密码
    $password=$_POST['password'];
    
    //实例化一个AdminService方法
    $adminService=new AdminService();
    if($name=$adminService->checkAdmin($id, $password))
    {
    	//合法
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