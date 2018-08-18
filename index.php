<?php
include_once 'inc/class.crud.php';
//creates a new crud object again
$crud = new CRUD();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>

<div id="header">
</div>

<center>
<table id="dataview">
<tr>
<td colspan="5"><a href="add_records.php">add new</a></td>
<td colspan="5"><a href="upload01.html">Simple file upload</a></td>
<td colspan="5"><a href="upload02.html">Second file upload</a></td>
</tr>
<?php
//calls the read function in the class crud file
$res = $crud->read();
if(mysql_num_rows($res)>0)
{
	while($row = mysql_fetch_array($res))
	{
	?>
    <tr>
	<!-- shows name, email, and mobile number  -->
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['mobile']; ?></td>
	<!-- Calls edit or read page and delete when clicked on -->
    <td><a href="edit_records.php?edt_id=<?php echo $row['id']; ?>">edit/Read</a></td>
    <td><a href="dbcrud.php?del_id=<?php echo $row['id']; ?>">delete</a></td>
    </tr>
    <?php
	}	
}
else
{//In the event the database is empty
	?><tr><td colspan="5">Data base is empty you should probaly add something.</td></tr><?php
}
?>
</table>

<footer>
</footer>

</center>
</body>
</html>