<?php
session_start();
$id =$_SESSION['id'];

$connection = mysqli_connect("localhost", "root", "", "lms");
$query = "select * from users where id = $id";
$query_run = mysqli_query($connection, $query);

$row = mysqli_fetch_assoc($query_run);

$password = $row['password'];
$current_password= $_POST['current_password'];
$new_password= $_POST['new_password'];

if ($current_password==$password) {
    $query = "update users set password=$new_password where id = $id";
    $query_run = mysqli_query($connection, $query);
}
?>
<script src="./js/password.js"></script>