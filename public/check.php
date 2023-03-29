<?php
include 'connection.php';
$LOGIN = null;
$conn = OpenCon();
$alert = 'hidden';
session_start();

if (isset($_SESSION['username'])) {
    $LOGIN = true;
    $user = $_SESSION['username'];
    $userID = $_SESSION['id'];
}
else{
    $user = null;
    $userID = null;
}

if (isset($_POST["login"])) {
    $username = $_POST['user'];
    $password = md5($_POST['password']);

    $sql = "SELECT id, username, password FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $_SESSION['id'] = $row['id'];
            header('Location: index.php');
            $LOGIN = true;
        } else {
            $alert= '';
        }
    }

if (isset($_POST["logout"])) {
    session_destroy();
    $LOGIN = false;
}
