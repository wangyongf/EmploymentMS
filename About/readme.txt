开始编写我们的的雇员管理系统
主要的目的:
1.培养编写项目的感觉
2.认识我们的mvc模式
3.规划项目
4.融入各个知识点[php基础,html,数据库,开发模式,cookie/session]

开发使用原型开发

需求分析->设计阶段->编码阶段->测试阶段->发布阶段/维护阶段

需求阶段:需求设计人员/项目经理 对客户(领导)
设计阶段:技术人员(架构师,组长,程序员)->设计数据库
开发阶段:组长,程序员
测试阶段:测试人员
发布阶段:实施人员(实施工程师)
维护阶段:往往是从开发人员中调

美工(ps画图)->网页前端人员(html)[原型]->用户


													雇员管理系统开发文档
1.需求分析

该项目可以完成如下功能:
1.管理员可以登录到管理页面
2.可以对雇员进行增加
3.可以对雇员进行修改
4.可以查看雇员(分页显示)
5.可以删除雇员
附带:
①可以实现用户在一定时间内自动登陆							
②可以统计网站访问的次数

2.画出UML时序图

3.界面设计

4.设计数据库

请注意:对于一个大型项目而言,我们建议表的字段名可以采用  表名_字段名

管理员表:
admin
create table admin(
id_admin int primary key,
name_admin varchar(32) not null,
password varchar(128) not null);

雇员表:
emp
create table emp(
id int primary key auto_increment,
name_emp varchar(64) not null,
grade tinyint, /*1表示1级工...*/
email varchar(128) not null,
salary float);

表创建到mysql数据库中

添加初始化数据
insert into emp(name,grade,email,salary) values ('Scott_Wang',1,'scottwang@gmail.com',50000);

insert into admin values (100,'admin',md5('admin'));
insert into admin values (200,'Scott_Wang',md5('123'));

5.代码阶段
准备素材(图片,静态页面,flash,文字)

要求:如果登陆不成功,在login.php页面显示红色的提示信息
在管理页面提供一个超链接,可以退出系统!

现在大家,先完成不到数据库验证的功能!

①先不到数据库验证,就可以登陆成功,如果不成功,给出提示
②要求到数据库验证,该用户是否存在
③在管理页面显示登陆成功的人的名字(id)
思路:通过跳转把用户名传递给empManage.php
④在用户列表页面(empList.php)页面显示所有的雇员信息(考虑分页...)
⑤考虑分页显示我们的用户信息
思路:在分页中有几个变量是必须的
1)$pageNow-->显示第几页	用户输入
2)$pageCount-->总共有几页[在程序中算出]
3)$rowCount-->共有多少条记录
4)$pageSize-->每页显示几条记录[程序员定义]
小算法:
<?php
$pageNow=1
$rowCount=7
$pageSize=3
$pageCount=ceil($rowCount/$pageSize)	==>数学函数

在实际开发中,数据量很大,因此,需要我们测试当数据量大时,是否可以可以满足用户需求,模拟大量的数据  20w
mysql 自我复制:
insert into emp (name,grade,email,salary) select name,grade,email,salary from emp;

⑥网站结构的问题
从整个项目看,我们的页面中loginProcess.php和empList.php中有对数据库的操作,代码有重复......

使用分层模式来完成雇员信息分页的功能
思路:
1.在什么文件中封装分页的代码:-->EmpService.class.php
2.通过分析,我们知道,为了完成分页empList.php文件需要两个重要的数据:一个是$pageCount,第二个是分页需要显示的数据
3.代码
4.我们要处理如何关闭资源的问题
5.考虑实现每次显示10页的效果

如何做一个通用的分页模块(函数)
思路:
我设计一个Pagination类,该类可以封装分页需要的各种信息

增加一个功能,删除雇员


mvc的核心思想:
强制程序员在编写项目时,把数据的输入,处理,输出三者分离

我们在雇员管理系统中增加的新功能:
1.登陆empManage.php页面的时候,显示该用户上次登录的时间
2.打开登陆页面的时候,自动填写该用户的用户名和密码