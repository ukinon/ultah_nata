<?php
include 'connection.php';
$LOGIN = false;
$conn = OpenCon();
session_start();

if (isset($_SESSION['username'])) {
    $LOGIN = true;
    $user = $_SESSION['username'];
}
else{
    $user = null;
}

if (isset($_POST["login"])) {
    $user = $_POST['user'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$password'";
    $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            $userID = $row["id"];
            header('Location: index.php');
            $LOGIN = true;
        } else {
            echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!'); location.href='index.php'</script>";
        }
    }

if (isset($_POST["logout"])) {
    session_destroy();
    $LOGIN = false;
}
