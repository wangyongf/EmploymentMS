<?php
/**
 * www.i466.cn
 * blog.csdn.net/yongf2014
 * ==============================================
 * 版权所有 1996-2100 http://www.i466.cn
 *  ----------------------------------------------
 * 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
 * ==============================================
 * @date: 2015年8月19日下午4:22:31
 * @author: Scott_Wang
 * @version:1.1.0
 */
	
/*
 * 这是一个保存分页信息的类
 */
class Pagination
{
	//之后,若将下述变量封装为private,则加入set,get方法
	
	/*
	 * 每一页的数据量,默认为6
	 */
	public $pageSize=6;
	
	/*
	 * 数据数组(二维)
	 */
	public $res_array;
	
	/*
	 * 总的数据条数
	 */
	public $rowCount;
	
	/*
	 * 目前的页面页码
	 */
	public $pageNow;
	
	/*
	 * 总的页面数,可以通过计算得出
	 */
	public $pageCount;
	
	/*
	 * 分页导航
	 */
	public $navigate;
	
	/*
	 * 下一步跳转的页面
	 */
	public $gotoUrl;
}
	
?>