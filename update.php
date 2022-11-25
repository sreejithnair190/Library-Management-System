<?php 
error_reporting(E_ERROR | E_PARSE);
session_start();
$id =$_SESSION['id'];
$connection = mysqli_connect("localhost", "root", "","lms");
$query = "update users set name='$_POST[name]',email='$_POST[email]',mobile='$_POST[mobile]',address='$_POST[address]' where id=$id";
$query_run = mysqli_query($connection,$query);
?>
<script src="./js/update.js"></script>