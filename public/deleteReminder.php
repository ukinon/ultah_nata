<?php
$id = $_GET['id'];
include('connection.php');
$conn = OpenCon();
mysqli_query($conn, "delete from `reminder` where id='$id'");
header('location:reminder.php');
?>