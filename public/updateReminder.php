<?php
$id = $_GET['id'];
include('connection.php');
$conn = OpenCon();
mysqli_query($conn, "update reminder set status = 'completed' where id='$id'");
header('location:reminder.php');
?>