<?php
//brings in our dbconfig file
include_once 'dbconfig.php';

class CRUD
{
	//This has  our inner functions for creating. read, update and delete.
	public function __construct()
	{
		$db = new DB_con();
	}
	
	// function for create
	public function create($name,$email,$mobile)
	{
		mysql_query("INSERT INTO customers(name,email,mobile) VALUES('$name','$email','$mobile')");
	}
	
	// function for read
	public function read()
	{
		return mysql_query("SELECT * FROM customers ORDER BY id ASC");
	}
	
	// function for delete
	public function delete($id)
	{
		mysql_query("DELETE FROM customers WHERE id=".$id);
	}
	
	// function for update
	public function update($name,$email,$mobile,$id)
	{
		mysql_query("UPDATE customers SET name='$name', email='$email', mobile='$mobile' WHERE id=".$id);
	}
}
?>