<?php

session_start();
print_r($_SESSION);

$_SESSION['username'] = "zm@test.com";

?>