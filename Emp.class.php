<?php
/**
 * www.i466.cn
 *  ==============================================
 * 版权所有 1996-2100 http://www.i466.cn
 *  ----------------------------------------------
 * 这是一个自由软件,但是未经授权不得用于任何商业目的和用途
 * ==============================================
 * @date: 2015年8月17日下午7:43:28
 * @author: Scott_Wang
 * @version:1.1.0
 */

/*
 * 这个类的一个对象实例,表示一条雇员的信息记录
 */
class Emp
{
	private $id;
	private $name;
	private $grade;
	private $email;
	private $salary;
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
	 * @return the $grade
	 */
	public function getGrade()
	{
		return $this->grade;
	}

	/**
	 * @return the $email
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return the $salary
	 */
	public function getSalary()
	{
		return $this->salary;
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
	 * @param field_type $grade
	 */
	public function setGrade($grade)
	{
		$this->grade = $grade;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @param field_type $salary
	 */
	public function setSalary($salary)
	{
		$this->salary = $salary;
	}

	
	
}
	
?>