<?php
$id = $_GET['id'];
include('connection.php');
$conn = OpenCon();
mysqli_query($conn, "delete from `post` where id='$id'");
header('location:index.php');
?>