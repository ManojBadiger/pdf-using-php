<?php

session_start();
$_SESSION['user']=$_GET['user'];
echo $_SESSION['user'];

?>