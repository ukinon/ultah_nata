<?php
 $sql = "SELECT * FROM users WHERE username='$user'";
 $result = mysqli_query($conn, $sql);
     if ($result->num_rows > 0) {
         $row = mysqli_fetch_assoc($result);
         $userID = $row["id"];
     }

date_default_timezone_set("Asia/Jakarta");


function tambah($data, $userID)
{
    global $conn;
    $post = htmlspecialchars($data["post"]);
    $date = date("Y-m-d H:i:s");

    //query insert data

    $query = "INSERT INTO post(user, post, postDate) VALUES ('$userID', '$post', '$date')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function reminder($data)
{
    global $conn;
    $reminder = htmlspecialchars($data["reminder"]);
    $date = date("Y-m-d H:i:s");

    //query insert data

    $query = "INSERT INTO reminder(reminder, reminderDate) VALUES ('$reminder', '$date')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}