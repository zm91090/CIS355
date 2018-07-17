<?php
class Database
{
    private static $dbName = 'zcmoreno' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'zcmoreno';
    private static $dbUserPassword = 'Zmfdl101';
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
	 public function displayListTableContents(){
	   $pdo = Database::connect();
       $sql = 'SELECT * FROM customers ORDER BY id DESC';
	    foreach ($pdo->query($sql) as $row) {
			echo '<tr>';
			echo '<td>'. $row['name'] . '</td>';
			echo '<td>'. $row['email'] . '</td>';
			echo '<td>'. $row['mobile'] . '</td>';
			echo '<td width=250>';
			echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
			echo ' ';
			echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
			echo ' ';
			echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
			echo '</td>';
			echo '</tr>';
                   }
                   Database::disconnect();
	 }
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>