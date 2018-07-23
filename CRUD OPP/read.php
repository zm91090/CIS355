<?php
include_once 'inc/class.crud.php';
$crud = new CRUD();
if(isset($_GET['edt_id']))
{
	$res=mysql_query("SELECT * FROM customers WHERE id=".$_GET['edt_id']);
	$row=mysql_fetch_array($res);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div id="header">
</div>

<center>
<form method="post" action="dbcrud.php?edt_id=<?php echo $_GET['edt_id'] ?>">
<table id="dataview">
<tr><td><input type="text" name="name" placeholder="name" value="<?php echo $row['name'] ?>" /><br /></td></tr>
<tr><td><input type="text" name="email" placeholder="last name" value="<?php echo $row['email'] ?>" /></td></tr>
<tr><td><input type="text" name="mobile" placeholder="mobile" value="<?php echo $row['mobile'] ?>" /></td></tr>
<tr><td><button type="submit" name="update">Back</button></td></tr>
</table>
</form>
</table>
</center>
</body>
</html>