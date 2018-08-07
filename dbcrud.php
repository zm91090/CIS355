<?php
//calls the class crud file
include_once 'inc/class.crud.php';
//Creats a new crud
$crud = new CRUD();
//When the post form is called it will call for save and saves the name, email, and mobile
if(isset($_POST['save']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	
	// insert
    $crud->create($name,$email,$mobile);
	// insert
	header("Location: index.php");
}

//called when the delete record is called.
if(isset($_GET['del_id']))
{
	$id = $_GET['del_id'];
	$crud->delete($id);
	header("Location: index.php");
}
//This is called after we have fetched data from the edit_records.php
if(isset($_POST['update']))
{	//saves the new info
	$id = $_GET['edt_id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mobile = $_POST['mobile'];
	
	$crud->update($name,$email,$mobile,$id);
	header("Location: index.php");
}
?>