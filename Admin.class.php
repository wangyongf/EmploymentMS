<?php
/**
* www.i466.cn
*  ==============================================
* 版权所有 1996-2100 http://www.i466.cn
*  ----------------------------------------------
* 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
* ==============================================
* @date: 2015年8月17日下午7:43:04
* @author: Scott_Wang
* @version:1.1.0
*/
	
/*
 * 它的一个对象实例就表示admin表的一条记录
 */
class Admin
{
	private $id;
	private $name;
	private $password;
	/**
	 * @return the $id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return the $name
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return the $password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id)
	{
		$this->id = $id;
	}

	/**
	 * @param field_type $name
	 */
	public function setName($name)
	{
		$this->name = $name;
	}

	/**
	 * @param field_type $password
	 */
	public function setPassword($password)
	{
		$this->password = $password;
	}

	
}
	
?>